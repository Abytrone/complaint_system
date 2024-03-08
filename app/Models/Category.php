<?php

namespace App\Models;

use App\Traits\WithoutZeroId;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use WithoutZeroId;

    protected $table = 'issue_category';
    protected $primaryKey = 'category_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public function fields(): HasMany
    {
        return $this->hasMany(CategoryField::class, 'category_id', 'category_id');
    }


    protected function category(): Attribute
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
