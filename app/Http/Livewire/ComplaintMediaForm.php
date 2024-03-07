<?php

namespace App\Http\Livewire;

use App\Models\Complaint;
use App\Models\ComplaintMedia;
use App\Models\MediaType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class ComplaintMediaForm extends Component
{
    use WithFileUploads;

    public Complaint $record;
    public $mediaTypes;
    public $media_type_id = MediaType::IS_IMAGE;
    public $title;

    public $media_file;

    protected function rules(): array
    {
        $mediaFileRule = [
            MediaType::IS_IMAGE => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            MediaType::IS_VIDEO => 'required|mimes:mp4,mpeg|max:40960',
            MediaType::IS_DOCUMENT => 'required|mimes:pdf|max:10240',
            MediaType::IS_OTHER => 'required',
        ][$this->media_type_id];

        return [
            'media_type_id' => 'required|exists:media_type,media_type_id',
            'title' => 'required|max:200',
            'media_file' => $mediaFileRule
        ];
    }

    protected $messages = [
        'media_type_id.required' => 'The media type is required',
        'media_type_id.exists' => 'The selected media type is invalid',
        'title.required' => 'The media title field is required',
    ];

    public function save(): void
    {

        $this->validate();
        ComplaintMedia::create([
            'issue_id' => $this->record->issue_id,
            'media_type_id' => $this->media_type_id,
            'title' => $this->title,
            'file_name' => $this->media_file->store('media', 'public'),
            'created_by' => auth()->id ?? 1
        ]);

        $this->reset(['title', 'media_type_id', 'media_file']);

        $this->dispatchBrowserEvent('swal:success', [
            'message' => 'Record created successfully!'
        ]);

    }


    public function render(): Factory|View|Application
    {
        return view('livewire.complaint-media-form');
    }

    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    public function mount(): void
    {
        $this->mediaTypes = MediaType::withoutZeroId()->get();
    }
}
