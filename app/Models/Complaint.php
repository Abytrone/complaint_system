<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Complaint extends Model
{
    use HasFactory;

    protected $table = 'issue_master';
    protected $primaryKey = 'id';
    public const CREATED_AT = 'created_date';

    protected $guarded = [];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // $model->raw = strtoupper($model->raw);
        });
    }
}
