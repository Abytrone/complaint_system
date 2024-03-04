<?php

namespace App\Http\Livewire;

use App\Models\CommunicationMode;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CommunicationModes extends Component
{

    public $communicationModes=[];


    public function update()
    {

    }

    public function mount()
    {
        $this->communicationModes=CommunicationMode::all();
    }

    public function render()
    {
        return view('livewire.communication-modes');
    }
}
