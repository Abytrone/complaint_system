<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintModel extends Model
{
    use HasFactory;

    protected $table = 'issue_master';
    protected $primaryKey = 'id';
    public const CREATED_AT = 'created_date';

    protected $fillable = [
        'code',
        'name',
        'email',
        'phone',
        'sex',
        'mode',
        'source',
        'raw',
        'states',
        'created_by'
    ];

    // public function district()
    // {
    //     return $this->belongsTo(District::class, 'district_id', 'district_id');
    // }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->complaint = strtoupper($model->complaint);
            // $model->remark = strtoupper($model->remark);
        });
    }
}
