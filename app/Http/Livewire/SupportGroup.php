<?php

namespace App\Http\Livewire;

use App\Models\SupportGroup as ModelsSupportGroup;
use Livewire\Component;

class SupportGroup extends Component
{

    public $name=null;
    public $description=null;
    public $contact_name=null;
    public $phone=null;
    public $duration=null;
    public $active=null;
    public $modalTitle=null;
    public $modalAction=null;
    public $supportGroupID=null;
    public $deleteRecordID=null;

    public $supportGroups = [];

    protected $listeners=['deleteRecord'=>'confirmDelete'];

    protected function rules()
    {
       return [ 'name'=> 'required|unique:support_group,name,'.$this->supportGroupID.',support_group_id', 
                'description'=>'required',
                'contact_name'=>'required',
                'phone'=>'required|unique:support_group,phone,'.$this->supportGroupID.',support_group_id|regex:/^\+?(\d{1,3})?-?\d{9,15}$/|max:10|min:10',
                'duration'=>'required|integer',
                'active'=>'required'            
    ];
    }

    public function save()
    {
        $validatedData = $this->validate();
        if($this->supportGroupID!=null)
        {
            $insertionData=array_merge($validatedData, ['modified_by'=>0]);
            ModelsSupportGroup::find($this->supportGroupID)->update($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully!']);
        }
        else
        {
            $insertionData=array_merge($validatedData, ['created_By'=>0, 'modified_By'=>0]); //change with auth user later
            ModelsSupportGroup::create($insertionData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
            $this->resetExcept(['modalTitle', 'modalAction']);
        }
    }

    public function edit($id)
    {
        $this->modalTitle="Update Record";
        $this->modalAction="Update";
        $supportGroupdb = ModelsSupportGroup::find($id);
        $this->name = $supportGroupdb->name;
        $this->description = $supportGroupdb->description;
        $this->contact_name = $supportGroupdb->contact_name;
        $this->phone = $supportGroupdb->phone;
        $this->duration = $supportGroupdb->duration;
        $this->active = $supportGroupdb->active;
        $this->supportGroupID=$id;
    }

    public function delete($id)
    {
        $this->deleteRecordID=$id;
        $this->dispatchBrowserEvent('swal:confirm', ['message'=>'You won\'t be able to revert this!', 'emitfunction'=>'deleteRecord']);
    }

    public function confirmDelete()
    {
        ModelsSupportGroup::destroy($this->deleteRecordID);
        $this->dispatchBrowserEvent('swal:delete', ['message' => 'Record deleted successfully!']);
    }

    public function closeModal()
    {
        $this->resetExcept(['modalTitle', 'modalAction', 'communicationModes']);
        $this->resetModalCaptions();
        $this->reset();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('reloadPage');
    }

    public function mount()
    {
      $this->supportGroups=ModelsSupportGroup::all();
      $this->resetModalCaptions();
    }


    public function render()
    {
        return view('livewire.support-group');
    }

    function resetModalCaptions()
    {
        $this->modalTitle="Add New Record";
        $this->modalAction="Save";
    }
}
