<?php

namespace App\Http\Controllers\Backend;

use App\Models\Campaign;
use App\Models\Group;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $namePage = 'Campaigns';
    protected $folder = 'campaign';

    public function index()
    {
        $items = Campaign::all();
        return view("Backend.campaign.index", [
            'items' => $items,
            'name_page' => $this->namePage,
            'folder' => $this->folder,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        $providers = Provider::all();
        return view("Backend.campaign.create", [
            'name_page' => $this->namePage,
            'folder' => $this->folder,
            'groups' => $groups,
            'providers' => $providers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'string|max:255|nullable',
            'short_detail' => 'required|string',
            'short_detail_en' => 'string|nullable',
            'detail' => 'string|nullable',
            'detail_en' => 'string|nullable',
            'signature' => 'string|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:3072|required',
            'status' => 'required|in:draft,published',
            'provider_id' => 'required|exists:providers,id',
            'group_id' => 'required|exists:table_group,id',
            'top' => 'sometimes|in:on',
        ]);

        try {
            DB::beginTransaction();


            $transformedData = [
                'top' => isset($data['top']) ? '1' : '0',
            ];

            $data = array_merge($data, $transformedData);

            // Upload the image and save its path in the database
            if ($request->hasFile('image')) {
                $upImage = Helper::upload_image($request->file('image'), 'campaign', 412, null);
                $data['image'] = $upImage['image'];
            }
            Campaign::create($data);
            DB::commit();
            return redirect()->route("$this->folder.index")->with('success', "$this->namePage created successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groups = Group::all();
        $providers = Provider::all();
        $data = Campaign::findOrFail($id);
        return view("Backend.campaign.edit", [
            'name_page' => $this->namePage,
            'folder' => $this->folder,
            'row' => $data,
            'groups' => $groups,
            'providers' => $providers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $campaign = Campaign::findOrFail($id);
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'title_en' => 'string|max:255',
                'short_detail' => 'required|string',
                'short_detail_en' => 'string',
                'detail' => 'required|string',
                'detail_en' => 'string',
                'signature' => 'string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:3072',
                'status' => 'required|in:draft,published',
                'provider_id' => 'required|exists:providers,id',
                'group_id' => 'required|exists:table_group,id',
                'top' => 'sometimes|in:on',
            ]);

            $transformedData = [
                'top' => isset($data['top']) ? '1' : '0',
            ];

            $data = array_merge($data, $transformedData);


            // Upload the image and save its path in the database
            if ($request->hasFile('image')) {
                if ($campaign->image != null) {
                    Storage::disk('public')->delete($campaign->image);
                }
                $upImage = Helper::upload_image($request->file('image'), 'campaign', 412, null);
                $data['image'] = $upImage['image'];
            }
            $campaign->update($data);
            DB::commit();
            return redirect()->route("$this->folder.index")->with('success', "$this->namePage updated successfully!");
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $data = Campaign::findOrFail($id);
            if ($data->image != null) {
                try {
                    Storage::disk('public')->delete($data->image);
                } catch (\Exception $e) {
                }
            }
            $data->delete();
            DB::commit();
            return response()->json(['message' => 'Successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Something broke'], 500);
        }
    }

    public function status($id = null)
    {
        $data = Campaign::findOrFail($id);
        $data->status = ($data->status == 'draft') ? 'published' : 'draft';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
