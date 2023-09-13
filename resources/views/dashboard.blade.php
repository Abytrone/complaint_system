@extends('layout.app')

@section('page-title')
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">
        <div class="mt-3">
            <div class="page-title-custom">Summaries</div>

            {{-- {{dd(session('userroles')[2])}} --}}
        </div>
    </div>
@endsection

@section('app-content')
    <!-- Row start Dashboard Items 1-->
    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="stats-tile">
                <div class="sale-icon">
                    <i class="icon-map1"></i>
                </div>
                <div class="sale-details">
                    <h2>{{ $totalConstituency ?? '23,545' }}</h2>
                    <p>Resolved Complaints</p>
                </div>
                <div class="sale-graph">
                    <div id="sparklineLine1"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="stats-tile">
                <div class="sale-icon">
                    <i class="icon-address"></i>
                </div>
                <div class="sale-details">
                    {{--                    <h2>{{ $totalElectoralAreas ?? '' }}</h2> --}}
                    <h2>359</h2>
                    <p>Unresolved Complaints</p>
                </div>
                <div class="sale-graph">
                    <div id="sparklineLine2"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="stats-tile">
                <div class="sale-icon">
                    <i class="icon-thumbs-up1"></i>
                </div>
                <div class="sale-details">
                    {{--                    <h2>{{ $totalPollingStations ?? '' }}</h2> --}}
                    <h2>1,491</h2>
                    <p>Pending Complaints</p>
                </div>
                <div class="sale-graph">
                    <div id="sparklineLine3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gutters">
        {{-- <input type="hidden" value="" id="PieData" /> --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Pie Graph</div>
                </div>
                <div class="card-body">
                    <div id="basic-pie-graph"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
