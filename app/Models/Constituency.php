<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $table = 'vw_ec_data_constituency';
    protected $primaryKey = 'constituency_id';
}
