@extends('layout.app')

@section('app-content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Communication Setup</div>
                    <a href="{{ route('communication-mode.index') }}">
                        <button class="btn btn-small btn-primary">Go Back</button>
                    </a>
                </div>
                <hr>
                <div class="card-body">
                    <x-success-message></x-success-message>
                    <!-- Row start -->
                    <livewire:communication-modes></livewire:communication-modes>
                    <div class="mt-3">
                        <input style="max-width: 500px; margin-top: 10px;" id="pac-input" class="form-control"
                               type="text"
                               placeholder="Search Box"/>
                        <div style="width:100%; height: 500px;" id="google-map"></div>
                    </div>
                    <!-- Row end -->
                </div>
            </div>
            <!-- Card end -->
        </div>
    </div>
    <!-- Row end -->


@endsection
