<?php

namespace App\Models;

use App\Traits\WithoutZeroId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{

    protected $table = 'issue_source';
    protected $primaryKey = 'source_id';

    public $timestamps = false;
}
