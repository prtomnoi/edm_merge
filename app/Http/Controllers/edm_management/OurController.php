<?php

namespace App\Http\Controllers\edm_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OurController extends Controller
{
    public function index()
    {
        return view("edm-management.our.index");
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        return view("edm-management.our.show", compact('id'));
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
