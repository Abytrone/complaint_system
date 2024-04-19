<div>
    <form wire:submit.prevent="store">
        <div class="row mb-3">
            <div class="col-md-6 col-12">
                <x-select-field name="category" text="Category" :disabled="$isShow" wire:model="processed_category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->category_id}}">{{ $category->category }}</option>
                    @endforeach
                </x-select-field>
            </div>
            <div class="col-md-6 col-sm-12">
                <x-select-field name="sub_category" text="Sub Category" :disabled="$isShow" wire:model="processed_subcategory_id">
                    @foreach ($subcategories as $subcategory)
                        <option
                            value="{{ $subcategory->issue_subcategory_id }}">  {{ $subcategory->description }}</option>
                    @endforeach
                </x-select-field>
            </div>
            <!-- Field wrapper end -->
        </div>
        <div class="row">

            @if($this->showRegion())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <x-select-field name="region_id" text="Region" :disabled="$isShow" wire:model="processed_region_id">
                        @foreach ($regions as $region)
                            <option value="{{ $region->region_id }}">
                                {{ $region->region }}
                            </option>
                        @endforeach
                    </x-select-field>
                </div>
            @endif
            @if($this->showDistrict())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <x-select-field name="district_id" text="District" :disabled="$isShow" wire:model="processed_district_id">
                        @foreach ($districts as $district)
                            <option value="{{ $district->district_id }}">  {{ $district->district }}  </option>
                        @endforeach
                    </x-select-field>

                </div>
            @endif
            @if($this->showConstituency())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <x-select-field name="constituency_id" text="Constituency" :disabled="$isShow"
                                    wire:model="processed_constituency_id">
                        @foreach ($constituencies as $constituency)
                            <option value="{{ $constituency->constituency_id }}">
                                {{ $constituency->constituency_name }}
                            </option>
                        @endforeach
                    </x-select-field>
                </div>
            @endif
            @if($this->showElectoralArea())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <x-select-field name="electoral_area_id" text="Electoral Area" :disabled="$isShow"
                                    wire:model="processed_electoral_area_id">
                        @foreach($electoral_areas as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                    </x-select-field>
                </div>
            @endif
            @if($this->showPollingStation())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <x-select-field name="polling_station_id" text="Polling Station" :disabled="$isShow"
                                    wire:model="processed_polling_station_id">
                        @foreach ($polling_stations as $station)
                            <option
                                value="{{ $station->id }}">  {{ $station->name }}  </option>
                        @endforeach
                    </x-select-field>
                </div>
            @endif
            @if($this->showCommunity())
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <x-input-field name="community" text="Community" type="text" :disabled="$isShow"
                                   wire:model="processed_community"/>
                </div>
            @endif


            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <x-select-field name="priority" text="Priority" wire:model="priority">
                    @foreach(['Low', 'Medium' ,'High'] as $priority)
                        <option value="{{$priority}}">{{$priority}}</option>
                    @endforeach
                </x-select-field>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                <x-textarea-field name="raw_report" text="Report Details" wire:model="processed_report"
                                  rows="8">
                </x-textarea-field>

            </div>

        </div>

        <div class="tw-flex tw-gap-5">
            <button class="btn btn-primary btn-sm" type="submit">Save</button>
            <button class="btn btn-warning btn-sm" wire:click="submit" type="button">Submit</button>
        </div>

    </form>
</div>
