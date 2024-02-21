<?php

namespace App\Models;

use App\Traits\WithoutZeroId;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use WithoutZeroId;

    protected $table = 'district';
    protected $primaryKey = 'district_id';

    public function getDistrictAttribute($val): string
    {
        return strtoupper($val);
    }

}
