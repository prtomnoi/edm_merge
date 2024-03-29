<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\PortfolioItemCollection;
use App\Models\PortfolioItem;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $portfolioitems = PortfolioItem::when(request()->has('search'), function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')->orWhere('title_en', 'like', '%' . request('search') . '%');
            })->where('status', 'published')->orderBy('created_at', 'desc')->get();
            // $portfolioitems->pages = new \stdClass;
            // $portfolioitems->pages->start = $portfolioitems->perPage() * $portfolioitems->currentPage() - $portfolioitems->perPage();
            return new PortfolioItemCollection($portfolioitems);
        } catch (\Exception $e) {
            return response()->json(['data' => [], 'code'=> 500, 'message' => 'error fetch data']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    public function indexLimit($limit)
    {
        $portfolioitems = PortfolioItem::where('status', 'published')->orderBy('created_at', 'desc')->take($limit)->get();
        return new PortfolioItemCollection($portfolioitems);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portfolioitems = PortfolioItem::where('status', 'published')->where("id", $id)->get();
        return new PortfolioItemCollection($portfolioitems);
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
