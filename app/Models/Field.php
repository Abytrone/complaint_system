<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'issue_field';
    protected $primaryKey = 'field_id';

    const IS_REGION = 1;
    const IS_DISTRICT = 2;
    const IS_CONSTITUENCY = 3;
    const IS_COMMUNITY = 4;
    const IS_ELECTORAL_AREA = 5;
    const IS_POLLING_STATION = 6;
}
