<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PortfolioItemCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->map(function ($portfolio) {
            return [
                'id' => $portfolio->id,
                'title' => $portfolio->title,
                'title_en' => $portfolio->title_en,
                'short_detail' => $portfolio->short_detail,
                'short_detail_en' => $portfolio->short_detail_en,
                'detail' => $portfolio->detail,
                'detail_en' => $portfolio->detail_en,
                'event_date' => $portfolio->event_date,
                'image' => 'https://edmcompany.co.th/backend/'.$portfolio->image, // Full URL to the image
                'status' => $portfolio->status,
                'signature' => $portfolio->signature, 
                'created_at' => $portfolio->created_at->format('M d Y'),
                'images' => PortfolioItemImageResource::collection($portfolio->images),
            ];
        });
    }
}
