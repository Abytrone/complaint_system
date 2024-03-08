<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintIssueField extends Model
{
    protected $table='issue_field';
    protected $primaryKey='field_id';
    protected $guarded = [];
    public $timestamps = false;
}
