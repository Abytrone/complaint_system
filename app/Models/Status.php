<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'issue_status';
    protected $primaryKey = 'status_id';
    public $timestamps = false;

    protected $guarded = [];

    const IS_NEW = 1;
    const IS_SUBMITTED = 2;
    const IS_RECEIVED = 3;
    const IS_PROCESSED = 4;
    const IS_RESOLVED = 5;
    const IS_CLOSED = 6;
    const IS_REOPENED = 7;

    public function isNew(): bool
    {
        return $this->id == self::IS_NEW;
    }

    public function isSubmitted(): bool
    {
        return $this->id == self::IS_SUBMITTED;
    }

    public function isReceived(): bool
    {
        return $this->id == self::IS_RECEIVED;
    }

    public function isProcessed(): bool
    {
        return $this->id == self::IS_PROCESSED;
    }

    public function isResolved(): bool
    {
        return $this->id == self::IS_RESOLVED;
    }

    public function isClosed(): bool
    {
        return $this->id == self::IS_CLOSED;
    }

    public function isReOpened(): bool
    {
        return $this->id == self::IS_REOPENED;
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => strtoupper($value),
        );
    }
}
