<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintStoreRequest;
use App\Models\Complaint;
use App\Models\District;
use App\Models\Region;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    public function index()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_NEW)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'New Complaints',
            'hasNew' => true,
            'hasActions' => true
        ]);
    }

    public function submitted()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_SUBMITTED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Submitted Complaints',
        ]);
    }

    public function received()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_RECEIVED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Received Complaints',
        ]);
    }

    public function processed()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_PROCESSED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Processed Complaints',
        ]);
    }

    public function resolved()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_RESOLVED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Resolved Complaints',
        ]);
    }

    public function closed()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_CLOSED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Closed Complaints',
        ]);
    }

    public function reopened()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_REOPENED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Reopened Complaints',
        ]);
    }



    public function create()
    {
        return view('complaints.create');
    }




    public function edit(Complaint $complaint)
    {
        return view('complaints.edit', compact('complaint'));
    }

    public function destroy($id)
    {
        $com = Complaint::query()->find($id);
        $com->delete();

        return to_route('complaints.index')->with('message', 'Record Deleted Successfully');
    }

    public function loadDistricts(Request $request)
    {
        $districts = DB::table('district')
            ->where('region_id', '=', $request->region)
            ->orderBy('District')
            ->get();
        return response()->json(['options' => $districts]);
    }

    public function loadConstituencies(Request $request)
    {
        $constituencies = DB::table('vw_ec_data_constituency')
            ->where('region_id', '=', $request->region)
            ->orderBy('constituency_name')
            ->get();
        return response()->json(['options' => $constituencies]);
    }

    public function loadElectoralAreas(Request $request)
    {
        $electoralAreas = DB::table('vw_ec_data_electoral_area')
            ->where('constituency_id', '=', $request->constituency)
            ->orderBy('ea_name')
            ->get();
        return response()->json(['options' => $electoralAreas]);
    }

    public function loadPollingStation(Request $request)
    {
        $pollingStations = DB::table('ec_data')
            ->where('ea_id', '=', $request->electoralArea)
            ->orderBy('ps_name')
            ->get();
        return response()->json(['options' => $pollingStations]);
    }


}
