<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EiPortfolioCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {

        return $this->collection->map(function ($portfolio) {
            $url = env("APP_URL", "https://edmcompany.co.th");
            return [
                'id' => $portfolio->id,
                'title' => $portfolio->title,
                'title_en' => $portfolio->title_en,
                'short_detail' => $portfolio->short_detail,
                'short_detail_en' => $portfolio->short_detail_en,
                'detail' =>  preg_replace_callback(
                    '/src="([^"]+)"/', // ค้นหา src="..."
                    function ($matches) use ($url) {
                        // เพิ่ม base_url เข้าไปใน path
                        return 'src="' . $url . $matches[1] . '"';
                    },
                    $portfolio->detail
                ),
                'detail_en' => preg_replace_callback(
                    '/src="([^"]+)"/', // ค้นหา src="..."
                    function ($matches) use ($url) {
                        // เพิ่ม base_url เข้าไปใน path
                        return 'src="' . $url . $matches[1] . '"';
                    },
                    $portfolio->detail_en
                ),
                'date' => $portfolio->date,
                'image' => 'https://edmcompany.co.th/backend/'.$portfolio->image, // Full URL to the image
                'status' => $portfolio->status,
                'signature' => $portfolio->signature,
                'created_at' => $portfolio->created_at->format('M d Y'),
                'images' => PortfolioItemImageResource::collection($portfolio->images),
                'type' => $portfolio->type
            ];
        });
    }
}
