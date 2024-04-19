<div>
    <form wire:submit.prevent="store">
        <div class="row mb-3">
            <div class="col-md-6 col-12">
                <x-select-field name="category" text="Category" :disabled="$isShow" wire:model="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->category_id}}">{{ $category->category }}</option>
                    @endforeach
                </x-select-field>
            </div>
            <div class="col-md-6 col-sm-12">
                <x-select-field name="sub_category" text="Sub Category" :disabled="$isShow" wire:model="subcategory_id">
                    @foreach ($subcategories as $subcategory)
                        <option
                            value="{{ $subcategory->issue_subcategory_id }}">  {{ $subcategory->description }}</option>
                    @endforeach
                </x-select-field>
            </div>
            <!-- Field wrapper end -->
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <x-input-field type="text" name="name" text="Name" :disabled="$isShow" wire:model="name"/>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <x-input-field type="text" name="phone" text="Phone Number" :disabled="$isShow" wire:model="phone"/>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <x-input-field type="email" name="email" text="Email" :disabled="$isShow"
                               wire:model="email"></x-input-field>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <x-select-field name="gender" text="Gender" :disabled="$isShow" wire:model="gender">
                    @foreach (['Male', 'Female'] as $gender)
                        <option value="{{$gender}}">{{ $gender }}</option>
                    @endforeach
                </x-select-field>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <x-select-field name="mode_id" text="Mode of Contact" :disabled="$isShow" wire:model="mode_id">
                    @foreach ($modes as $mode)
                        <option value="{{$mode->mode_id}}">{{ $mode->mode }}</option>
                    @endforeach
                </x-select-field>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <x-select-field name="source_id" text="Report Source" :disabled="$isShow" wire:model="source_id">
                    @foreach ($sources as $source)
                        <option value="{{$source->source_id}}">{{ $source->source }}</option>
                    @endforeach
                </x-select-field>
            </div>
            @if($this->showRegion())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <x-select-field name="region_id" text="Region" :disabled="$isShow" wire:model="region_id">
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
                    <x-select-field name="district_id" text="District" :disabled="$isShow" wire:model="district_id">
                        @foreach ($districts as $district)
                            <option value="{{ $district->district_id }}">  {{ $district->district }}  </option>
                        @endforeach
                    </x-select-field>

                </div>
            @endif
            @if($this->showConstituency())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <x-select-field name="constituency_id" text="Constituency" :disabled="$isShow"
                                    wire:model="constituency_id">
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
                                    wire:model="electoral_area_id">
                        @foreach($electoral_areas as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                    </x-select-field>
                </div>
            @endif
            @if($this->showPollingStation())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <x-select-field name="polling_station_id" text="Polling Station" :disabled="$isShow"
                                    wire:model="polling_station_id">
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
                                   wire:model="community"/>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                <x-textarea-field name="raw_report" text="Report Details" :disabled="$isShow" wire:model="raw_report"
                                  rows="8">
                </x-textarea-field>

            </div>
            <div class="col-md-3">
                <x-input-field :disabled="$isShow" name="txt-latitude" text="Latitude" wire:model="gps_latitude"
                               type="text"/>
            </div>
            <div class="col-md-3">
                <x-input-field :disabled="$isShow" name="txt-longitude" text="Longitude" wire:model="gps_longitude"
                               type="text"/>
            </div>
            @if(!$isShow)

                <div class="col-md-3">
                    <x-input-field text="Pictures" name="uploads" wire:model="uploads" type="file" multiple/>
                </div>
            @endif
            @if($isShow)
                <div class="col-2 tw-flex tw-items-center tw-justify-center">
                    <a target="_blank"
                       href="https://maps.google.com?lat={{$complaint->gps_latitude}}&lng={{$complaint->gps_longitude}}"
                       class="btn btn-primary btn-sm" type="submit">Show on map</a>
                </div>
            @endif
        </div>
        @if(!$isShow)
            <div class="tw-flex tw-gap-5">
                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                <button class="btn btn-warning btn-sm" wire:click="submit" type="button">Submit</button>
            </div>
        @endif
    </form>
</div>
