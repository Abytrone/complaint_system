<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class IssueCategory extends Component
{
    public $modalTitle =null;
    public $modalAction = null;
    public $category=null;
    public $categoryID=null;
    public $deleteRecordID=null;
    public $active=null;
    public $description=null;

    public $IssueCategories=[];

    protected $listeners=['deleteRecord'=>'confirmDelete'];

    public function rules()
    {
       return [ 'category'=> 'required', 'active'=>'required', 'description'=>'nullable'];
    }

    public function save()
    {
        $validatedData = $this->validate();
        if($this->categoryID!=null)
        {
            Category::find($this->categoryID)->update($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully!']);
        }
        else
        {
            Category::create($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
            $this->reset();
        }
    }

    public function edit($id)
    {
        $this->modalTitle="Update Record";
        $this->modalAction="Update";
        $dbCategory = Category::where('category_id', '=', $id)->first();
        $this->category=$dbCategory->category;
        $this->active=$dbCategory->active;
        $this->description=$dbCategory->description;
        $this->categoryID=$id;
    }

    public function delete($id)
    {
        $this->deleteRecordID=$id;
        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function confirmDelete()
    {
        Category::destroy($this->deleteRecordID);
        $this->dispatchBrowserEvent('swal:confirm', ['message'=>'You won\'t be able to revert this!', 'emitfunction'=>'deleteRecord']);
    }

    public function closeModal()
    {
        $this->resetExcept(['modalTitle', 'modalAction', 'issueCategories']);
        $this->resetModalCaptions();
        $this->reset('categoryID');
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('reloadPage');
    }



    public function mount()
    {
        $this->IssueCategories=Category::where('category_id', '>', 0)->get();
        $this->resetModalCaptions();
    }

    public function render()
    {
        return view('livewire.issue-category');
    }
    function resetModalCaptions()
    {
        $this->modalTitle="Add New Record";
        $this->modalAction="Save";
    }
}
