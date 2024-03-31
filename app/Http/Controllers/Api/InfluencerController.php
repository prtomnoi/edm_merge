<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\InfluencerCollection;
use App\Models\Influencer;

class InfluencerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $influencers = Influencer::where('status', 'published')->orderByDesc('created_at')->get();
        return new InfluencerCollection($influencers);
    }

    public function random()
    {
        $influencers = Influencer::where('status', 'published')->inRandomOrder()->get();
        return new InfluencerCollection($influencers);
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
        $influencers = Influencer::where('status', 'published')->where("id" , $id)->get();
        return new InfluencerCollection($influencers);

    }

    public function showLimit($limit)
    {
        $influencers = Influencer::where('status', 'published')
                                 ->orderBy('created_at', 'desc') // You can change the sorting as needed
                                 ->take($limit)
                                 ->get();

        return new InfluencerCollection($influencers);
    }

    public function showByType($type)
    {
        $influencers = Influencer::where('status', 'published')->where('type_name', $type)
                                 ->orderBy('created_at', 'desc') // You can change the sorting as needed
                                 ->get();

        return new InfluencerCollection($influencers);
    }
    public function showPin()
    {
        $influencers = Influencer::where('status', 'published')->where("pin" , '1')
                                 ->orderBy('created_at', 'desc')
                                 ->get();


        return new InfluencerCollection($influencers);
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
