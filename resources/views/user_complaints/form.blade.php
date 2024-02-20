<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="field-wrapper">
            <input @disabled($isShow) class="form-control @error('name') is-invalid @enderror" type="text"
                name="name" value="{{ $complaint?->name ?? old('name') }} ">
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
                name="phone" value="{{ $complaint?->phone ?? old('phone') }} ">
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
                name="email" value="{{ $complaint?->email ?? old('email') }} ">
            <div class="field-placeholder">Email</div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Field wrapper end -->
    </div>

    <div class="col-lg-2 col-md-12 col-sm-12">
        <div class="field-wrapper">
            <select @disabled($isShow) name="gender"
                class="form-select @error('gender') is-invalid @enderror" id="formSelect">
                <option value="">Select Gender</option>
                @foreach (['Male', 'Female'] as $gender)
                    <option @selected(($complaint?->gender ?? old('gender')) == $gender) value="{{ $gender }}">{{ $gender }}</option>
                @endforeach
            </select>
            <div class="field-placeholder">Gender</div>
            @error('gender')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="field-wrapper">
            <select @disabled($isShow) name="mode_fk"
                class="form-select @error('mode_fk') is-invalid @enderror" id="formSelect">
                <option value="">Select Mode</option>
                @foreach ($modes as $mode)
                    <option @selected(($complaint?->mode_fk ?? old('mode_fk')) == $mode->mode_id) value="{{ $mode->mode_id }}">{{ $mode->mode }}</option>
                @endforeach
            </select>
            <div class="field-placeholder">Mode of Contact <span class="text-danger">*</span>
            </div>
            @error('mode_fk')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-lg-4 col-md-12 col-sm-12">
        <!-- Field wrapper start -->
        <div class="field-wrapper">
            <select @disabled($isShow) class="form-select @error('subcategory_id') is-invalid @enderror"
                name="subcategory_id">
                <option value="">Select Category</option>
                @foreach ($subcategories as $subcategory)
                    <option @selected(($complaint?->subcategory_id ?? old('subcategory_id')) == $subcategory->id) value="{{ $subcategory->id }}" @selected(old('subcategory_id') == $subcategory->id)>
                        {{ $subcategory->description }}</option>
                @endforeach
            </select>
            <div class="field-placeholder">Category<span class="text-danger">*</span></div>
            @error('subcategory_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Field wrapper end -->
    </div>
    @foreach ($displayfields as $fields)
        @if ($fields->field_id == 1)
            @if (in_array('Disrict', $fieldnames))
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select @disabled($isShow) id="regionSelect" onchange="loadDistricts(this.value)"
                            name="region_fk" class="form-select @error('region_fk') is-invalid @enderror"
                            id="formSelect">
                            <option value="">Select</option>
                            @foreach ($regions as $region)
                                <option @selected($complaint?->region_fk ?? old('region_fk') == $region->id) value="{{ $region->id }}">
                                    {{ $region->region }}
                                </option>
                            @endforeach
                        </select>
                        <div class="field-placeholder">Region<span class="text-danger">*</span></div>
                        @error('region_fk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif
            @if (in_array('Constituency', $fieldnames))
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select id="regionSelect" onchange="loadConstituencies(this.value)" name="region_fk"
                            class="form-select @error('region_fk') is-invalid @enderror" id="formSelect">
                            <option value="">Select</option>
                            @foreach ($regions as $region)
                                <option @selected($complaint?->region_fk ?? old('region_fk') == $region->id) value="{{ $region->id }}">
                                    {{ $region->region }}
                                </option>
                            @endforeach
                        </select>
                        <div class="field-placeholder">Region<span class="text-danger">*</span></div>
                        @error('region_fk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif
        @endif
        @if ($fields->field_id == 2)
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="field-wrapper">
                    <select @disabled($isShow) name="district_fk" id="districtSelect"
                        class="form-select @error('district_fk') is-invalid @enderror" id="formSelect">
                        <option value="">Select Region first</option>

                    </select>
                    <div class="field-placeholder">District <span class="text-danger">*</span></div>
                    @error('district_fk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
        @if ($fields->field_id == 3)
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="field-wrapper">
                    <select @disabled($isShow) onchange="loadElectoralAreas(this.value)"
                        name="constituency_fk" id="constituencySelect"
                        class="form-select @error('constituency_fk') is-invalid @enderror" id="formSelect">
                        <option value="">Select Region first</option>

                    </select>
                    <div class="field-placeholder">Constituency <span class="text-danger">*</span></div>
                    @error('constituency_fk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
        @if ($fields->field_id == 4)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="field-wrapper">
                    <input @disabled($isShow) type="text" name="community"
                        value="{{ $complaint?->community ?? old('community') }}"
                        class="form-control @error('community') is-invalid @enderror" />
                    <div class="field-placeholder">Community <span class="text-danger">*</span></div>
                    @error('community')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
        @if ($fields->field_id == 5)
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="field-wrapper">
                    <select @disabled($isShow) onchange="loadPollingStation(this.value)"
                        name="electoral_area_fk" id="electoraAreaSelect"
                        class="form-select @error('electoral_area_fk') is-invalid @enderror" id="formSelect">
                        <option value="">Select Constituency first</option>
                    </select>
                    <div class="field-placeholder">Electoral Area <span class="text-danger">*</span></div>
                    @error('electoral_area_fk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
        @if ($fields->field_id == 6)
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="field-wrapper">
                    <select @disabled($isShow) name="polling_station_fk" id="pollingStationSelect"
                        class="form-select @error('polling_station_fk') is-invalid @enderror" id="formSelect">
                        <option value="">Select Electoral Area first</option>

                    </select>
                    <div class="field-placeholder">Polling Station <span class="text-danger">*</span></div>
                    @error('polling_station_fk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
    @endforeach

    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
        <!-- Field wrapper start -->
        <div class="field-wrapper">
            <textarea @disabled($isShow) rows="8" class="form-control @error('raw_report') is-invalid @enderror"
                name="raw_report">{{ $complaint?->raw_report ?? old('raw_report') }}</textarea>
            <div class="field-placeholder">Report Details <span class="text-danger">*</span></div>
            @error('raw_report')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Field wrapper end -->
    </div>

    {{-- <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="field-wrapper">
            <select @disabled($isShow) name="source_fk"
                class="form-select @error('source_fk') is-invalid @enderror" id="formSelect">
                <option value="">Select Source</option>
                @foreach ($issuesources as $source)
                    <option @selected($complaint?->source_fk ?? old('source_fk') == $source->source_id) value="{{ $source->source_id }}">{{ $source->source }}
                    </option>
                @endforeach
            </select>
            <div class="field-placeholder">Issue Source <span class="text-danger">*</span>
            </div>
            @error('source_fk')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div> --}}

    <div class="col-md-3">
        <div class="field-wrapper">
            <input @disabled($isShow) id="txt-latitude"
                value="{{ $complaint?->gps_latitude ?? old('gps_latitude') }}" name="gps_latitude"
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
                value="{{ $complaint?->gps_longitude ?? old('gps_longitude') }}" name="gps_longitude"
                class="form-control @error('gps_longitude') is-invalid @enderror" type="text">
            <div class="field-placeholder">Longitude<span class="text-danger">*</span></div>
            @error('gps_longitude')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="text-align-right">
            <div class="col-12" style="text-align: right;">
                <button class="btn btn-primary" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                    data-bs-target="#uploads-media">Upload
                    Media</button>
            </div>
        </div>
    </div>

    <input style="max-width: 500px; margin-top: 10px;" id="pac-input" class="form-control" type="text"
        placeholder="Search Box" />
    <div style="width:100%; height: 500px;" id="google-map"></div>

    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
    </div>

</div>
@include('includes/modals/complaint-media-modal')
