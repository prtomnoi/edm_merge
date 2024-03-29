<?php

namespace App\Http\Controllers\Backend;
use App\Models\InfluencerVideo;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfluencerVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $influencerVideo = InfluencerVideo::all();
        return view('influencer-video.index', ['influencerVideo' => $influencerVideo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('influencer-video.create');
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

        InfluencerVideo::create($validatedData);

        return redirect('/influencer-video')->with('success', 'Influencer video added successfully.');
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
        $influencerVideo = InfluencerVideo::findOrfail($id);
        return view('influencer-video.edit', ['data' => $influencerVideo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $InfluencerVideo = InfluencerVideo::findOrFail($id);

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

        $InfluencerVideo->update($validatedData);

        return redirect('/influencer-video')->with('success', 'Influencer video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $data = InfluencerVideo::findOrFail($id);
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
        $data = InfluencerVideo::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    
}
