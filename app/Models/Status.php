<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'issue_status';
    protected $primaryKey = 'status_id';


    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => strtoupper($value),
        );
    }
}
