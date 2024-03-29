<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PortfolioCollection extends ResourceCollection
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
                'title' => $portfolio->name,
                'link' => $portfolio->link,
                'group_id' => $portfolio->group_id,
                'image' => 'https://edmcompany.co.th/backend/'.$portfolio->image, 
            ];
        });
    }
}
