<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $groups = Group::all();
        return view('Backend.groups.index', compact('groups'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('Backend.groups.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        Group::create($request->all());
        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    // Display the specified resource.
    public function show(Group $group)
    {
        return view('Backend.groups.show', compact('group'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('Backend.groups.edit', compact('group'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Group $group)
    {
        $group->update($request->all());
        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $group = Group::findOrFail($id);
            $group->delete();
            DB::commit();
            return response()->json(['message' => 'Successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Something broke'], 500);
        }
    }
}
