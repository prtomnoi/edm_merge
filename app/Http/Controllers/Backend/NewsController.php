<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Models\News;
use App\Models\Provider;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        $categorys = Category::all();
        return view('news.create', compact('providers', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $data = $request->validate([
                'title' => 'string|max:255|nullable',
                'title_en' => 'string|max:255|nullable',
                'short_detail' => 'string|nullable',
                'short_detail_en' => 'string|nullable',
                'detail' => 'string|nullable',
                'detail_en' => 'string|nullable',
                'signature' => 'string|nullable',
                'pin' => 'sometimes|in:on',
                'top' => 'sometimes|in:on',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:3072',
                'status' => 'required|in:draft,published',
                'provider_id' => 'required|exists:providers,id',
                'news_category' => 'required|exists:category,id',
            ]);
            // Upload the image and save its path in the database
            if ($request->hasFile('image')) {
                $upImage = Helper::upload_image($request->file('image'), 'news', 412, null);
                // $imagePath = $request->file('image')->store('news_images', 'public');
                $data['image'] = $upImage['image'];
            }
            $transformedData = [
                'pin' => isset($data['pin']) ? '1' : '0',
                'top' => isset($data['top']) ? '1' : '0',
            ];
            // check for slug
            $checkSlug = News::where('slug', $request->slug)->get()->last();
            if ($checkSlug) {
                $i = 1;
                $check = true;
                while ($check) {
                    $data['slug'] = $request->slug . '-' . (string)$i;
                    $checkSlug = News::where('slug', $data['slug'])->get()->last();
                    if(!$checkSlug){
                        $check = false;
                        break;
                    }
                    $i++;
                }
            }
            else
            {
                $data['slug'] = $request->slug;
            }
            // end for check slug
            $data = array_merge($data, $transformedData);
            News::create($data);
            DB::commit();
            return redirect()->route('news.index')->with('success', 'News created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        $providers = Provider::all();
        $categorys = Category::all();
        return view('news.edit', compact('news', 'providers', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        try {
            DB::beginTransaction();
            $data = $request->validate([
                'title' => 'string|max:255|nullable',
                'title_en' => 'string|max:255|nullable',
                'short_detail' => 'string|nullable',
                'short_detail_en' => 'string|nullable',
                'detail' => 'string|nullable',
                'detail_en' => 'string|nullable',
                'signature' => 'string|nullable',
                'pin' => 'sometimes|in:on',
                'top' => 'sometimes|in:on',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:3072',
                'status' => 'required|in:draft,published',
                'provider_id' => 'required|exists:providers,id',
                'news_category' => 'required|exists:category,id',
            ]);

            // Upload the image and save its path in the database
            if ($request->hasFile('image')) {
                if ($news->image != null) {
                    Storage::disk('public')->delete($news->image);
                }
                $upImage = Helper::upload_image($request->file('image'), 'news', 412, null);
                $data['image'] = $upImage['image'];
            }
            $transformedData = [
                'pin' => isset($data['pin']) ? '1' : '0',
                'top' => isset($data['top']) ? '1' : '0',
            ];

            $data = array_merge($data, $transformedData);

            $news->update($data);
            DB::commit();
            return redirect()->route('news.index')->with('success', 'News updated successfully!');
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
            $news = News::findOrFail($id);
            if ($news->image != null) {
                try {
                    Storage::disk('public')->delete($news->image);
                } catch (\Exception $e) {
                }
            }
            $news->delete();
            DB::commit();
            return response()->json(['message' => 'Successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Something broke'], 500);
        }
    }

    public function status($id = null)
    {
        $data = News::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
