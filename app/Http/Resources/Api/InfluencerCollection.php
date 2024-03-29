<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InfluencerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($influencer) {
            return [
                'id' => $influencer->id,
                'name' => $influencer->name,
                'title' => $influencer->title,
                'facebook' => $influencer->facebook,
                'facebook_subscribe' => $influencer->facebook_subscribe,
                'facebook_url' => $influencer->facebook_url,
                'twitter' => $influencer->twitter,
                'twitter_subscribe' => $influencer->twitter_subscribe,
                'twitter_url' => $influencer->twitter_url,
                'youtube' => $influencer->youtube,
                'youtube_subscribe' => $influencer->youtube_subscribe,
                'youtube_url' => $influencer->youtube_url,
                'instagram' => $influencer->instagram,
                'instagram_subscribe' => $influencer->instagram_subscribe,
                'instagram_url' => $influencer->instagram_url,
                'icon' => 'https://edmcompany.co.th/backend/'.$influencer->icon,
                'image' => 'https://edmcompany.co.th/backend/'.$influencer->image,
                'status' => $influencer->status,
            ];
        });
    }
}
