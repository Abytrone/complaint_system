<?php

namespace App\Http\Livewire;

use App\Models\CommunicationMode;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CommunicationModes extends Component
{

    public $mode = null;
    public $modeID=null;
    public $modalTitle=null;
    public $modalAction=null;
    public $communicationModes=[];


    public function save()
    {
        
    }

    public function edit($id)
    {
        $this->modalTitle="Update Record";
        $this->modalAction="Update";
    }

    public function closeModal()
    {
        $this->resetExcept(['modalTitle', 'modalAction', 'communicationModes']);
        $this->resetModalCaptions();
    }



    public function mount()
    {
        $this->communicationModes=CommunicationMode::all();
        $this->resetModalCaptions();
    }

    public function render()
    {
        return view('livewire.communication-modes');
    }

    function resetModalCaptions()
    {
        $this->modalTitle="Add New Record";
        $this->modalAction="Save";
    }
}
