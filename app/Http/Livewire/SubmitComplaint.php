<?php

namespace App\Http\Livewire;

use App\Models\Field;
use Livewire\Component;

class SubmitComplaint extends Component
{

    public $category;
    public $subcategory;
    
    public $fields=[];


    public $listeners=['modalGetCategoryEvent'=>'setFormControls'];

    public function setFormControls($cat)
    {
        $this->category = $cat;

    }

    public function mount()
    {
      
    }

    public function showRegion(): bool
    {
        return in_array(Field::IS_REGION, $this->fields);
    }

    public function showDistrict(): bool
    {
        return in_array(Field::IS_DISTRICT, $this->fields);
    }

    public function showConstituency(): bool
    {
        return in_array(Field::IS_CONSTITUENCY, $this->fields);
    }

    public function showElectoralArea(): bool
    {
        return in_array(Field::IS_ELECTORAL_AREA, $this->fields);
    }

    public function showPollingStation(): bool
    {
        return in_array(Field::IS_POLLING_STATION, $this->fields);
    }

    public function showCommunity(): bool
    {
        return in_array(Field::IS_COMMUNITY, $this->fields);
    }
   
    public function render()
    {
        return view('livewire.submit-complaint');
    }
}
