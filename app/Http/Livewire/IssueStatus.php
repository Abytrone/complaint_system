<?php

namespace App\Http\Livewire;

use App\Models\Status;
use Livewire\Component;

class IssueStatus extends Component
{
    public $status=null;
    public $description=null;
    public $sms_msg=null;
    public $email_msg=null;
    public $modalTitle=null;
    public $modalAction=null;
    public $statusID=null;
    public $deleteRecordID=null;

    public $statuses=[];

    protected $listeners=['deleteRecord'=>'confirmDelete'];

    protected function rules()
    {
       return [ 
        'status'=> 'required|unique:issue_status,status,'.$this->statusID,',status_id', 
        'description'=>'required', 
        'sms_msg'=>'required', 
        'email_msg'=>'required'];
    }

    protected $messages = [
        'sms_msg.required'=>'SMS Message is required',
        'email_msg.required'=>'Email Message is required'
    ];

    public function save()
    {
        $validatedData = $this->validate();
        if($this->statusID!==null)
        {
            Status::find($this->statusID)->update($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully!']);
        }
        else
        {
            Status::create($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
            $this->resetExcept(['modalTitle', 'modalAction']);
        }
    }

    public function edit($id)
    {
        $this->modalTitle="Update Record";
        $this->modalAction="Update";
        $statusdb = Status::find($id);
        $this->status=$statusdb->status;
        $this->description=$statusdb->description;
        $this->sms_msg=$statusdb->sms_msg;
        $this->email_msg=$statusdb->email_msg;
        $this->statusID=$id;
    }

    public function delete($id)
    {
        $this->deleteRecordID=$id;
        $this->dispatchBrowserEvent('swal:confirm', ['message'=>'You won\'t be able to revert this!', 'emitfunction'=>'deleteRecord']);
    }

    public function confirmDelete()
    {
        Status::destroy($this->deleteRecordID);
        $this->dispatchBrowserEvent('swal:delete', ['message' => 'Record deleted successfully!']);
    }

    public function closeModal()
    {
        $this->resetExcept(['modalTitle', 'modalAction', 'statuses']);
        $this->resetModalCaptions();
        $this->reset('statusID');
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('reloadPage');
    }

    public function mount()
    {
      $this->statuses=Status::all();
      $this->resetModalCaptions();
    }


    public function render()
    {
        return view('livewire.issue-status');
    }

    function resetModalCaptions()
    {
        $this->modalTitle="Add New Record";
        $this->modalAction="Save";
    }
}
