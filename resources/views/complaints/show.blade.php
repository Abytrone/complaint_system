@extends('layout.app')
@section('app-content')
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Process Complaint</div>
                    <a href="{{ route('complaints.index') }}"><button class="btn btn-small btn-primary">Go Back</button></a>
                </div>
                <hr>
                <div class="card-body">
                    <x-success-message></x-success-message>

                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                        <!-- Field wrapper start -->
                        <div class="field-wrapper">
                            <textarea @disabled(true) rows="8" class="form-control @error('raw_report') is-invalid @enderror"
                                name="raw_report">{{ $complaint?->raw_report ?? old('raw_report') }}</textarea>
                            <div class="field-placeholder">Report Details <span class="text-danger">*</span></div>
                            @error('raw_report')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Field wrapper end -->
                    </div>



                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="field-wrapper">
                                <input @disabled(true)
                                    class="form-control @error('received_date') is-invalid @enderror" type="date"
                                    name="received_date" value="{{ $complaint?->received_date ?? old('received_date') }}">
                                <div class="field-placeholder">Received Date</div>
                                @error('received_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="field-wrapper">
                                <select @disabled(true) name="mode_fk"
                                    class="form-select @error('mode_fk') is-invalid @enderror" id="formSelect">
                                    <option value="">Select Mode</option>
                                    @foreach ($modes as $mode)
                                        <option @selected(($complaint?->mode_fk ?? old('mode_fk')) == $mode->mode_id) value="{{ $mode->mode_id }}">
                                            {{ $mode->mode }}</option>
                                    @endforeach
                                </select>
                                <div class="field-placeholder">Mode of Contact <span class="text-danger">*</span>
                                </div>
                                @error('mode_fk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="field-wrapper">
                                <select @disabled(true)
                                    class="form-select @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                                    <option value="">Select Category</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option @selected(($complaint?->subcategory_id ?? old('subcategory_id')) == $subcategory->id) value="{{ $subcategory->id }}"
                                            @selected(old('subcategory_id') == $subcategory->id)>
                                            {{ $subcategory->description }}</option>
                                    @endforeach
                                </select>
                                <div class="field-placeholder">Category<span class="text-danger">*</span></div>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="field-wrapper">
                                <select @disabled(true) name="source_fk"
                                    class="form-select @error('source_fk') is-invalid @enderror" id="formSelect">
                                    <option value="">Select Source</option>
                                    @foreach ($issuesources as $source)
                                        <option @selected($complaint?->source_fk ?? old('source_fk') == $source->source_id) value="{{ $source->source_id }}">
                                            {{ $source->source }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="field-placeholder">Issue Source <span class="text-danger">*</span>
                                </div>
                                @error('source_fk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($displayfields as $fields)
                            @if ($fields->field_id == 1)
                                @if (in_array('Disrict', $fieldnames))
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="field-wrapper">
                                            <select @disabled(true) id="regionSelect"
                                                onchange="loadDistricts(this.value)" name="region_fk"
                                                class="form-select @error('region_fk') is-invalid @enderror"
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
                                            <select id="regionSelect" onchange="loadConstituencies(this.value)"
                                                name="region_fk"
                                                class="form-select @error('region_fk') is-invalid @enderror"
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
                            @endif
                            @if ($fields->field_id == 2)
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="field-wrapper">
                                        <select @disabled(true) name="district_fk" id="districtSelect"
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
                                        <select @disabled(true) onchange="loadElectoralAreas(this.value)"
                                            name="constituency_fk" id="constituencySelect"
                                            class="form-select @error('constituency_fk') is-invalid @enderror"
                                            id="formSelect">
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
                                        <input @disabled(true) type="text" name="community"
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
                                        <select @disabled(true) onchange="loadPollingStation(this.value)"
                                            name="electoral_area_fk" id="electoraAreaSelect"
                                            class="form-select @error('electoral_area_fk') is-invalid @enderror"
                                            id="formSelect">
                                            <option value="">Select Constituency first</option>
                                        </select>
                                        <div class="field-placeholder">Electoral Area <span class="text-danger">*</span>
                                        </div>
                                        @error('electoral_area_fk')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if ($fields->field_id == 6)
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="field-wrapper">
                                        <select @disabled(true) name="polling_station_fk"
                                            id="pollingStationSelect"
                                            class="form-select @error('polling_station_fk') is-invalid @enderror"
                                            id="formSelect">
                                            <option value="">Select Electoral Area first</option>

                                        </select>
                                        <div class="field-placeholder">Polling Station <span class="text-danger">*</span>
                                        </div>
                                        @error('polling_station_fk')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <hr />
                    @include('includes.report_processing_tabs', ['complaint' => $complaint])
                    <hr />
                    <input style="max-width: 500px; margin-top: 10px;" id="pac-input" class="form-control"
                        type="text" placeholder="Search Box" />
                    <div style="width:100%; height: 500px;" id="google-map"></div>
                </div>
            </div>
            <!-- Card end -->
        </div>
    </div>
@endsection
