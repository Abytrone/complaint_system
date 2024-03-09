<?php

namespace App\Http\Livewire;

use App\Models\ComplaintIssueField;
use App\Models\IssueField as ModelsIssueField;
use Livewire\Component;

class IssueField extends Component
{
    public $field_name=null;
    public $issueFieldID=null;
    public $modalTitle=null;
    public $modalAction=null;
    public $deleteRecordID=null;

    public $issueFields=[];

    protected $listeners=['deleteRecord'=>'confirmDelete'];

    protected function rules()
    {
       return [ 'field_name'=> 'required'];
    }


    protected $messages = [
        'field_name.unique'=>':attribute already exists as communication mode'
    ];

    public function save()
    {
        $validatedData = $this->validate();
        if($this->issueFieldID!==null)
        {
            ComplaintIssueField::find($this->issueFieldID)->update($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully!']);
        }
        else
        {
            ComplaintIssueField::create($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
            $this->resetExcept(['modalTitle', 'modalAction']);
        }
    }

    
    public function edit($id)
    {
        $this->modalTitle="Update Record";
        $this->modalAction="Update";
        $this->field_name = ComplaintIssueField::find($id)->field_name;
        $this->issueFieldID=$id;
    }

    public function delete($id)
    {
        $this->deleteRecordID=$id;
        $this->dispatchBrowserEvent('swal:confirm', ['message'=>'You won\'t be able to revert this!', 'emitfunction'=>'deleteRecord']);
    }

    public function confirmDelete()
    {
        ComplaintIssueField::destroy($this->deleteRecordID);
        $this->dispatchBrowserEvent('swal:delete', ['message' => 'Record deleted successfully!']);
    }

    public function closeModal()
    {
        $this->resetExcept(['modalTitle', 'modalAction', 'issueFields']);
        $this->resetModalCaptions();
        $this->reset('field_name');
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('reloadPage');
    }

    public function mount()
    {
        $this->issueFields=ComplaintIssueField::all();
        $this->resetModalCaptions();
    }
    

    
    public function render()
    {
        return view('livewire.issue-field');
    }

    function resetModalCaptions()
    {
        $this->modalTitle="Add New Record";
        $this->modalAction="Save";
    }
}
