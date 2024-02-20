<?php

namespace App\Models;

use App\Traits\WithoutZeroId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use WithoutZeroId;

    protected $table = 'issue_subcategory';
    protected $primaryKey = 'issue_subcategory_id';
    public $incrementing = false;
    public $timestamps = false;
}
