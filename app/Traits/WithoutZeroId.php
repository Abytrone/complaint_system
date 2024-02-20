<?php

namespace App\Traits;

trait WithoutZeroId
{
    public function scopeWithoutZeroId($query)
    {
        return $query->where($this->primaryKey, '>', 0);
    }

}
