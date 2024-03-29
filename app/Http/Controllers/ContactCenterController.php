<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models as AppModel;

class ContactCenterController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        try
        {
            $validate = $request->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|string|max:255',
                'phone' => 'sometimes|string|max:20',
                'user_company' => 'sometimes|string|max:255',
                'message' => 'sometimes',
                'company' => 'sometimes|string|max:255',
                'status_email' => 'sometimes|string|max:255'
            ]);
            $data = AppModel\ContactCenter::create($validate);
            return response()->json([
                'code' => 200,
                'data' => $data,
            ]);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'code' => 500,
                'message' => 'error can send message'
            ]);
        }
    }

    public function show()
    {

    }

    public function destory()
    {

    }
}
