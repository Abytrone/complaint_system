<?php

namespace App\Models;

use App\Traits\WithoutZeroId;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use WithoutZeroId;

    protected $table = 'issue_subcategory';
    protected $primaryKey = 'issue_subcategory_id';
    public $incrementing = false;
    public $timestamps = false;

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => strtoupper($value),
        );
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
