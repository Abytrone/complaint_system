@extends('layout.app')

@section('app-content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">New Complaint</div>
                </div>
                <hr>
                <div class="card-body">
                    <div class="col-lg-12 text-center">
                        @forelse (['danger', 'warning', 'success', 'info'] as $msg)
                            @if (Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}"><b>{{ Session::get('alert-' . $msg) }}</b>
                                </p>
                            @endif
                        @empty
                        @endforelse
                    </div>
                    <!-- Row start -->
                    <form method="POST" action="{{ route('complaints.store') }}">
                        @csrf
                        <div class="row gutters">

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    {{-- <input class="form-control" type="text"> --}}
                                    <select id="regionDropdown" class="form-select @error('region') is-invalid @enderror"
                                        name="region">
                                        <option value="">Select Region</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}"
                                                {{ old('id') == $region->id ? 'selected' : '' }}>
                                                {{ $region->region }}</option>
                                        @endforeach
                                    </select>
                                    <div class="field-placeholder">Select Region <span class="text-danger">*</span></div>
                                    @error('ActivityLevelID')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    {{-- <input class="form-control" type="text"> --}}
                                    <select id="districtDropdown"
                                        class="form-select @error('district') is-invalid @enderror" name="district">
                                        <option value="">Select District</option>

                                    </select>
                                    <div class="field-placeholder">Select District <span class="text-danger">*</span></div>
                                    @error('ActivityLevelID')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>


                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <select class="form-select @error('Category') is-invalid @enderror" name="id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $ct)
                                            <option value="{{ $ct->id }}"
                                                {{ old('id') == $ct->category ? 'selected' : '' }}>
                                                {{ $ct->category }}</option>
                                        @endforeach
                                    </select>
                                    <div class="field-placeholder">Category<span class="text-danger">*</span></div>
                                    @error('Category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="field-wrapper">
                                    <input class="form-control @error('ReporterName') is-invalid @enderror" type="text"
                                        name="ReporterName" value="{{ old('ReportName') }} ">
                                    <div class="field-placeholder">Reporter Name <span class="text-danger">*</span></div>
                                    @error('ReporterName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>





                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <input class="form-control @error('PhoneNumber') is-invalid @enderror" type="text"
                                        name="PhoneNumber" value="{{ old('PhoneNumber') }} ">
                                    <div class="field-placeholder">Phone Number <span class="text-danger">*</span></div>
                                    @error('PhoneNumber')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <input class="form-control @error('Email') is-invalid @enderror" type="Email"
                                        name="Email" value="{{ old('Email') }} ">
                                    <div class="field-placeholder">Email</div>
                                    @error('Email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <input class="form-control @error('ReportDate') is-invalid @enderror" type="date"
                                        name="ReportDate" value="{{ old('ReportDate') }} ">
                                    <div class="field-placeholder">Report Date<span class="text-danger">*</span></div>
                                    @error('ReportDate')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12"
                                style="display:{{ old('constituency') ? 'block' : 'none' }};" id="showElectoralArea">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    {{-- <input class="form-control" type="text"> --}}
                                    <select onchange="loadPollingStation(this.value)" id="electoral_area"
                                        class="form-select @error('electoral_area') is-invalid @enderror"
                                        name="ElectoralAreaID">
                                        <option value="">Select Electoral Area</option>
                                    </select>
                                    <div class="field-placeholder">Electoral Area <span class="text-danger">*</span></div>
                                    @error('constituency')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12"
                                style="display:{{ old('pollingstation') ? 'block' : 'none' }};" id="showPollingStation">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    {{-- <input class="form-control" type="text"> --}}
                                    <select id="polling_station"
                                        class="form-select @error('polling_station') is-invalid @enderror"
                                        name="PollingStationID">
                                        <option value="">Select Polling Station</option>
                                    </select>
                                    <div class="field-placeholder">Polling Station<span class="text-danger">*</span></div>
                                    @error('polling_station')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <textarea class="form-control @error('ReportDetails') is-invalid @enderror" name="ReportDetails"></textarea>
                                    <div class="field-placeholder">Report Details<span class="text-danger">*</span></div>
                                    @error('ReportDetails')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <textarea class="form-control @error('ProceedMessage') is-invalid @enderror" name="ProceedMessage"></textarea>
                                    <div class="field-placeholder">Processed Message<span class="text-danger">*</span>
                                    </div>
                                    @error('ProceedMessage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="btn btn-primary btn-sm">Submit</button>
                            </div>

                        </div>
                    </form>
                    <!-- Row end -->
                </div>
            </div>
            <!-- Card end -->
        </div>
    </div>
    <!-- Row end -->

    <script>
        $(document).ready(function() {
            $('#regionDropdown').on('change', function() {
                var regionId = $(this).val();
                $('#districtDropdown').empty();

                if (regionId) {
                    $.ajax({
                        url: '/getDistricts/' + regionId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var districtDropdown = $('#districtDropdown');
                            $.each(data, function(key, value) {
                                districtDropdown.append($('<option>').text(value
                                    .District).attr('value', value.id));
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
