<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ComplaintModel;
use App\Models\District;
use App\Models\Region;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = ComplaintModel::query()->get();
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


    public function getDistricts($regionId)
    {
        $districts = District::query()->where('region_fk', '=', $regionId)->get();

        if (!$districts) {
            return response()->json([]);
        }

        $districts = $districts->District;

        return response()->json($districts);
    }


    public function destroy($id)
    {
        $com = ComplaintModel::query()->find($id);
        $com->delete();

        return to_route('complaints.index')->with('message', 'Record Deleted Successfully');
    }
}
