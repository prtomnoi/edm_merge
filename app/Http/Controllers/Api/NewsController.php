<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\NewsCollection;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // update paginate and search title and short_detail by @kritapas 21/3/2024
        try {
            $news = News::when(request()->has('search'), function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')->orWhere('short_detail', 'like', '%' . request('search') . '%');
            })->where('status', 'published')->orderBy('created_at', 'desc')->get();
            // $news->pages = new \stdClass;
            // $news->pages->start = $news->perPage() * $news->currentPage() - $news->perPage();
            return new NewsCollection($news);
        } catch (\Exception $e) {
            $news = News::where('status', 'published')->orderByDesc('created_at')->get();
            return $news;
        }
    }

    public function indexLimit($limit)
    {
        $news = News::where('status', 'published')->take($limit)->get();
        return new NewsCollection($news);
    }

    public function pin()
    {
        $news = News::where('status', 'published')->where('pin', '1')->orderByDesc('created_at')->get();
        return new NewsCollection($news);
    }
    public function top()
    {
        $news = News::where('status', 'published')->where('top', '1')->orderByDesc('created_at')->get();
        return new NewsCollection($news);
    }

    public function provider($id)
    {
        $news = News::where('status', 'published')
            ->where('provider_id', $id)
            ->get();
        return new NewsCollection($news);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $news = News::where('status', 'published')->where("id", $id)->get();
        return new NewsCollection($news);
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
        //
    }
}
