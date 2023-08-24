<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'district';
    protected $fillable = ['region_fk', 'District'];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_fk');
    }
}
