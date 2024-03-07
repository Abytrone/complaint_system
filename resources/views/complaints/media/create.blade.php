@extends('layout.app')

@section('app-content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">New Media</div>
                    <a href="{{ route('complaints.media.index', $complaint) }}">
                        <button class="btn btn-small btn-primary">Go Back</button>
                    </a>
                </div>
                <hr>
                <div class="card-body">
                    <x-success-message></x-success-message>
                    <!-- Row start -->
                    <livewire:complaint-media-form :record="$complaint"></livewire:complaint-media-form>

                    <!-- Row end -->
                </div>
            </div>
            <!-- Card end -->
        </div>
    </div>
    <!-- Row end -->


@endsection
