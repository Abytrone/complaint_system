<?php

namespace App\Http\Livewire;

use App\Models\Complaint;
use App\Models\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class ConfirmSubmitModal extends ConfirmModal
{
    public Complaint $item;
    public $title = 'Complaint Submission!';
    public $message = 'Are you sure you want to submit this complaint?';

    public function confirm(): void
    {
        $this->item->update(['status_id' => Status::IS_SUBMITTED]);
        $this->emit('closeModal');
        $this->dispatchBrowserEvent('reloadPage');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.confirm-modal');
    }
}
