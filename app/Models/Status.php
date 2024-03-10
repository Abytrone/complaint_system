<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'issue_status';
    protected $primaryKey = 'status_id';

    const IS_NEW = 1;
    const IS_SUBMITTED = 2;
    const IS_RECEIVED = 3;
    const IS_PROCESSED = 4;
    const IS_RESOLVED = 5;
    const IS_CLOSED = 6;
    const IS_REOPENED = 7;


    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => strtoupper($value),
        );
    }
}
