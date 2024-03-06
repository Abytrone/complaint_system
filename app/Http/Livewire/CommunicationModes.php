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
    public $deleteRecordID=null;

    public $communicationModes=[];


    protected $listeners=['deleteRecord'=>'confirmDelete'];

  

    // public function rules()
    // {
    //    return [ 'mode'=> ['required', Rule::unique('communication_mode')->ignore('id', 'mode_id')]];
    // }

    public function rules()
    {
       return [ 'mode'=> 'required'];
    }

    protected $messages = [
        'mode.unique'=>':attribute already exists as communication mode'
    ];


    public function save()
    {
        $validatedData = $this->validate();
        if($this->modeID!=null)
        {
            CommunicationMode::find($this->modeID)->update($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully!']);
        }
        else
        {
            CommunicationMode::create($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
            $this->reset();
        }
    }

    public function edit($id)
    {
        $this->modalTitle="Update Record";
        $this->modalAction="Update";
        $this->mode = CommunicationMode::find($id)->mode;
        $this->modeID=$id;
    }

    public function delete($id)
    {
        $this->deleteRecordID=$id;
        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function confirmDelete()
    {
        CommunicationMode::destroy($this->deleteRecordID);
        $this->dispatchBrowserEvent('swal:delete', ['message' => 'Record deleted successfully!']);
    }

    public function closeModal()
    {
        $this->resetExcept(['modalTitle', 'modalAction', 'communicationModes']);
        $this->resetModalCaptions();
        $this->reset('modeID');
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('reloadPage');
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
