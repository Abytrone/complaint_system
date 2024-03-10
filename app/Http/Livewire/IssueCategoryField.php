<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\CategoryField;
use App\Models\Complaint;
use App\Models\ComplaintIssueField;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Validation\Rule;

class IssueCategoryField extends Component
{
    
    public $issueCategoryFieldID = null;
    public $category_id=null;
    public $field_id=null;
    public $display=null;
    public $modalTitle=null;
    public $modalAction=null;
    public $deleteRecordID=null;

    public $issueCategoryFields=[];
    public $issueCategories=[];
    public $fields=[];

    protected $listeners=['deleteRecord'=>'confirmDelete'];

    protected function rules()
    {
       return [ 'category_id'=> 'required',
        'field_id'=>['required',
        Rule::unique('issue_category_field', 'field_id')->where('category_id', $this->category_id)->ignore($this->issueCategoryFieldID)
                     ],
        'display'=>'required'
    ];
    }

    public function save()
    {
        $validatedData = $this->validate();
        $insertionData = array_merge($validatedData, ['created_by'=>0, 'modified_by'=>0]); // do later use auth user
        if($this->issueCategoryFieldID!==null)
        {
            $insertionData = array_merge($validatedData, ['modified_by'=>0]); // do later use auth user
            CategoryField::find($this->issueCategoryFieldID)->update($validatedData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully!']);
        }
        else
        {
            $insertionData = array_merge($validatedData, ['created_by'=>0, 'modified_by'=>0]); // do later use auth user
            CategoryField::create($insertionData);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
            $this->resetExcept(['modalTitle', 'modalAction']);
        }
    }

  

    public function edit($id)
    {
        $this->modalTitle="Update Record";
        $this->modalAction="Update";
        $issueCategoryFieldb = CategoryField::find($id);
        $this->category_id= $issueCategoryFieldb->category_id;
        $this->field_id= $issueCategoryFieldb->field_id;
        $this->display= $issueCategoryFieldb->display;
        $this->issueCategoryFieldID=$id;
    }

    public function delete($id)
    {
        $this->deleteRecordID=$id;
        $this->dispatchBrowserEvent('swal:confirm', ['message'=>'You won\'t be able to revert this!', 'emitfunction'=>'deleteRecord']);
    }

    public function confirmDelete()
    {
        CategoryField::destroy($this->deleteRecordID);
        $this->dispatchBrowserEvent('swal:delete', ['message' => 'Record deleted successfully!']);
    }

    public function mount()
    {
      $this->issueCategoryFields=CategoryField::with(['category', 'field'])->get();
      $this->issueCategories=Category::where('category_id', '>', 0)->orderBy('category')->get();
      $this->fields=ComplaintIssueField::where('field_id', '>', 0)->orderBy('field_name')->get();
      $this->resetModalCaptions();
     // dd($this->issueCategoryFields);
    }

    public function closeModal()
    {
        $this->resetExcept(['modalTitle', 'modalAction', 'communicationModes']);
        $this->resetModalCaptions();
        $this->reset();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('reloadPage');
    }


    public function render()
    {
        return view('livewire.issue-category-field');
    }

    function resetModalCaptions()
    {
        $this->modalTitle="Add New Record";
        $this->modalAction="Save";
    }
}
