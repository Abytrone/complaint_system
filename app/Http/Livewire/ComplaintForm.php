<?php

namespace App\Http\Livewire;

use App\Models\ComplaintModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ComplaintForm extends Component
{
    public $modalTitle = 'Add New';
    public $currentComplaintId = null;
    public $isShow = false;
    public $code;
    public $name;
    public $email;
    public $phone;
    public $sex;
    public $mode;
    public $source;
    public $raw;

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
        // $districts = DB::select('select district_id as id, district_name as name from districts');

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
