<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models as Models;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EiPortfolioController extends Controller
{
    protected $namePage = 'Portfolio';
    protected $folder = 'ei-portfolio';
    public function index(Request $request)
    {
        $items = Models\EiPortfolio::orderByDesc('created_at')->get();
        return view("Backend.ei-portfolio.index", [
            'items' => $items,
            'name_page' => $this->namePage,
            'folder' => $this->folder,
        ]);
    }

    public function create(Request $request)
    {
        return view('Backend.ei-portfolio.create', [
            'name_page' => $this->namePage,
            'folder' => $this->folder,
        ]);
    }

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
            'type' => 'nullable|in:website,app,graphic',
        ]);
        $validatedData['date'] = $request->event_date;
        if ($request->hasFile('image')) {
            if (!file_exists(public_path('backend/uploads/ei-portfolio'))) {
                mkdir(public_path('backend/uploads/ei-portfolio'), 0777, true);
            }
            $upImage = Helper::upload_image($request->file('image'), 'ei-portfolio', 412, null);
            $validatedData['image'] = $upImage['image'];
        }
        DB::beginTransaction();
        $portfolioItem = Models\EiPortfolio::create($validatedData);

        if ($request->hasFile('images')) {
            if (!file_exists(public_path('backend/uploads/ei-portfolio'))) {
                mkdir(public_path('backend/uploads/ei-portfolio'), 0777, true);
            }
            foreach ($request->file('images') as $image) {
                $imagePath = Helper::upload_image($image, 'ei-portfolio', 412, null);
                Models\EiPortfolioImage::create([
                    'image' => $imagePath['image'],
                    'ei_portfolio_id' => $portfolioItem->id,
                ]);
            }
        }
        DB::commit();
        return redirect()->route('ei-portfolio.index');
    }

    public function show(Request $request, $id) {}

    public function edit(Request $request, $id)
    {
        $data = Models\EiPortfolio::findOrFail($id);
        return view("Backend.ei-portfolio.edit", [
            'name_page' => $this->namePage,
            'folder' => $this->folder,
            'row' => $data,
        ]);
    }
    public function update(Request $request, $id)
    {
        $portfolioItem = Models\EiPortfolio::findOrFail($id);
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
                'type' => 'nullable|in:website,app,graphic',
            ]);
            $validatedData['date'] = $request->event_date;
            // Upload the image and save its path in the database
            if ($request->hasFile('image')) {
                if (!file_exists(public_path('backend/uploads/ei-portfolio'))) {
                    mkdir(public_path('backend/uploads/ei-portfolio'), 0777, true);
                }
                if ($portfolioItem->image != null) {
                    // Storage::disk('public')->delete($portfolioItem->image);
                    if (File::exists(public_path('backend/' . $portfolioItem->image))) {
                        File::delete(public_path('backend/' . $portfolioItem->image));
                    }
                }
                $upImage = Helper::upload_image($request->file('image'), 'ei-portfolio', 412, null);
                $validatedData['image'] = $upImage['image'];
            }
            $portfolioItem->update($validatedData);
            if ($request->hasFile('images')) {
                if (!file_exists(public_path('backend/uploads/ei-portfolio'))) {
                    mkdir(public_path('backend/uploads/ei-portfolio'), 0777, true);
                }
                foreach ($request->file('images') as $image) {

                    $imagePath = Helper::upload_image($image, 'ei-portfolio', 412, null);
                    Models\EiPortfolioImage::create([
                        'image' => $imagePath['image'],
                        'ei_portfolio_id' => $portfolioItem->id,
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
    public function destroy(Request $request, $id) {
        try {
            DB::beginTransaction();

            $portfolioItem = Models\EiPortfolio::findOrFail($id);

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

            $portfolioItem = Models\EiPortfolioImage::findOrFail($id);

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
        $data = Models\EiPortfolio::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
