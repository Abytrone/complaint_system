<?php

namespace App\Models;

use App\Traits\WithoutZeroId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcData extends Model
{
    use WithoutZeroId;
    protected $table = 'ec_data';
    public $incrementing = false;


}
