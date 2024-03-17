@extends('layouts.app')
@section('app-content')
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Complaint Details</div>
                    <a href="{{ route('complaints.index') }}">
                        <button class="btn btn-small btn-primary">Go Back</button>
                    </a>
                </div>
                <hr>
                <div class="card-body">
                    <livewire:complaint-form :complaint="$complaint" is-show="true"
                                             :to-url="session('complaint-url')"></livewire:complaint-form>
                    <hr/>
                    @include('complaints.report_processing_tabs', ['complaint' => $complaint])
                </div>
            </div>
            <!-- Card end -->
        </div>
    </div>
@endsection
