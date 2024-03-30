<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class SubmitComplaintModal extends ModalComponent
{
    public $modalTitle;
    public $issueCategories;
    public $issueCategory;



    public function updatedIssueCategories()
    {
        $this->issueCategory = Category::find($this->issueCategories);
        // dd($this->issueCategory);
    }

    public function closeAndGetCategory()
    {
        $this->closeModalWithEvents([
            SubmitComplaint::getName() => ['modalGetCategoryEvent', [$this->issueCategory]]
        ]);
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->modalTitle = 'Welcome. Select a Category and Submit Complaint';
        $this->issueCategories = Category::where('active', 1)->get();
    }
    public function render()
    {
        return view('livewire.submit-complaint-modal');
    }
}
