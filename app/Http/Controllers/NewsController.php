<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        return view("news.index");
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        return view("news.show", compact("id"));
    }

    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
