<?php

namespace App\Models;

use App\Traits\WithoutZeroId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use WithoutZeroId;

    protected $table = 'issue_category';
    protected $primaryKey = 'category_id';
    public $incrementing = false;
    public $timestamps = false;

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
