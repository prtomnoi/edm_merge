<?php

namespace App\Http\Controllers\Backend;
use App\Models\VTuberGallery;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class VTuberGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vtuberGallery = VTuberGallery::all();
        return view('vtuberGallery.index', ['vtuberGallery' => $vtuberGallery]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vtuberGallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required|in:draft,published',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
    
            // Resize the image with a maximum width of 412 and an automatically calculated height
            $resizedImage = Image::make($image)->resize(412, null, function ($constraint) {
                $constraint->aspectRatio();
            });
    
       
            $upImage = Helper::upload_image($resizedImage->stream(), 'vtuber', null, null); 
            $validatedData['image'] = $upImage['image'];
        }
    
        $validatedData['path'] = "vtuber";
        
        VTuberGallery::create($validatedData);
    
        return redirect('/vtuber-gallery')->with('success', 'VTuber image added successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $data = VTuberGallery::findOrFail($id);
            if ($data->image != null) {
                try {
                    Storage::disk('public')->delete($data->image);
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
        $data = VTuberGallery::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
