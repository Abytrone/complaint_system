@extends('layout.app')
@section('app-content')
    <div class="card">
        <div class="card-header">
            <h3>Complaint Details</h3>
        </div>
        <div class="card-body">
            <div class="my-3">
                <x-success-message></x-success-message>
                <a href="{{ route('complaints.index') }}" class="btn btn-primary">
                    <i class="icon-arrow-left"></i> Back
                </a>
            </div>
            <div>
                <div class="row gutters">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <input @disabled(true) class="form-control @error('code') is-invalid @enderror"
                                type="text" name="code" value="{{ $complaint->code }}">
                            <div class="field-placeholder">Code</div>
                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row gutters">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <input @disabled(true)
                                class="form-control @error('region_id') is-invalid @enderror" type="text"
                                name="region_id" value="{{ $region->region }}">
                            <div class="field-placeholder">Region</div>
                            @error('region_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <input @disabled(true)
                                class="form-control @error('district_id') is-invalid @enderror" type="text"
                                name="district_id" value="{{ $district->District }}">
                            <div class="field-placeholder">District</div>
                            @error('district_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <input @disabled(true)
                                class="form-control @error('category_id') is-invalid @enderror" type="text"
                                name="category_id" value="{{ $category->category }}">
                            <div class="field-placeholder">Category</div>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <input @disabled(true) class="form-control @error('name') is-invalid @enderror"
                                type="text" name="name" value="{{ $complaint->name }}">
                            <div class="field-placeholder">Name</div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <input @disabled(true) class="form-control @error('phone') is-invalid @enderror"
                                type="text" name="phone" value="{{ $complaint->phone }}">
                            <div class="field-placeholder">Phone Number</div>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <input @disabled(true) class="form-control @error('email') is-invalid @enderror"
                                type="text" name="email" value="{{ $complaint->email }}">
                            <div class="field-placeholder">Email</div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row gutters">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <input @disabled(true)
                                    class="form-control @error('gender') is-invalid @enderror" type="text" name="gender"
                                    value="{{ $complaint->sex }}">
                                <div class="field-placeholder">Gender</div>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <input @disabled(true) class="form-control @error('mode') is-invalid @enderror"
                                    type="text" name="mode" value="{{ $complaint->mode }}">
                                <div class="field-placeholder">Mode</div>
                                @error('mode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                        <!-- Field wrapper start -->
                        <div class="field-wrapper">
                            <textarea @disabled(true) class="form-control @error('raw') is-invalid @enderror" name="raw">{{ $complaint->raw }}</textarea>
                            <div class="field-placeholder">Report Details</div>
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

                    <div class="row gutters">
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
                </div>
            </div>


            @include('includes.report_processing_tabs')

        </div>
    </div>
@endsection
