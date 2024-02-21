<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryField extends Model
{
    protected $table = 'issue_category_field';
    protected $primaryKey = 'issue_category_id';
    public const CREATED_AT = 'created_date';
    public const UPDATED_AT = 'modified_date';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('display', 1);
    }
}
