<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplaintMedia extends Model
{
    protected $table = 'issue_media';

    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo(MediaType::class, 'media_type_id', );
    }

    public const CREATED_AT = 'created_date';
    public const UPDATED_AT = 'modified_date';

}
