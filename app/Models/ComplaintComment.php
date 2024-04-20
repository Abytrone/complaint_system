<?php

namespace App\Models;


use App\Http\Livewire\IssueStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplaintComment extends Model
{
    protected $table = 'issue_comment';


    protected $fillable = [
        'complaint_id',
        'issue_status_id',
        'comment',
        'attachment',
        'created_by',
        'updated_by'
    ];


    public function attachmentFmt(): Attribute
    {
        return Attribute::make(get: fn($val, $attr) => asset('storage/' . $attr['attachment']));
    }

    public function createdAtFmt(): Attribute
    {
        return Attribute::make(get: fn($val, $attr) => Carbon::parse($attr['created_at'])->format('d M, Y'));
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'issue_status_id', 'status_id');
    }
}
