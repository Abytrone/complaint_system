<?php
namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class Helper{

    public static function dynamicFieldsValidation()
    {
        $fieldValidation=[];
        $fieldnames=DB::table('vw_issue_category_field')->select(['field_name', 'field_fk'])->where('display', '=',1)->get()
            ->map(function($data){
                return $data->field_name;
            })->toArray();

           foreach ($fieldnames as $field){
              if($field == 'Disrict' ){
                  array_push($fieldValidation, ['district_fk'=>'required']);
              }
               if($field == 'Constituency' ){
                   array_push($fieldValidation, ['constituency_fk'=>'required']);
               }
               if($field == 'Comminity' ){
                   array_push($fieldValidation, ['community'=>'required|string|regex:/^[a-zA-Z\s]+$/']);
               }
               if($field == 'Electoral Area' ){
                   array_push($fieldValidation, ['electoral_area_fk'=>'required']);
               }
               if($field == 'Polling Station' ){
                   array_push($fieldValidation, ['polling_station_fk'=>'required']);
               }
           }
        return array_merge($fieldValidation);
    }
}
