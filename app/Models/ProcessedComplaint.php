<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedComplaint extends Model
{
    protected $table = 'issue_process';
    protected $primaryKey = 'issue_process_id';
    public $timestamps = null;

    protected $guarded = [];
}
