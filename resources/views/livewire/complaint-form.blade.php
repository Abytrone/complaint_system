<div>
    <form wire:submit.prevent="store">
        <div class="row mb-3">
            <div class="col-md-6 col-12">
                <div class="field-wrapper">
                    <select id="category" @disabled($isShow) wire:model="category_id"
                            class="form-select @error('category_id') is-invalid @enderror">
                        <option>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->category_id}}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    <label for="category" class="field-placeholder">Category</label>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                    <select @disabled($isShow) wire:model="subcategory_id"
                            class="form-select @error('subcategory_id') is-invalid @enderror">
                        <option value="">Select Sub Category</option>
                        @foreach ($subcategories as $subcategory)
                            <option
                                value="{{ $subcategory->issue_subcategory_id }}">  {{ $subcategory->description }}</option>
                        @endforeach
                    </select>
                    <div class="field-placeholder">Sub Category<span class="text-danger">*</span></div>
                    @error('subcategory_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field wrapper end -->
            </div>

        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="field-wrapper">
                    <input @disabled($isShow) class="form-control @error('name') is-invalid @enderror" type="text"
                           name="name" wire:model="name">
                    <div class="field-placeholder">Reporter Name <span class="text-danger">*</span></div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                    <input @disabled($isShow) class="form-control @error('phone') is-invalid @enderror" type="text"
                           name="phone" wire:model="phone">
                    <div class="field-placeholder">Phone Number <span class="text-danger">*</span></div>
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field wrapper end -->
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                    <input @disabled($isShow) class="form-control @error('email') is-invalid @enderror" type="email"
                           name="email" wire:model="email">
                    <div class="field-placeholder">Email</div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field wrapper end -->
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="field-wrapper">
                    <select @disabled($isShow) wire:model="gender"
                            class="form-select @error('gender') is-invalid @enderror">
                        <option>Select Gender</option>
                        @foreach (['Male', 'Female'] as $gender)
                            <option value="{{$gender}}">{{ $gender }}</option>
                        @endforeach
                    </select>
                    <div class="field-placeholder">Gender</div>
                    @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="field-wrapper">
                    <input @disabled($isShow) class="form-control @error('received_date') is-invalid @enderror"
                           type="date" wire:model="received_date">
                    <div class="field-placeholder">Received Date</div>
                    @error('received_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="field-wrapper">
                    <select @disabled($isShow) wire:model="mode_id"
                            class="form-select @error('mode_id') is-invalid @enderror">
                        <option value="">Select Mode</option>
                        @foreach ($modes as $mode)
                            <option value="{{$mode->mode_id}}">{{ $mode->mode }}</option>
                        @endforeach
                    </select>
                    <div class="field-placeholder">Mode of Contact <span class="text-danger">*</span>
                    </div>
                    @error('mode_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="field-wrapper">
                    <select @disabled($isShow) wire:model="source_id"
                            class="form-select @error('source_id') is-invalid @enderror">
                        <option value="">Select Source</option>
                        @foreach ($sources as $source)
                            <option value="{{$source->source_id}}">{{ $source->source }}</option>
                        @endforeach
                    </select>
                    <div class="field-placeholder">Report Source <span class="text-danger">*</span>
                    </div>
                    @error('source_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            @if($this->showRegion())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select @disabled($isShow) wire:model="region_id"
                                class="form-select @error('region_id') is-invalid @enderror">
                            <option>Select</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->region_id }}">
                                    {{ $region->region }}
                                </option>
                            @endforeach
                        </select>
                        <div class="field-placeholder">Region<span class="text-danger">*</span></div>
                        @error('region_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            @endif
            @if($this->showDistrict())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select @disabled($isShow) wire:model="district_id"
                                class="form-select @error('district_id') is-invalid @enderror">
                            <option value="">Select</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->district_id }}">  {{ $district->district }}  </option>
                            @endforeach
                        </select>
                        <div class="field-placeholder">District<span class="text-danger">*</span></div>
                        @error('district_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            @endif
            @if($this->showConstituency())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select @disabled($isShow) wire:model="constituency_id"
                                class="form-select @error('constituency_id') is-invalid @enderror">
                            <option value="">Select</option>
                            @foreach ($constituencies as $constituency)
                                <option value="{{ $constituency->constituency_id }}">
                                    {{ $constituency->constituency_name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="field-placeholder">Constituency<span class="text-danger">*</span></div>
                        @error('constituency_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            @endif
            @if($this->showElectoralArea())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select @disabled($isShow) wire:model="electoral_area_id"
                                class="form-select @error('electoral_area_id') is-invalid @enderror">
                            <option value="">Select Constituency first</option>
                            @foreach($electoral_areas as $area)
                                <option value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach
                        </select>
                        <div class="field-placeholder">Electoral Area <span class="text-danger">*</span>
                        </div>
                        @error('electoral_area_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            @endif
            @if($this->showPollingStation())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select @disabled($isShow) wire:model="polling_station_id"
                                class="form-select @error('polling_station_id') is-invalid @enderror">
                            <option value="">Select</option>
                            @foreach ($polling_stations as $station)
                                <option
                                    value="{{ $station->id }}">  {{ $station->name }}  </option>
                            @endforeach
                        </select>
                        <div class="field-placeholder">Polling Station<span class="text-danger">*</span>
                        </div>
                        @error('polling_station_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif
            @if($this->showCommunity())
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <input @disabled($isShow) type="text"
                               wire:model="community"
                               class="form-control @error('community') is-invalid @enderror"/>
                        <div class="field-placeholder">Community <span class="text-danger">*</span></div>
                        @error('community')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif


            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                <textarea @disabled($isShow) wire:model="raw_report" rows="8"
                          class="form-control @error('raw_report') is-invalid @enderror"></textarea>
                    <div class="field-placeholder">Report Details <span class="text-danger">*</span></div>
                    @error('raw_report')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field wrapper end -->
            </div>

            <div class="col-md-3">
                <div class="field-wrapper">
                    <input @disabled($isShow) id="txt-latitude"
                           wire:model="gps_latitude"
                           class="form-control @error('gps_latitude') is-invalid @enderror" type="text">
                    <div class="field-placeholder">Latitude <span class="text-danger">*</span></div>
                    @error('gps_latitude')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="field-wrapper">
                    <input @disabled($isShow) id="txt-longitude"
                           wire:model="gps_longitude"
                           class="form-control @error('gps_longitude') is-invalid @enderror" type="text">
                    <div class="field-placeholder">Longitude<span class="text-danger">*</span></div>
                    @error('gps_longitude')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @if($isShow)
                <div class="col-2 tw-flex tw-items-center tw-justify-center">
                    <a href="https://maps.google.com?lat={{$complaint->gps_latitude}}&lng={{$complaint->gps_longitude}}"
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
