<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class IssueSubcategory extends Component
{
    public $category_id = null;
    public $description = null;
    public $active=null;
    public $modalTitle = null;
    public $modalAction = null;
    public $subcategoryID=null;
    public $deleteRecordID=null;

    public $subCategories=[];
    public $categories=[];


    protected $listeners=['deleteRecord'=>'confirmDelete'];


    public function rules()
    {
       return [ 'category_id'=> 'required', 'description'=>'required', 'active'=>'required'];
    }

    public function save()
    {
        $validatedData = $this->validate();
        if($this->subcategoryID!=null)
        {
            Subcategory::find($this->subcategoryID)->update($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully!']);
        }
        else
        {
            Subcategory::create($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
            $this->resetExcept(['modalTitle', 'modalAction']);
        }
    }

    
    public function edit($id)
    {
        $this->modalTitle="Update Record";
        $this->modalAction="Update";
        $subcategory = Subcategory::find($id);
        $this->category_id=$subcategory->category_id;
        $this->description = $subcategory->description;
        $this->active=$subcategory->active;
    }

    public function delete($id)
    {
        $this->deleteRecordID=$id;
        $this->dispatchBrowserEvent('swal:confirm', ['message'=>'You won\'t be able to revert this!', 'emitfunction'=>'deleteRecord']);
    }

    public function confirmDelete()
    {
        Subcategory::destroy($this->deleteRecordID);
        $this->dispatchBrowserEvent('swal:delete', ['message' => 'Record deleted successfully!']);
    }

    public function closeModal()
    {
        $this->resetExcept(['modalTitle', 'modalAction', 'subCategories']);
        $this->resetModalCaptions();
        $this->reset('subcategoryID');
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('reloadPage');
    }

    public function mount()
    {
        $this->subCategories=Subcategory::with('category')->orderBy('category_id')->get();
        $this->categories=Category::all()->where('category_id', '>', 0);
        $this->resetModalCaptions();
    }

    
   

    public function render()
    {
        return view('livewire.issue-subcategory');
    }

    function resetModalCaptions()
    {
        $this->modalTitle="Add New Record";
        $this->modalAction="Save";
    }
}
