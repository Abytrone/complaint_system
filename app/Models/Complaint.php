<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Ramsey\Uuid\Nonstandard\Uuid;

class  Complaint extends Model
{
    protected $table = 'issue_master';
    protected $primaryKey = 'issue_id';

    protected $guarded = [];

    protected $casts = ['processed_date' => 'date'];

    public function getRouteKeyName(): string
    {
        return 'issue_code';
    }

    protected function priority(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => strtoupper($value),
        );
    }

    public function media(): HasMany
    {
        return $this->hasMany(ComplaintMedia::class, 'issue_id', 'issue_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'issue_subcategory_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'status_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->issue_code = Str::uuid();
            if ($model->constituency_id == null) {
                $model->constituency_id = 0;
            }
            if ($model->electoral_area_id == null) {
                $model->electoral_area_id = 0;
            }
            if ($model->district_id == null) {
                $model->district_id = 0;
            }
            if ($model->polling_station_id == null) {
                $model->polling_station_id = 0;
            }
        });
    }
}
