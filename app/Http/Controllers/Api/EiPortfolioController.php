<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models as Models;
use App\Http\Resources as Resources;

class EiPortfolioController extends Controller
{
    public function index(Request $request)
    {
        try {
            $paginate = $request->has('paginate') ? $request->paginate : 15;
            $portfolioitems = Models\EiPortfolio::when(request()->has('search'), function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')->orWhere('title_en', 'like', '%' . request('search') . '%');
            })
            ->when(request()->has('type'), function($query){
                $query->where('type', request('type'));
            })
            ->where('status', 'published')->orderBy('created_at', 'desc')->paginate($paginate);
            // $portfolioitems->pages = new \stdClass;
            // $portfolioitems->pages->start = $portfolioitems->perPage() * $portfolioitems->currentPage() - $portfolioitems->perPage();
            return new Resources\Api\EiPortfolioCollection($portfolioitems);
        } catch (\Exception $e) {
            return response()->json(['data' => [], 'code'=> 500, 'message' => 'error fetch data']);
        }
    }

    public function indexLimit($limit)
    {
        $portfolioitems = Models\EiPortfolio::where('status', 'published')->orderBy('created_at', 'desc')->take($limit)->get();
        return new Resources\Api\EiPortfolioCollection($portfolioitems);
    }

    public function show(string $id)
    {
        $portfolioitems = Models\EiPortfolio::where('status', 'published')->where("id", $id)->get();
        return new Resources\Api\EiPortfolioCollection($portfolioitems);
    }
}
