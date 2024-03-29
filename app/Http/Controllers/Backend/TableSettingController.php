<?php

namespace App\Http\Controllers\Backend;
use App\Models\TableSetting;
use Illuminate\Http\Request;

class TableSettingController extends Controller
{
    public function index()
    {
        $tableSetting = TableSetting::first();
        return view('table-settings.index', compact('tableSetting'));
    }

    public function edit($id)
    {
        $tableSetting = TableSetting::findOrFail($id);
        return view('table-settings.edit', compact('tableSetting'));
    }

    public function update(Request $request, $id)
    {
        $tableSetting = TableSetting::findOrFail($id);
        $tableSetting->update($request->all());
        return redirect()->route('table-settings.index')
            ->with('success', 'Table settings updated successfully');
    }
}
