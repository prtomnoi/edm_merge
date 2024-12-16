<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models as Models;

class ContractCenter extends Controller
{
    public function store(Request $request){

        try {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'message' => 'nullable|string|max:2048',
                'company' => 'required|integer|max:1',
            ]);
            DB::beginTransaction();
            $main = Models\ContactCenter::create($validate);
            DB::commit();
            return response()->json(['message' => 'insert success', 'error', null, 'code' => 200, 'data' => $main]);
        } catch (\Exception $e)
        {
            DB::rollBack();
            Log::error('contract error', [$e->getMessage()]);
            return response()->json(['message' => 'cannot insert contract', 'error' => $e->getMessage(), 'code' => $e->getCode()], 401);
        }
    }
}
