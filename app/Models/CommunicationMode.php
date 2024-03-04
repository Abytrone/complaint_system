<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationMode extends Model
{
    protected $table='communication_mode';
     protected $primaryKey = 'mode_id';
     protected $guarded = [];
     public $incrementing = false;
     public $timestamps = false;
}
