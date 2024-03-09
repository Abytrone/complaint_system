<?php

namespace App\Http\Livewire;

use App\Models\Source;
use Livewire\Component;

class IssueSource extends Component
{
    public $source = null;
    public $sourceID=null;
    public $modalTitle=null;
    public $modalAction=null;
    public $deleteRecordID=null;

    public $sources = [];

    protected $listeners=['deleteRecord'=>'confirmDelete'];

    protected function rules()
    {
       return [ 'source'=> 'required'];
    }

    public function save()
    {
        $validatedData = $this->validate();
        if($this->sourceID!==null)
        {
            Source::find($this->sourceID)->update($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully!']);
        }
        else
        {
            Source::create($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
            $this->resetExcept(['modalTitle', 'modalAction']);
        }
    }

    public function edit($id)
    {
        $this->modalTitle="Update Record";
        $this->modalAction="Update";
        $this->source = Source::find($id)->source;
        $this->sourceID=$id;
    }

    public function delete($id)
    {
        $this->deleteRecordID=$id;
        $this->dispatchBrowserEvent('swal:confirm', ['message'=>'You won\'t be able to revert this!', 'emitfunction'=>'deleteRecord']);
    }

    public function confirmDelete()
    {
        Source::destroy($this->deleteRecordID);
        $this->dispatchBrowserEvent('swal:delete', ['message' => 'Record deleted successfully!']);
    }

    public function closeModal()
    {
        $this->resetExcept(['modalTitle', 'modalAction', 'sources']);
        $this->resetModalCaptions();
        $this->reset('sourceID');
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('reloadPage');
    }



    public function mount()
    {
      $this->sources=Source::all();
      $this->resetModalCaptions();
    }



    public function render()
    {
        return view('livewire.issue-source');
    }

    function resetModalCaptions()
    {
        $this->modalTitle="Add New Record";
        $this->modalAction="Save";
    }
}
