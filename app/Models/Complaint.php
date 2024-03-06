<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class  Complaint extends Model
{


    protected $table = 'issue_master';
    protected $primaryKey = 'issue_id';

    protected $guarded = [];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
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
            // $model->raw = strtoupper($model->raw);
        });
    }
}
