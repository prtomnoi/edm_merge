<?php

namespace App\Http\Controllers\Backend;

use App\Models\Influencer;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class InfluencerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $namePage = 'Influencer';
    protected $folder = 'influencer';

    public function index()
    {
        $items = Influencer::orderBy('created_at', 'desc') ->get();
        return view("Backend.influencer.index", [
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
        return view("Backend.influencer.create", [
            'name_page' => $this->namePage,
            'folder' => $this->folder,
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
                'title' => 'required|string|max:255',
                'facebook' => 'string|max:255|nullable',
                'facebook_subscribe' => 'string|max:255|nullable',
                'facebook_url' => 'string|max:255|nullable',
                'twitter' => 'string|max:255|nullable',
                'twitter_subscribe' => 'string|max:255|nullable',
                'twitter_url' => 'string|max:255|nullable',
                'youtube' => 'string|max:255|nullable',
                'youtube_subscribe' => 'string|max:255|nullable',
                'youtube_url' => 'string|max:255|nullable',
                'instagram' => 'string|max:255|nullable',
                'instagram_subscribe' => 'string|max:255|nullable',
                'instagram_url' => 'string|max:255|nullable',
                'video_link' => 'string|max:255|nullable',
                'type_name' => 'required',
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
                'status' => 'required|in:draft,published',
                'pin' => 'sometimes|in:on',

            ]);

            if ($data['youtube_subscribe'] !== null) {
                $data['youtube_subscribe'] = intval(str_replace(',', '', $data['youtube_subscribe']));
            }

            $transformedData = [
                'pin' => isset($data['pin']) ? '1' : '0',
            ];

            $videoId = Helper::getYouTubeVideoId($request->input('video_link'));

            if (strpos($request->input('video_link'), 'https://www.youtube.com/embed/') !== false) {
                $embedLink = $request->input('video_link');
            } else {
                $embedLink = "https://www.youtube.com/embed/$videoId";
            }

            $data['video_link'] = $embedLink;


            $data = array_merge($data, $transformedData);

            // Upload the image and save its path in the database
            if ($request->hasFile('icon')) {
                $upImage = Helper::upload_image($request->file('icon'), 'influencer/icon', 77, 77);
                $data['icon'] = $upImage['image'];
            }
            if ($request->hasFile('image')) {
                $upImage = Helper::upload_image($request->file('image'), 'influencer', 301, null);
                $data['image'] = $upImage['image'];
            }
            Influencer::create($data);
            DB::commit();
            return redirect()->route("$this->folder.index")->with('success', "$this->namePage created successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Influencer $Influencer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Influencer::findOrFail($id);
        return view("Backend.influencer.edit", [
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
        $influencer = Influencer::findOrFail($id);
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'facebook' => 'string|max:255|nullable',
                'facebook_subscribe' => 'string|max:255|nullable',
                'facebook_url' => 'string|max:255|nullable',
                'twitter' => 'string|max:255|nullable',
                'twitter_subscribe' => 'string|max:255|nullable',
                'twitter_url' => 'string|max:255|nullable',
                'youtube' => 'string|max:255|nullable',
                'youtube_subscribe' => 'string|max:255|nullable',
                'youtube_url' => 'string|max:255|nullable',
                'instagram' => 'string|max:255|nullable',
                'instagram_subscribe' => 'string|max:255|nullable',
                'instagram_url' => 'string|max:255|nullable',
                'video_link' => 'string|max:255|nullable',
                'type_name' => 'required',
                'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:3072|nullable',
                'status' => 'required|in:draft,published',
                'pin' => 'sometimes|in:on',
            ]);

            if ($data['youtube_subscribe'] !== null) {
                $data['youtube_subscribe'] = intval(str_replace(',', '', $data['youtube_subscribe']));
            }

            $transformedData = [
                'pin' => isset($data['pin']) ? '1' : '0',
            ];

            $data = array_merge($data, $transformedData);

            $videoId = Helper::getYouTubeVideoId($request->input('video_link'));

            if (strpos($request->input('video_link'), 'https://www.youtube.com/embed/') !== false) {
                $embedLink = $request->input('video_link');
            } else {
                $embedLink = "https://www.youtube.com/embed/$videoId";
            }

            $data['video_link'] = $embedLink;


            // Upload the image and save its path in the database
            if ($request->hasFile('icon')) {
                if ($influencer->icon != null) {
                    // Storage::disk('public')->delete($influencer->icon);
                    if (File::exists(public_path('backend/' . $influencer->icon))) {
                        File::delete(public_path('backend/' . $influencer->icon));
                    }
                }
                $upImage = Helper::upload_image($request->file('icon'), 'influencer/icon', 77, 77);
                $data['icon'] = $upImage['image'];
            }

            if ($request->hasFile('image')) {
                if ($influencer->image != null) {
                    // Storage::disk('public')->delete($influencer->image);
                    if (File::exists(public_path('backend/' . $influencer->image))) {
                        File::delete(public_path('backend/' . $influencer->image));
                    }
                }
                $upImage = Helper::upload_image($request->file('image'), 'influencer', 301, null);
                $data['image'] = $upImage['image'];
            }
            $influencer->update($data);
            DB::commit();
            return redirect()->route("$this->folder.index")->with('success', "$this->namePage created successfully!");
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $data = Influencer::findOrFail($id);
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
        $data = Influencer::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
