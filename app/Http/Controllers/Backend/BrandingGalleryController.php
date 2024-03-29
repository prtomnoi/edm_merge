<?php

namespace App\Http\Controllers\Backend;
use App\Models\BrandingGallery;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class BrandingGalleryController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brandingGallery = BrandingGallery::all();
        return view('brandingGallery.index', ['brandingGallery' => $brandingGallery]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brandingGallery.create');
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
    
       
            $upImage = Helper::upload_image($resizedImage->stream(), 'branding', 412, null); 
            $validatedData['image'] = $upImage['image'];
        }
        
      
        $validatedData['path'] = "branding";
        
        BrandingGallery::create($validatedData);

        return redirect('/branding-gallery')->with('success', 'Branding image added successfully.');
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
            $data = BrandingGallery::findOrFail($id);
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
        $data = BrandingGallery::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
