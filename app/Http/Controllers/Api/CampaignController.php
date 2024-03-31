<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\CampaignCollection;
use App\Models\Campaign;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::when(request()->has('search'), function ($query) {
            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('short_detail', 'like', '%' . request('search') . '%');
        })->where('status', 'published')->orderBy('created_at', 'desc')->get();
        return new CampaignCollection($campaigns);
    }

    public function limit($limit)
    {
        $campaigns = Campaign::where('status', 'published')->orderBy('created_at', 'desc')->take($limit)->get();
        return new CampaignCollection($campaigns);
    }

    public function top()
    {
        $campaigns = Campaign::where('status', 'published')->where('top', '1')->orderByDesc('created_at')->get();
        return new CampaignCollection($campaigns);

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
        $campaigns = Campaign::where('status', 'published')->where('id', $id)->get();
        return new CampaignCollection($campaigns);
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
