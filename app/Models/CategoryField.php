<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryField extends Model
{
    protected $table = 'issue_category_field';
    protected $primaryKey = 'issue_category_id';
    public const CREATED_AT = 'created_date';
    public const UPDATED_AT = 'modified_date';

    protected $guarded=[];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class, 'field_id', 'field_id');
    }

    public function scopeActive($query)
    {
        return $query->where('display', 1);
    }
}
