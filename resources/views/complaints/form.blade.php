<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="field-wrapper">
            <input class="form-control @error('name') is-invalid @enderror" type="text"
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
            <input class="form-control @error('phone') is-invalid @enderror" type="text"
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
            <input class="form-control @error('email') is-invalid @enderror" type="email"
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
            <select name="gender" class="form-select @error('gender') is-invalid @enderror" id="formSelect">
                <option value="">Select Gender</option>
                @foreach(['Male', 'Female'] as $gender)
                    <option
                        @selected(($complaint?->sex??old('sex')) == $gender)) value="{{$gender}}">{{$gender}}</option>
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
                <input class="form-control @error('received_date') is-invalid @enderror" type="date"
                       name="received_date" value="{{ $complaint?->email ?? old('received_date') }} ">
            <div class="field-placeholder">Received Date</div>
            @error('received_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="field-wrapper">
            <select name="mode_fk" class="form-select @error('mode_fk') is-invalid @enderror"
                    id="formSelect">
                <option value="">Select Mode</option>
                @foreach($modes as $mode)
                    <option
                        @selected(($complaint?->mode_id ?? old('mode_fk')==$mode->mode_id)) value="{{$mode->mode_id}}">{{$mode->mode}}</option>
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
            <select class="form-select @error('subcategory_fk') is-invalid @enderror"
                    name="subcategory_fk">
                <option value="">Select Sub category</option>
                @foreach ($subcategories as $subcategory)
                    <option
                        @selected(($complaint?->issue_subcategory_fk??old('subcategory_fk'))==$subcategory->id) value="{{ $subcategory->id }}" @selected(old('subcategory_id') == $subcategory->id)>
                        {{ $subcategory->description }}</option>
                @endforeach
            </select>
            <div class="field-placeholder">Category<span class="text-danger">*</span></div>
            @error('subcategory_fk')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Field wrapper end -->
    </div>
    @foreach($displayfields as $fields)
        @if($fields->field_fk == 1)
            @if(in_array('Disrict', $fieldnames))
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select id="regionSelect" onchange="loadDistricts(this.value)" name="region_fk"
                                class="form-select @error('region_fk') is-invalid @enderror" id="formSelect">
                            <option value="">Select</option>
                            @foreach ($regions as $region)
                                <option
                                    @selected($complaint?->region_fk??old('region_fk')==$region->id) value="{{ $region->id }}">{{ $region->region }}</option>
                            @endforeach
                        </select>
                        <div class="field-placeholder">Region<span class="text-danger">*</span></div>
                        @error('region_fk')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif
            @if(in_array('Constituency', $fieldnames))
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select id="regionSelect" onchange="loadConstituencies(this.value)" name="region_fk"
                                class="form-select @error('region_fk') is-invalid @enderror" id="formSelect">
                            <option value="">Select</option>
                            @foreach ($regions as $region)
                                <option
                                    @selected($complaint?->region_fk??old('region_fk')==$region->id) value="{{ $region->id }}">{{ $region->region }}</option>
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
        @if($fields->field_fk == 2)
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="field-wrapper">
                    <select name="district_fk" id="districtSelect"
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
        @if($fields->field_fk == 3)
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="field-wrapper">
                    <select onchange="loadElectoralAreas(this.value)" name="constituency_fk" id="constituencySelect"
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
        @if($fields->field_fk == 4)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="field-wrapper">
                    <input type="text" name="community" value="{{$complaint?->community ?? old('community')}}" class="form-control @error('community') is-invalid @enderror"/>
                    <div class="field-placeholder">Community <span class="text-danger">*</span></div>
                    @error('community')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
        @if($fields->field_fk == 5)
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="field-wrapper">
                    <select onchange="loadPollingStation(this.value)" name="electoral_area_fk" id="electoraAreaSelect"
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
        @if($fields->field_fk == 6)
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="field-wrapper">
                    <select name="polling_station_fk" id="pollingStationSelect"
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
            <textarea class="form-control @error('raw_report') is-invalid @enderror" name="raw_report">{{$ccomplaint?->raw_report??old('raw_report')}}</textarea>
            <div class="field-placeholder">Report Details <span class="text-danger">*</span></div>
            @error('raw_report')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Field wrapper end -->
    </div>

    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="field-wrapper">
            <select name="source_fk" class="form-select @error('source_fk') is-invalid @enderror"
                    id="formSelect">
                <option value="">Select Source</option>
                @foreach($issuesources as $source)
                    <option
                        @selected(($complaint?->source_fk ?? old('source_fk')==$source->source_id)) value="{{$source->source_id}}">{{$source->source}}</option>
                @endforeach
            </select>
            <div class="field-placeholder">Issue Source <span class="text-danger">*</span>
            </div>
            @error('mode_fk')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="field-wrapper">
            <input
                id="txt-latitude"
                value="{{$complaint?->gps??old('gps_latitude')}}"
                name="gps_latitude"
                class="form-control @error('gps_latitude') is-invalid @enderror" type="text">
            <div class="field-placeholder">Latitude <span class="text-danger">*</span></div>
            @error('gps_latitude')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="field-wrapper">
            <input
                id="txt-longitude"
                value="{{$complaint?->gps??old('gps_longitude')}}"
                name="gps_longitude"
                class="form-control @error('gps_longitude') is-invalid @enderror" type="text">
            <div class="field-placeholder">Longitude<span class="text-danger">*</span></div>
            @error('gps_longitude')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <input
        style="max-width: 500px"
        id="pac-input"
        class="form-control"
        type="text"
        placeholder="Search Box"
    />
    <div style="width:100%; height: 500px;" id="google-map">

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
    </div>

</div>
