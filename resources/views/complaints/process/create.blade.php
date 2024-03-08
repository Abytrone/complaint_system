@extends('layout.app')

@section('app-content')
    <div class="row gutters">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Process Complaint</div>
                    <a href="{{ route('complaints.index') }}">
                        <button class="btn btn-small btn-primary">Go Back</button>
                    </a>
                </div>
                <hr>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

@endsection
