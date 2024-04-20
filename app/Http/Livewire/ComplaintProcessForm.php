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
use App\Models\ProcessedComplaint;
use App\Models\Region;
use App\Models\Source;
use App\Models\Status;
use App\Models\Subcategory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class ComplaintProcessForm extends Component
{
    use WithFileUploads;

    public bool $isShow = false;
    public bool $showSubmit = false;
    public Complaint $complaint;
    public ?ProcessedComplaint $processedComplaint = null;

    public $processed_report = null;
    public $processed_category_id = null;
    public $categories = [];
    public $processed_subcategory_id = null;
    public $subcategories = [];
    public $processed_region_id = null;
    public $regions = [];
    public $processed_district_id = null;
    public $districts = [];
    public $processed_constituency_id = null;
    public $constituencies = [];
    public $processed_electoral_area_id = null;
    public $electoral_areas = [];
    public $processed_polling_station_id = null;
    public $polling_stations = [];
    public $processed_community = null;
    public $priority = 'Low';
    public $support_group_id = null;
    public $support_groups = [];


    public $fields = [];


    protected $rules = [
        'processed_report' => 'required',
        'processed_subcategory_id' => 'required|exists:issue_subcategory,issue_subcategory_id',
        'processed_category_id' => 'required|exists:issue_category,category_id',
        'processed_region_id' => 'nullable|exists:region,region_id',
        'processed_district_id' => 'nullable|exists:district,district_id',
        'processed_constituency_id' => 'nullable|exists:vw_ec_data_constituency,constituency_id',
        'processed_electoral_area_id' => 'nullable|exists:vw_ec_data_electoral_area,electoral_area_id',
        'processed_polling_station_id' => 'nullable|exists:ec_data,polling_station_id',
        'processed_community' => 'nullable',
        'priority' => 'required|in:Low,Medium,High',
        'support_group_id' => 'required|exists:support_group,support_group_id',
    ];

    protected $messages = [
        'processed_report.required' => 'Report details is required',
        'processed_subcategory_id.required' => 'Invalid sub category selected',
        'processed_subcategory_id.exists' => 'Invalid sub category selected',
        'processed_category_id.required' => 'Invalid category selected',
        'processed_category_id.exists' => 'Invalid category selected',
        'processed_region_id.exists' => 'Invalid region selected',
        'processed_district_id.exists' => 'Invalid district selected',
        'processed_constituency_id.exists' => 'Invalid constituency selected',
        'processed_electoral_area_id.exists' => 'Invalid electoral area selected',
        'processed_polling_station_id.exists' => 'Invalid polling station area selected',
        'support_group_id.required' => 'Invalid support group selected',
        'support_group_id.exists' => 'Invalid support group selected',
    ];

    public function store(): void
    {
        $valid = $this->validate();
        $valid['processed_by'] = auth()->id();
        $valid['processed_date'] = now();
        $valid['issue_id'] = $this->complaint->issue_id;

//        $data['updated_by'] = auth()->id();
//        $data['status_id'] = Status::IS_PROCESSED;
//        $data['processed_by'] = $valid['processed_by'];
//        $data['processed_date'] = now();
//        $this->complaint->update($data);
        if ($this->processedComplaint !== null) {
            $this->processedComplaint->update($valid);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record updated successfully!']);
        } else {
            $this->processedComplaint = ProcessedComplaint::create($valid);
            $this->dispatchBrowserEvent('swal:success', ['message' => 'Record saved successfully!']);
        }
    }

    public function submit(): void
    {
        $valid = $this->validate();
        $valid['processed_by'] = auth()->id();
        $valid['processed_date'] = now();
        $valid['issue_id'] = $this->complaint->issue_id;
        if ($this->processedComplaint !== null) {
            $this->processedComplaint->update($valid);
        } else {
            ProcessedComplaint::create($valid);
        }
        $data['updated_by'] = auth()->id();
        $data['status_id'] = Status::IS_PROCESSED;
        $data['processed_by'] = $valid['processed_by'];
        $data['processed_date'] = now();
        $this->complaint->update($data);
        session()->flash('message', 'Complaint submitted successfully.');
        $this->redirect(session('complaint-url'));
    }


    public function updatedProcessedCategoryId($val): void
    {
        $this->processed_subcategory_id = null;
        $this->subcategories = Subcategory::withoutZeroId()->active()
            ->where('category_id', $val)->get();

        $this->fields = Category::find($this->processed_category_id)?->fields()
            ->active()->pluck('field_id')->toArray() ?? [];

//        reset fields
        $this->reset([
            'processed_subcategory_id',
//            'processed_region_id',
//            'processed_district_id',
//            'processed_districts',
//            'processed_constituency_id',
//            'processed_constituencies',
//            'processed_electoral_area_id',
//            'processed_electoral_areas',
//            'processed_polling_station_id',
//            'processed_polling_stations',
        ]);

    }

    public function updatedProcessedRegionId($val): void
    {
        $this->reset([
            'processed_district_id',
            'districts',
            'processed_constituency_id',
            'constituencies',
            'processed_electoral_area_id',
            'electoral_areas',
            'processed_polling_station_id',
            'polling_stations',
        ]);

        $this->constituencies = Constituency::where('region_id', '>', 0)->where('region_id', $val)
            ->orderBy('constituency_name')
            ->get();


        $this->districts = District::withoutZeroId()
            ->where('region_id', $val)
            ->orderBy('district')
            ->get();
    }

    public function updatedProcessedConstituencyId($val): void
    {
        $this->reset([
            'processed_electoral_area_id',
            'electoral_areas',
            'processed_polling_station_id',
            'polling_stations',
        ]);

        $this->electoral_areas = ElectoralArea::where('constituency_id', $val)
            ->orderBy('name')
            ->get();

    }

    public function updatedProcessedElectoralAreaId($val): void
    {
        $this->reset([
            'processed_polling_station_id',
            'polling_stations',
        ]);

        $this->polling_stations = PollingStation::where('electoral_area_id', $val)
            ->orderBy('name')
            ->get();

    }


    public function mount(): void
    {
        $this->categories = Category::withoutZeroId()->active()->get();
        $this->regions = Region::withoutZeroId()->get();

        $this->processedComplaint = ProcessedComplaint::where('issue_id', $this->complaint->issue_id)->first();
        $this->fillForm();
    }

    public function updated($value): void
    {
        $this->validateOnly($value);
    }


    public function fillForm(): void
    {
        $this->processed_report = $this->processedComplaint?->processed_report ?? $this->complaint->raw_report;
        $this->priority = $this->processedComplaint?->priority ?? 'Low';
        $this->processed_category_id = $this->processedComplaint?->processed_category_id ?? $this->complaint->category_id;
        $this->processed_subcategory_id = $this->processedComplaint?->processed_subcategory_id ?? $this->complaint->subcategory_id;
        $this->processed_region_id = $this->processedComplaint?->processed_region_id ?? $this->complaint->region_id;
        $this->processed_district_id = $this->processedComplaint?->processed_district_id ?? $this->complaint->district_id;
        $this->processed_constituency_id = $this->processedComplaint?->processed_constituency_id ?? $this->complaint->constituency_id;
        $this->processed_electoral_area_id = $this->processedComplaint?->processed_electoral_area_id ?? $this->complaint->electoral_area_id;
        $this->processed_polling_station_id = $this->processedComplaint?->processed_polling_station_id ?? $this->complaint->polling_station_id;
        $this->processed_community = $this->processedComplaint?->processed_community ?? $this->complaint->community;
        $this->support_group_id = $this->processedComplaint?->support_group_id ?? null;

        $this->subcategories = Subcategory::withoutZeroId()->active()
            ->where('category_id', $this->processed_category_id)->get();

        $this->fields = Category::find($this->processed_category_id)?->fields()
            ->active()->pluck('field_id')->toArray() ?? [];

        $this->constituencies = Constituency::where('region_id', '>', 0)
            ->where('region_id', $this->processed_region_id)
            ->orderBy('constituency_name')
            ->get();


        $this->districts = District::withoutZeroId()
            ->where('region_id', $this->processed_region_id)
            ->orderBy('district')
            ->get();

        $this->polling_stations = PollingStation::where('electoral_area_id', $this->processed_electoral_area_id)
            ->orderBy('name')
            ->get();

        $this->electoral_areas = ElectoralArea::where('constituency_id', $this->processed_constituency_id)
            ->orderBy('name')
            ->get();

        $this->support_groups = \App\Models\SupportGroup::query()
            ->orderBy('name')
            ->get();


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


    public function render(): View
    {
        return view('livewire.complaint-process-form');
    }
}
