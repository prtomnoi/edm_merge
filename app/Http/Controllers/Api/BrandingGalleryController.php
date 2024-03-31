<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\BrandingGalleryCollection;
use App\Models\BrandingGallery;

class BrandingGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $influencer = BrandingGallery::where('status', 'published')->orderByDesc('created_at')->get();
        return new BrandingGalleryCollection($influencer);
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
