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
            // $model->raw = strtoupper($model->raw);
        });
    }
}
