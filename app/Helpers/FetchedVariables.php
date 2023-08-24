<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class FetchedVariables
{
    public static function getRegions()
    {
        return DB::table('region')->get();
    }
    public static function getDistricts(int $levelid)
    {
        return DB::table('view_executive_level_position')->where('ExecutiveLevelID', '=', $levelid)->get();
    }
    public static function getQualifications()
    {
        return DB::table('qualification')->get();
    }
    public static function getGender()
    {
        return DB::table('gender')->get();
    }
}
