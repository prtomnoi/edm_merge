<?php

namespace App\Http\Controllers\Backend;
use App\Models\VtuberVideo;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VtuberVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vtubervideo = VtuberVideo::all();
        return view('vtuber-video.index', ['data' => $vtubervideo]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vtuber-video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'link' => 'required|url',
            'status' => 'required|in:draft,published',
        ]);

        $videoId = Helper::getYouTubeVideoId($request->input('link')); 

        if (strpos($request->input('link'), 'https://www.youtube.com/embed/') !== false) {
            $embedLink = $request->input('link');
        } else {
            $embedLink = "https://www.youtube.com/embed/$videoId";
        }

        $validatedData['link'] = $embedLink;

        VtuberVideo::create($validatedData);

        return redirect('/vtuber-video')->with('success', 'VTuber video added successfully.');
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
        $VtuberVideo = VtuberVideo::findOrfail($id);
        return view('vtuber-video.edit', ['data' => $VtuberVideo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $VtuberVideo = VtuberVideo::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required',
            'link' => 'required|url',
            'status' => 'required|in:draft,published',
        ]);

        $videoId = Helper::getYouTubeVideoId($request->input('link')); 

        if (strpos($request->input('link'), 'https://www.youtube.com/embed/') !== false) {
            $embedLink = $request->input('link');
        } else {
            $embedLink = "https://www.youtube.com/embed/$videoId";
        }

        $validatedData['link'] = $embedLink;

        $VtuberVideo->update($validatedData);

        return redirect('/vtuber-video')->with('success', 'VTuber video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $data = VtuberVideo::findOrFail($id);
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
        $data = VtuberVideo::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
