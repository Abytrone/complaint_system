<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Region extends Model
{
    use HasFactory;

    protected $table = 'region';
    protected $primaryKey = 'id';
    protected $fillable = ['region'];

    // public function districts()
    // {
    //     return $this->hasMany(District::class, 'region_fk', 'id');
    // }
}
