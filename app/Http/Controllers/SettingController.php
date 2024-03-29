<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SettingController extends Controller
{
    public function getLink()
    {
        try {
            $data = null;
            $response = Http::get("https://edm.desdev.me/api/settings/");
            if ($response->status() == 200) {
                $data = $response->json();
            }
            // dd($data);
            return view("gadget-menu", compact("data"));
        } catch (\Exception $e) {
            $data = null;
            return view("gadget-menu", compact("data"));
        }
    }
}
