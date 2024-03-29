<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __invoke(Request $request)
    {   
        $name = $request->name;
        $response = Http::get('https://backend.edmcompany.co.th/public/api/v1/creator/lists/?channel_name='.$name.'&api_key=4d11186824e79140d3bce71551d0d829a4753d1bf3fb5ce4b6c7e8452a0f76');
        $data = $response->json();
    
        return response()->json($data);
    }
}
