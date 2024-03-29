<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurController extends Controller
{
    public function index()
    {
        return view("edm-media.our.index");
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        return view("edm-media.our.show", compact('id'));
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
