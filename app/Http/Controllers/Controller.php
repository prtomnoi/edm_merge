<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getLink()
    {
        try {
            $data = [];
            $response = Http::get("https://edm.desdev.me/api/settings/");
            if ($response->status() == 200) {
                $data = $response->json();
            }
            // dd($data);
            return view("gadget-menu", compact("data"));
        } catch (\Exception $e) {
            $data = [];
            return view("gadget-menu", compact("data"));
        }
    }
}
