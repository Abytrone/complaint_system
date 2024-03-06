<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\CommunicationMode;
use App\Models\Complaint;
use App\Models\Constituency;
use App\Models\District;
use App\Models\ElectoralArea;
use App\Models\Field;
use App\Models\PollingStation;
use App\Models\Region;
use App\Models\Source;
use App\Models\Subcategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ComplaintForm extends Component
{

    public ?Complaint $complaint = null;
    public $name = null;
    public $phone = null;
    public $email = null;
    public $gender = null;
    public $mode_id = null;
    public $source_id = null;
    public $raw_report = null;
    public $received_date = null;
    public $priority = 'Low';
    public $category_id = null;
    public $subcategory_id = null;
    public $region_id = null;
    public $district_id = null;
    public $constituency_id = null;
    public $electoral_area_id = null;
    public $polling_station_id = null;
    public $community = null;
    public $gps_latitude = null;
    public $gps_longitude = null;


    public $modes = [];
    public $sources = [];
    public $subcategories = [];
    public $categories = [];
    public $regions = [];
    public $districts = [];
    public $constituencies = [];
    public $electoral_areas = [];
    public $polling_stations = [];

    public $fields = [];
    public $priorities = ['Low', 'Medium', 'High'];

    protected $listeners = ['update-lat-long' => 'updateLatLng'];


    protected $rules = [
        'name' => 'required|max:200',
        'phone' => 'required|min:10',
        'email' => 'required|email',
        'gender' => 'required|in:Male,Female',
        'received_date' => 'required|date',
        'mode_id' => 'required|exists:communication_mode,mode_id',
        'source_id' => 'required|exists:issue_source,source_id',
        'raw_report' => 'required',
        'subcategory_id' => 'required|exists:issue_subcategory,issue_subcategory_id',
        'category_id' => 'required|exists:issue_category,category_id',
        'region_id' => 'nullable|exists:region,region_id',
        'district_id' => 'nullable|exists:vw_district,district_id',
        'constituency_id' => 'nullable|exists:vw_ec_data_constituency,constituency_id',
        'electoral_area_id' => 'nullable|exists:vw_ec_data_electoral_area,electoral_area_id',
        'polling_station_id' => 'nullable|exists:ec_data,polling_station_id',
        'community' => 'nullable',
        'gps_latitude' => 'required',
        'gps_longitude' => 'required',
        'priority' => 'required|in:Low,Medium,High',
    ];

    public function store(): void
    {
        $valid = $this->validate();
        $valid['code'] = $this->generateRandomNumber();
        $valid['created_by'] = auth()->id() ?? 1;
        Complaint::create($valid);
        $this->resetExcept(['categories', 'regions']);
        $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
    }


    public function updatedCategoryId($val): void
    {
        $this->subcategory_id = null;
        $this->subcategories = Subcategory::withoutZeroId()->active()
            ->where('category_id', $val)->get();

        $this->fields = Category::find($this->category_id)?->fields()
            ->active()->pluck('field_id')->toArray() ?? [];

//        reset fields
        $this->reset([
            'subcategory_id',
            'region_id',
            'district_id',
            'districts',
            'constituency_id',
            'constituencies',
            'electoral_area_id',
            'electoral_areas',
            'polling_station_id',
            'polling_stations',
            'community'
        ]);

    }

    public function updatedRegionId($val): void
    {
        $this->reset([
            'district_id',
            'districts',
            'constituency_id',
            'constituencies',
            'electoral_area_id',
            'electoral_areas',
            'polling_station_id',
            'polling_stations',
            'community'
        ]);

        $this->constituencies = Constituency::where('region_id', '>', 0)->where('region_id', $val)
            ->orderBy('constituency_name')
            ->get();


        $this->districts = District::withoutZeroId()
            ->where('region_id', $val)
            ->orderBy('district')
            ->get();
    }

    public function updatedConstituencyId($val): void
    {
        $this->reset([
            'electoral_area_id',
            'electoral_areas',
            'polling_station_id',
            'polling_stations',
            'community'
        ]);

        $this->electoral_areas = ElectoralArea::where('constituency_id', $val)
            ->orderBy('name')
            ->get();

    }

    public function updatedElectoralAreaId($val): void
    {
        $this->reset([
            'polling_station_id',
            'polling_stations',
            'community'
        ]);

        $this->polling_stations = PollingStation::where('electoral_area_id', $val)
            ->orderBy('name')
            ->get();

    }


    public function mount(): void
    {
        $this->categories = Category::withoutZeroId()->active()->get();
        $this->modes = CommunicationMode::all();

        $this->regions = Region::withoutZeroId()->get();
        $this->sources = Source::all();
    }

    public function updated($value): void
    {
        $this->validateOnly($value);
    }

    public function updateLatLng($data): void
    {
        $this->gps_latitude = $data[0];
        $this->gps_longitude = $data[1];
        $this->resetValidation(['gps_latitude', 'gps_longitude']);
    }


    public function render(): Factory|View|Application
    {
        return view('livewire.complaint-form');
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

    private function generateRandomNumber($length = 15): string
    {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;
        return strval(rand($min, $max));
    }
}
