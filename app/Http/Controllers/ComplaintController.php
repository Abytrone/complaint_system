<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintStoreRequest;
use App\Models\Complaint;
use App\Models\District;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::query()->get();
        return view('complaints.index', ['complaints' => $complaints]);
    }

    public function create()
    {
        //get fieldname to help separate function for loading district and constituency base on region
        $fieldnames=DB::table('vw_issue_category_field')->select(['field_name', 'field_fk'])->where('display', '=',1)->get()
        ->map(function($data){
            return $data->field_name;
        })->toArray();
   // dd(Helper::dynamicFieldsValidation());

        $regions = Region::query()->where('id', '>', 0)->orderBy('region')->get();
        return view('complaints.create', [
            'regions' => $regions,
            'districts'=>DB::table('district')->where('id', '>', 0)->orderBy('district')->get(),
            'categories' => DB::table('issue_category')->where('active', '=', 1)->get(),
            'subcategories'=>DB::table('vw_issue_subcategory')->where('category_fk', '=', 1)->orderBy('description')->get(),
            'issuesources'=>DB::table('issue_source')->get(),
            'modes'=>DB::table('communication_mode')->get(),
            'displayfields'=>DB::table('vw_issue_category_field')->select(['field_name', 'field_fk'])->where('display', '=',1)->get()->toArray(),
            'constituencies'=>DB::table('vw_ec_data_constituency')->where('constituency_id', '>', 0)->get(),
            'electoralareas'=>DB::table('vw_ec_data_electoral_area')->where('ea_id', '>', 0)->get(),
            'fieldnames'=>$fieldnames,
        ]);
    }

    public function store(ComplaintStoreRequest $request)
    {
        $insertData = array_merge($request->validated(), [
            'code' => Str::random(10),
            'created_by' => auth()->id(),
            'created_date'=>Carbon::now()
        ]);
        DB::table('issue_master')->insert($insertData);
//        Complaint::query()->create($insertData);
        return to_route('complaints.create')->with('message', 'Record Added Successfylly');
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
            ->where('region_fk', '=', $request->region)
            ->orderBy('District')
            ->get();
        return response()->json(['options' => $districts]);

    }

    public function loadConstituencies(Request $request)
    {
        $constituencies = DB::table('vw_ec_data_constituency')
            ->where('region_fk', '=', $request->region)
            ->orderBy('constituency_name')
            ->get();
        return response()->json(['options'=>$constituencies]);
    }

    public function loadElectoralAreas(Request $request){
        $electoralAreas = DB::table('vw_ec_data_electoral_area')
            ->where('constituency_id', '=', $request->constituency)
            ->orderBy('ea_name')
            ->get();
        return response()->json(['options'=>$electoralAreas]);
    }

    public function loadPollingStation(Request $request){
        $pollingStations = DB::table('ec_data')
            ->where('ea_id', '=', $request->electoralArea)
            ->orderBy('ps_name')
            ->get();
        return response()->json(['options'=>$pollingStations]);
    }

    public function destroy($id)
    {
        $com = Complaint::query()->find($id);
        $com->delete();

        return to_route('complaints.index')->with('message', 'Record Deleted Successfully');
    }


}
