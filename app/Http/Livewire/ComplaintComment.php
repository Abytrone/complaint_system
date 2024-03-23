<?php

namespace App\Http\Livewire;

use App\Models\Complaint;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ComplaintComment extends Component
{
    protected $listeners = ['confirmDeleteComment'];
    public Complaint $complaint;
    public $showForm = false;
    public $comments = [];
    public $comment = null;
    public $comment_id = null;

    protected $rules = [
        'comment' => 'required'
    ];

    public function saveChanges(): void
    {
        $this->validate();
        if ($this->comment_id == null) {
            \App\Models\ComplaintComment::create([
                'complaint_id' => $this->complaint->issue_id,
                'comment' => $this->comment,
                'issue_status_id' => $this->complaint->status_id,
                'created_by' => auth()->id(),
            ]);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record created successfully']);
        } else {
            \App\Models\ComplaintComment::where('id', $this->comment_id)->update(['comment' => $this->comment]);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully']);
        }
        $this->getComments();
        $this->reset('comment', 'comment_id', 'showForm');
    }

    public function mount(): void
    {
        $this->getComments();
    }

    private function getComments(): void
    {
        $this->comments = \App\Models\ComplaintComment::with('status')->where('complaint_id', $this->complaint->issue_id)->get();
    }

    public function deleteComment(\App\Models\ComplaintComment $comment): void
    {
        $this->comment_id = $comment->id;
        $this->dispatchBrowserEvent('swal:confirm', ['Are you sure you want to delete this record?', 'emitfunction' => 'confirmDeleteComment']);
    }

    public function confirmDeleteComment(): void
    {
        \App\Models\ComplaintComment::where('id', $this->comment_id)->delete();
        $this->getComments();
        $this->dispatchBrowserEvent('swal:success', ['message' => 'Record deleted successfully',]);
    }

    public function editComment(\App\Models\ComplaintComment $comment): void
    {
        $this->toggleForm();
        $this->comment = $comment->comment;
        $this->comment_id = $comment->id;
    }

    public function toggleForm(): void
    {
        $this->showForm = !$this->showForm;
    }

    public function render(): View
    {
        return view('livewire.complaint-comment');
    }
}
