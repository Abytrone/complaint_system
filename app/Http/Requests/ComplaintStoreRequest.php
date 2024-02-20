<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\Helper;
use Illuminate\Http\Request;

class ComplaintStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request):array
    {
        $issue_id = $request->route('complaint');
        return array_merge([
            'name'=>'required|string',
            'phone'=>'required|unique:issue_master,phone,'.$issue_id.',issue_id',
            'email'=>'required|email|unique:issue_master,email, '.$issue_id.',issue_id',
            'gender'=>'required',
            'mode_fk'=>'required',
            'subcategory_id'=>'required',
            'region_fk'=>'required',
            'raw_report'=>'required',
            'gps_longitude'=>'required',
            'gps_latitude'=>'required',
            'received_date'=>'required',
            'source_fk'=>'required',
        ], ...Helper::dynamicFieldsValidation());
    }
    public function messages():array
    {
        return [
            'mode_fk.required'=>'mode of contact is required',
            'category_id.required'=>'category is required',
            'subcategory_id.required'=>'subcategory is required',
            'region_fk.required'=>'region is required',
            'district_fk.required'=>'district is required',
            'raw_report.required'=>'report details is required',
            'constituency_fk.required'=>'constituency is required',
            'electoral_area_fk.required'=>'electoral area is required',
            'polling_station_fk.required'=>'polling station is required',
            'received_date.required'=>'received date is required'
        ];
    }
}
