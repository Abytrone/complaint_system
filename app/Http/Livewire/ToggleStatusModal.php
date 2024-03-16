<?php

namespace App\Http\Livewire;

use App\Models\Complaint;
use App\Models\Resolution;
use App\Models\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class ToggleStatusModal extends Modal
{
    public Complaint $complaint;
    public $statuses = [];
    public $status_id = null;

    public $received_date = null;
    public $processed_date = null;
    public $resolved_date = null;
    public $resolution = null;
    public $priority = 'Low';
    public $toUrl = null;


    protected $messages = [
        'status_id.required' => 'The status field is required',
        'status_id.exists' => 'The status field is invalid',
    ];


    public function toggle(): void
    {
        $valid = $this->validData();
        if ($this->showProcessedInputs()) {
            $valid['processed_by'] = auth()->id() ?? 1;
        }

        if ($this->showResolvedInputs()) {
            $valid = collect($valid)->except(['resolution', 'resolved_date'])->toArray();
            Resolution::create([
                'complaint_id' => $this->complaint->issue_id,
                'resolver_id' => auth()->id() ?? 1,
                'created_by' => auth()->id() ?? 1,
                'resolution' => $this->resolution,
                'resolved_date' => $this->resolved_date
            ]);
        }
        $this->complaint->update($valid);
        session()->flash('message', 'Record updated successfully.');
        $this->redirect(session('complaint-url'));

    }

    public function mount(): void
    {
        $status_id = $this->complaint->status_id;

//        $this->status_id = $status_id;
        $this->statuses = Status::query()
            ->whereIn('status_id', [$status_id + 1])
            ->get();
    }

    private function validData()
    {
        $rules = ['status_id' => 'required|exists:issue_status,status_id'];
        if ($this->showReceivedInput()) {
            $rules['received_date'] = 'required|date';
        }

        if ($this->showProcessedInputs()) {
//            todo: set support group(s)
            $rules['processed_date'] = 'required|date';
            $rules['priority'] = 'required|in:Low,Medium,High';
        }

        if ($this->showResolvedInputs()) {
            $rules['resolved_date'] = 'required|date';
            $rules['resolution'] = 'required|string';
        }
        return $this->validate($rules);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.toggle-status-modal');
    }

    public function showReceivedInput(): bool
    {
        return (int)$this->status_id === Status::IS_RECEIVED;
    }

    public function showProcessedInputs(): bool
    {
        return (int)$this->status_id === Status::IS_PROCESSED;
    }

    public function showResolvedInputs(): bool
    {
        return (int)$this->status_id === Status::IS_RESOLVED;
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
