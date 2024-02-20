<?php

namespace App\Models;

use App\Traits\WithoutZeroId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Region extends Model
{
    use  WithoutZeroId;

    protected $table = 'region';
    protected $primaryKey = 'region_id';
    protected $fillable = ['region'];

    // public function districts()
    // {
    //     return $this->hasMany(District::class, 'region_fk', 'id');
    // }
}
