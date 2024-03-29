<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\VtuberVideoCollection;
use App\Models\Influencer;

class VtuberVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vtuber = Influencer::where('status', 'published')->where("type_name" , "vtuber")->get();
        return new VtuberVideoCollection($vtuber);
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
        //
    }
}
