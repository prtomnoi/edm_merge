<?php

namespace App\Http\Controllers\Backend;
use App\Models\PortfolioItem;
use App\Models\PortfolioItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Illuminate\Support\Facades\File;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $namePage = 'portfolio-items';
    //  protected $folder = 'portfolio-items';
    protected $folder = 'portfolio-items';

    public function index()
    {
        $portfolioItems = PortfolioItem::orderByDesc('created_at')->get();
        return view("Backend.portfolio-items.index", [
            'items' => $portfolioItems,
            'name_page' => $this->namePage,
            'folder' => $this->folder,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.portfolio-items.create", [
            'name_page' => $this->namePage,
            'folder' => $this->folder,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'title_en' => 'nullable|max:255',
            'short_detail' => 'nullable',
            'short_detail_en' => 'nullable',
            'detail' => 'nullable',
            'detail_en' => 'nullable',
            'event_date' => 'nullable',
            'signature' => 'nullable|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'status' => 'in:draft,published',
            'created_by' => 'nullable|exists:users,id',
            'updated_by' => 'nullable|exists:users,id',
        ]);



        if ($request->hasFile('image')) {
            $upImage = Helper::upload_image($request->file('image'), 'portfolio', 412, null);
            $validatedData['image'] = $upImage['image'];
        }

        $portfolioItem = PortfolioItem::create($validatedData);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $imagePath = Helper::upload_image($image, 'portfolio', 412, null);
                PortfolioItemImage::create([
                    'image' => $imagePath['image'],
                    'portfolio_item_id' => $portfolioItem->id,
                ]);
            }
        }

        return redirect()->route("$this->folder.index")
                        ->with('success', 'Portfolio item created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PortfolioItem::findOrFail($id);
        return view("Backend.portfolio-items.edit", [
            'name_page' => $this->namePage,
            'folder' => $this->folder,
            'row' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        try {
            DB::beginTransaction();
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'title_en' => 'nullable|max:255',
                'short_detail' => 'nullable',
                'short_detail_en' => 'nullable',
                'detail' => 'nullable',
                'detail_en' => 'nullable',
                'event_date' => 'nullable',
                'signature' => 'nullable|max:200',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
                'status' => 'in:draft,published',
                'created_by' => 'nullable|exists:users,id',
                'updated_by' => 'nullable|exists:users,id',
                'top' => 'sometimes|in:on',
            ]);
            // dd($validatedData);
            $transformedData = [
                'top' => isset($validatedData['top']) ? '1' : '0',
            ];
            $validatedData = array_merge($validatedData, $transformedData);

            // Upload the image and save its path in the database
            if ($request->hasFile('image')) {
                if ($portfolioItem->image != null) {
                    // Storage::disk('public')->delete($portfolioItem->image);
                    if (File::exists(public_path('backend/' . $portfolioItem->image))) {
                        File::delete(public_path('backend/' . $portfolioItem->image));
                    }
                }
                $upImage = Helper::upload_image($request->file('image'), 'portfolio', 412, null);
                $validatedData['image'] = $upImage['image'];
            }
            $portfolioItem->update($validatedData);


            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {

                    $imagePath = Helper::upload_image($image, 'portfolio', 412, null);
                    PortfolioItemImage::create([
                        'image' => $imagePath['image'],
                        'portfolio_item_id' => $portfolioItem->id,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route("$this->folder.index")->with('success', "$this->namePage updated successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("$this->folder.index")->with('error', 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $portfolioItem = PortfolioItem::findOrFail($id);

            $portfolioItem->images()->each(function ($image) {
                if ($image->image != null) {
                    try {
                        Storage::disk('public')->delete($image->image);
                    } catch (\Exception $e) {
                    }
                }
                $image->delete();
            });

            if ($portfolioItem->image != null) {
                try {
                    Storage::disk('public')->delete($portfolioItem->image);
                } catch (\Exception $e) {
                }
            }
            $portfolioItem->delete();

            DB::commit();
            return response()->json(['message' => 'Successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Something broke'], 500);
        }
    }
    public function delete_image($id){

        try {

            $portfolioItem = PortfolioItemImage::findOrFail($id);

            if ($portfolioItem->image != null) {
                try {
                    // Storage::disk('public')->delete($portfolioItem->image);
                    if (File::exists(public_path('backend/' . $portfolioItem->image))) {
                        File::delete(public_path('backend/' . $portfolioItem->image));
                    }
                } catch (\Exception $e) {
                }
            }
            $portfolioItem->delete();

            return response()->json(['message' => 'Successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something broke'], 500);
        }
    }
    public function status($id = null)
    {
        $data = PortfolioItem::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
