@extends('layouts.app')

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
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="stats-tile">
                <div class="sale-icon">
                    <i class="icon-documents"></i>
                </div>
                <div class="sale-details">
                    <h2>{{ $totalConstituency ?? '23' }}</h2>
                    <p>Unprocessed</p>
                </div>
                <div class="sale-graph">
                    <div id="sparklineLine1"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="stats-tile">
                <div class="sale-icon">
                    <i class="icon-archive"></i>
                </div>
                <div class="sale-details">
                    {{--                    <h2>{{ $totalElectoralAreas ?? '' }}</h2> --}}
                    <h2>3</h2>
                    <p>Processed</p>
                </div>
                <div class="sale-graph">
                    <div id="sparklineLine2"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="stats-tile">
                <div class="sale-icon">
                    <i class="icon-thumbs-up1"></i>
                </div>
                <div class="sale-details">
                    {{--                    <h2>{{ $totalPollingStations ?? '' }}</h2> --}}
                    <h2>10</h2>
                    <p>Resolved</p>
                </div>
                <div class="sale-graph">
                    <div id="sparklineLine3"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="stats-tile">
                <div class="sale-icon">
                    <i class="icon-thumbs-down1"></i>
                </div>
                <div class="sale-details">
                    {{--                    <h2>{{ $totalPollingStations ?? '' }}</h2> --}}
                    <h2>5</h2>
                    <p>Response Overdue</p>
                </div>
                <div class="sale-graph">
                    <div id="sparklineLine3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gutters ">
        {{-- <input type="hidden" value="" id="PieData" /> --}}
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Pie Graph</div>
                </div>
                <div class="card-body">
                    <div id="basic-pie-graph"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Complaint Categories</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Number of Complaints</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Air Pollution</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Bush Fires</td>
                                <td>10</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Complaints on Map</div>
        </div>
        <div class="card-body">
            <input style="max-width: 500px; margin-top: 10px;" id="pac-input" class="form-control" type="text"
                   placeholder="Search Box"/>
            <div style="width:100%; height: 500px;" id="google-map"></div>
        </div>
    </div>
@endsection
