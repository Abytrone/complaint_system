<div class="m-3" wire:ignore>
    <form wire:submit.prevent="store">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="field-wrapper">
                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                           name="name" wire:model="name">
                    <div class="field-placeholder">Name <span class="text-danger">*</span></div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                    <input class="form-control @error('phone') is-invalid @enderror" type="text"
                           name="phone" wire:model="phone">
                    <div class="field-placeholder">Phone Number <span class="text-danger">*</span></div>
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field wrapper end -->
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                           name="email" wire:model="email">
                           <div class="field-placeholder">Phone Number <span class="text-danger">*</span></div>
                    <div class="field-placeholder">Email</div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field wrapper end -->
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="field-wrapper">
                    <select wire:model="gender"
                            class="form-select @error('gender') is-invalid @enderror">
                        <option>Select Gender</option>
                        @foreach (['Male', 'Female'] as $gender)
                            <option value="{{$gender}}">{{ $gender }}</option>
                        @endforeach
                    </select>
                    <div class="field-placeholder">Phone Number <span class="text-danger">*</span></div>
                    <div class="field-placeholder">Gender</div>
                    @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            @if($this->showRegion())
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select wire:model="region_id"
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
                        <select wire:model="district_id"
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
                        <select wire:model="constituency_id"
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
                        <select wire:model="electoral_area_id"
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
                        <select wire:model="polling_station_id"
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
                        <input type="text"
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
                <textarea wire:model="raw_report" rows="8"
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
                    <input id="txt-latitude"
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
                    <input id="txt-longitude"
                           wire:model="gps_longitude"
                           class="form-control @error('gps_longitude') is-invalid @enderror" type="text">
                    <div class="field-placeholder">Longitude<span class="text-danger">*</span></div>
                    @error('gps_longitude')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
            </div>
            <div class="mt-3">
                <input style="max-width: 500px; margin-top: 10px;" id="pac-input" class="form-control"
                       type="text"
                       placeholder="Search Box"/>
                <div style="width:100%; height: 500px;" id="google-map"></div>
            </div>
        </div>
    </form>
</div>
