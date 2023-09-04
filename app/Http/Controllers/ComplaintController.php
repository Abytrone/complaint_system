<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Complaint;
use App\Models\District;
use App\Models\Region;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::query()->get();
        return view('complaints.index', ['complaints' => $complaints]);
    }

    public function create()
    {
        $regions = Region::query()->get();
        return view('complaints.create', [
            'regions' => $regions,
            'categories' => DB::table('issue_category')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required',
            'region_id' => 'required',
            'mmda_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'sex' => 'required',
            'mode' => 'required',
            'raw' => 'required',
            // 'longitude' => 'nullable',
            // 'latitude' => 'nullable',
        ]);
        // return $data;

        Complaint::query()->create($data);
        return to_route('complaints.index')->with('Message', 'Record Added Successfylly');
    }

    public function show(Complaint $complaint)
    {
        $region = Region::query()->where('id', '=', $complaint->region_id)->first();
        $category = DB::table('issue_category')->where('id', '=', $complaint->category_id)->first();
        $district = District::query()->where('id', '=', $complaint->mmda_id)->first();
        return view('complaints.show', ['complaint' => $complaint, 'region' => $region, 'category' => $category, 'district' => $district]);
    }

    public function edit(Complaint $complaint)
    {
        $regions = Region::query()->get();
        $categories = DB::table('issue_category')->get();
        return view('complaints.edit', ['complaint' => $complaint, 'regions' => $regions, 'categories' => $categories]);
    }

    public function update(Request $request, Complaint $complaint)
    {
        // return $request->all();
        $data = $request->validate([
            'code' => 'required',
            'region_id' => 'required',
            'mmda_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'sex' => 'required',
            'mode' => 'required',
            'raw' => 'required',
            // 'longitude' => 'nullable',
            // 'latitude' => 'nullable',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('images', 'public'); // Store the uploaded image
        //     // You can save $imagePath to your database or perform any other actions you need
        // }

        $complaint->update($data);
        return to_route('complaints.index')->with('Message', 'Record Updated Successfylly');
    }

    public function loadDistricts(Request $request)
    {
        $districts = DB::table('district')
            ->where('region_fk', '=', $request->id)
            ->orderBy('District')
            ->get();
        return response()->json(['options' => $districts]);

        // $districts = $region->districts; // Use the 'districts()' method
        // return response()->json($districts);
    }

    public function destroy($id)
    {
        $com = Complaint::query()->find($id);
        $com->delete();

        return to_route('complaints.index')->with('message', 'Record Deleted Successfully');
    }
}
