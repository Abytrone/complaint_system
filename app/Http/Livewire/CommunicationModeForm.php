<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CommunicationMode;
use Illuminate\Validation\Rule;

class CommunicationModeForm extends Component
{
    public $mode=null;

    protected $rules = [
        'mode'=>'required|'
    ];

    public function rules()
    {
       return [ 'mode'=> ['required', Rule::unique('communication_mode')->ignore('id', 'mode_id')]];
    }

    protected $messages = [
        'mode.unique'=>':attribute already exists communication mode'
    ];

    public function store()
    {
        $validatedData = $this->validate();
        CommunicationMode::create($validatedData);
        $this->reset('mode');
        $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
    }

    public function update()
    {
        
    }

    public function render()
    {
        return view('livewire.communication-mode-form');
    }
}
