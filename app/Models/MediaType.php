<?php

namespace App\Models;

use App\Traits\WithoutZeroId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    use WithoutZeroId;

    protected $table = 'media_type';
   protected $primaryKey = 'media_type_id';
   public $incrementing = false;
   public $timestamps = null;

   CONST IS_IMAGE = 1;
   CONST IS_VIDEO = 2;
   CONST IS_DOCUMENT = 3;
    const IS_OTHER = 4;
}
