@extends('layout.app')

@section('app-content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Complaint</div>
                </div>
                <hr>
                <div class="card-body">
                    <x-success-message></x-success-message>
                    <!-- Row start -->
                    <form method="POST" action="{{ route('complaints.update', $complaint) }}">
                        @method('PUT')
                        @csrf
                        <div class="row gutters">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="field-wrapper">
                                    <select id="regionSelect" onchange="loadDistricts(this.value)" name="region_id"
                                        class="form-select @error('region_id') is-invalid @enderror" id="formSelect">
                                        <option value="">{{ $complaint->region->region }}</option>
                                        <!-- Display the region name -->
                                        @foreach ($regions as $region)
                                            <option {{ $complaint->region_id == $region->id ? 'selected' : '' }}
                                                value="{{ $region->id }}">
                                                {{ $region->region }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="field-placeholder">Region<span class="text-danger">*</span></div>
                                    @error('region_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="field-wrapper">
                                    <select name="mmda_id" id="districtSelect"
                                        class="form-select @error('mmda_id') is-invalid @enderror" id="formSelect">
                                        <option value=""></option>

                                    </select>
                                    <div class="field-placeholder">District<span class="text-danger">*</span></div>
                                    @error('mmda_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <select class="form-select @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                        <option value="">{{ $complaint->state }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected($complaint->category_id == $category->id)>
                                                {{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                    <div class="field-placeholder">Category<span class="text-danger">*</span></div>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="display: none">
                                <div class="field-wrapper">
                                    <input class="form-control @error('code') is-invalid @enderror" type="text"
                                        name="code" value="{{ $complaint->code }} ">
                                    <div class="field-placeholder">Code <span class="text-danger">*</span></div>
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="field-wrapper">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" value="{{ old('name') ?? $complaint->name }} ">
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
                                        name="phone" value="{{ old('phone') ?? $complaint->phone }} ">
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
                                        name="email" value="{{ old('email') ?? $complaint->email }} ">
                                    <div class="field-placeholder">Email</div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>

                            <div class="row gutters">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-md-12 col-sm-12">
                                    <div class="field-wrapper">
                                        <select name="sex" value="{{ old('sex') ?? $complaint->sex }}"
                                            class="form-select @error('sex') is-invalid @enderror" id="formSelect">
                                            <option value="">Select Gender</option>
                                            {{-- <option selected value="{{old('sex') ?? $complaint->sex}}" >{{$complaint->sex}}</option> --}}
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <div class="field-placeholder">Gender<span class="text-danger">*</span></div>
                                        @error('sex')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-md-12 col-sm-12">
                                    <div class="field-wrapper">
                                        <select name="mode" value="{{ old('mode') ?? $complaint->mode }}"
                                            class="form-select @error('mode') is-invalid @enderror" id="formSelect">
                                            <option value="">Select Mode</option>
                                            <option value="Email">Email</option>
                                            <option value="SMS">SMS</option>
                                        </select>
                                        <div class="field-placeholder">Mode<span class="text-danger">*</span></div>
                                        @error('mode')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <!-- Field wrapper start -->
                                <div class="field-wrapper">
                                    <textarea class="form-control @error('raw') is-invalid @enderror" name="raw">{{ old('raw') ?? $complaint->raw }}</textarea>
                                    <div class="field-placeholder">Report Details<span class="text-danger">*</span></div>
                                    @error('raw')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Field wrapper end -->
                            </div>
                            {{-- <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
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
                            </div> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field-wrapper">
                                        <input id="txt-lng" readonly value="" name="longitude"
                                            class="form-control @error('longitude') is-invalid @enderror" type="text">
                                        <div class="field-placeholder">Longitude <span class="text-danger">*</span></div>
                                        @error('longitude')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field-wrapper">
                                        <input id="txt-lat" readonly value="" name="latitude"
                                            class="form-control @error('latitude') is-invalid @enderror" type="text">
                                        <div class="field-placeholder">Latitude <span class="text-danger">*</span></div>
                                        @error('latitude')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                            </div>

                        </div>
                    </form>
                    <!-- Row end -->
                </div>
            </div>
            <!-- Card end -->
        </div>
    </div>
    <script>
        const districtSelect = document.getElementById('districtSelect');
        const initialDistrictId = '{{ $complaint->mmda_id }}'; // Pre-selected district ID from the complaint



        function loadDistricts(region) {
            let districtSelect = document.getElementById('districtSelect');
            $.get("/get-districts", {
                id: region
            }, function(data) {
                console.log(data)
                if (data) {
                    districtSelect.innerHTML = `<option value="">Select Districts</option>`;
                    data.options.forEach((d) => {
                        let option = document.createElement('option');
                        option.text = d.District;
                        option.value = d.id;
                        if (d.id === initialDistrictId) {
                            option.selected = true; // Pre-select the appropriate district
                        }
                        districtSelect.appendChild(option);
                    })
                }
            })
        }

        loadDistricts('{{ $complaint->region_id }}');
    </script>
@endsection
