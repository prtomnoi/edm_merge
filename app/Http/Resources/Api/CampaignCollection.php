<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CampaignCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($campaign) {
            return [
                'id' => $campaign->id,
                'title' => $campaign->title,
                'title_en' => $campaign->title_en,
                'short_detail' => $campaign->short_detail,
                'short_detail_en' => $campaign->short_detail_en,
                'detail' => $campaign->detail,
                'detail_en' => $campaign->detail_en,
                'image' => 'https://edmcompany.co.th/backend/'.$campaign->image,
                'status' => $campaign->status,
                'created_at' => $campaign->created_at->format('M d Y'),
                'signature' => $campaign->signature, 
                'group' =>  $campaign->group->pluck('name')->implode(','),
            ];
        });
    }
}
