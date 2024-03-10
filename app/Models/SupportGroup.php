<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportGroup extends Model
{
    protected $table='support_group';
    protected $primaryKey ='support_group_id';
    protected $guarded = [];
    public const CREATED_AT = 'created_date';
    public const UPDATED_AT = 'modified_date';
}
