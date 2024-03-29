<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Portfolio;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $namePage = 'Portfolios';
    protected $folder = 'portfolios';

    public function index()
    {
        $items = Portfolio::all();
        return view("Backend.portfolios.index", [
            'items' => $items,
            'name_page' => $this->namePage,
            'folder' => $this->folder,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();

        return view("Backend.portfolios.create", [
            'name_page' => $this->namePage,
            'folder' => $this->folder,
            'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'link' => 'string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:3072',
                'status' => 'required|in:draft,published',
                'group_id' => 'required|exists:table_group,id',
            ]);

            if ($request->hasFile('image')) {
                $upImage = Helper::upload_image($request->file('image'), 'portfolio', 412, null);
                $data['image'] = $upImage['image'];
            }
            Portfolio::create($data);
            DB::commit();
            return redirect()->route("$this->folder.index")->with('success', "$this->namePage created successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("$this->folder.create")->with('error', $e->getMessage());
        }
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
        $groups = Group::all();
        $data = Portfolio::findOrFail($id);
        return view("Backend.portfolios.edit", [
            'name_page' => $this->namePage,
            'folder' => $this->folder,
            'row' => $data,
            'groups' => $groups,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portflio = Portfolio::findOrFail($id);
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'link' => 'string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:3072',
                'status' => 'required|in:draft,published',
                'group_id' => 'required|exists:table_group,id',
            ]);




            // Upload the image and save its path in the database
            if ($request->hasFile('image')) {
                if ($portflio->image != null) {
                    // Storage::disk('public')->delete($portflio->image);
                    if (File::exists(public_path('backend/' . $portflio->image))) {
                        File::delete(public_path('backend/' . $portflio->image));
                    }
                }
                $upImage = Helper::upload_image($request->file('image'), 'portfolio', 412, null);
                $data['image'] = $upImage['image'];
            }
            $portflio->update($data);
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
            $data = Portfolio::findOrFail($id);
            if ($data->image != null) {
                try {
                    // Storage::disk('public')->delete($data->image);
                    if (File::exists(public_path('backend/' . $data->image))) {
                        File::delete(public_path('backend/' . $data->image));
                    }
                } catch (\Exception $e) {
                }
            }
            $data->delete();
            DB::commit();
            return response()->json(['message' => 'Successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Something broke'], 500);
        }
    }

    public function status($id = null)
    {
        $data = Portfolio::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
