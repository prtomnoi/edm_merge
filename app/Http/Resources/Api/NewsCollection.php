<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($news) {
            return [
                'id' => $news->id,
                'title' => $news->title,
                'title_en' => $news->title_en,
                'short_detail' => $news->short_detail,
                'short_detail_en' => $news->short_detail_en,
                'detail' => $news->detail,
                'detail_en' => $news->detail_en,
                'image' => 'https://edmcompany.co.th/backend/'.$news->image,
                'status' => $news->status,
                'provider_id' => $news->provider_id,
                'created_at' => $news->created_at->format('M d Y'),
                'signature' => $news->signature, 
                'type' =>  $news->category->pluck('name')->implode(','),
            ];
        });
    }
}
