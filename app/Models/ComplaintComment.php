<?php

namespace App\Models;


 use App\Http\Livewire\IssueStatus;
 use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplaintComment extends Model
{
    protected $table = 'issue_comment';


    protected $fillable = [
        'complaint_id',
        'issue_status_id',
        'comment',
        'created_by',
        'updated_by'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'issue_status_id', 'status_id');
    }
}
