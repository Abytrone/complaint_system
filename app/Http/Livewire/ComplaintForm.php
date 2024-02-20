<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\CommunicationMode;
use App\Models\Complaint;
use App\Models\Region;
use App\Models\Source;
use App\Models\Subcategory;
use Livewire\Component;

class ComplaintForm extends Component
{

    public ?Complaint $complaint;
    public $name;
    public $phone;
    public $email;
    public $sex;
    public $received_date;
    public $mode_id;
    public $source_id;
    public $raw_report;
    public $subcategory_id;
    public $category_id;
    public $region_id;
    public $district_id;
    public $constituency_id;
    public $polling_station_id;
    public $community;
    public $code;


    public $modes = [];
    public $sources = [];
    public $subcategories = [];
    public $categories = [];
    public $regions = [];
    public $districts = [];
    public $constituencies = [];
    public $polling_stations = [];

    protected $listeners = ['editItem', 'showItem'];


    protected $rules = [
        // 'code' => 'required|string',
        'name' => 'required|string',
        'email' => 'required|string',
        'phone' => 'required|string',
        'sex' => 'required|string',
        'mode' => 'required|string',
        'source' => 'required|string',
        'raw' => 'required|string',
    ];

    public function mount()
    {
        $this->categories = Category::withoutZeroId()->active()->get();
        $this->modes = CommunicationMode::all();
        $this->subcategories = Subcategory::withoutZeroId()->get();
        $this->regions = Region::withoutZeroId()->get();
        $this->sources = Source::all();
    }

    public function updated($value)
    {
        $this->validateOnly($value);
    }

    private function generateRandomNumber($length)
    {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;
        return strval(rand($min, $max));
    }

    public function store()
    {
        if ($this->currentComplaintId) {
            ComplaintModel::query()->where('id', $this->currentComplaintId)->update($this->validate());
            return to_route('complaints.index')->with('message', 'Record Updated Successfully');
        } else {
            $randomNumber = $this->generateRandomNumber(10);
            ComplaintModel::query()->create($this->validate() + ['code' => $randomNumber] + ['created_by' => auth()->id() ?? 1]);
            $this->resetForm();
            return to_route('complaints.index')->with('message', 'Record Created Successfully');
        }
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->sex = '';
        $this->mode = '';
        $this->source = '';
        $this->raw = '';
    }


    public function editItem($id)
    {
        $this->modalTitle = 'Update  Record';
        $this->isShow = false;
        $this->populateFields($id);
    }

    public function showItem($id)
    {
        $this->modalTitle = 'View  Record';
        $this->isShow = true;
        $this->populateFields($id);
    }

    public function render()
    {

        return view('livewire.complaint-form');
    }

    /**
     * @param $id
     * @return void
     */
    public function populateFields($id): void
    {
        $com = ComplaintModel::find($id);
        $this->currentComplaintId = $com->community_id;
        $this->code = $com->code;
        $this->name = $com->name;
        $this->email = $com->email;
        $this->phone = $com->phone;
        $this->sex = $com->sex;
        $this->mode = $com->mode;
        $this->source = $com->source;
        $this->raw = $com->raw;
    }
}
