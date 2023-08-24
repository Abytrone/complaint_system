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
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Pie Graph</div>
                </div>
                <div class="card-body">
                    <div id="basic-pie-graph"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Registration Summary</div>
                    {{-- <div>{{ dd(Request::is('complaints/index*')) }}</div> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Executive Level</th>
                                    <th>Number Registered</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($registrationSummary as $summary) --}}
                                <tr>
                                    {{-- <td>{{$summary->ExecutiveLevel}}</td>
                                        <td>{{$summary->NumberRegisted}}</td> --}}
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Row start Dashboard calender -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Activities Calender</div>
                    <div class="graph-day-selection" role="group">

                    </div>
                </div>
                <div class="card-body">
                    <div id="activities-calender"></div>
                </div>
            </div>
        </div>
        {{--        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"> --}}
        {{--			<div class="card"> --}}
        {{--				<div class="card-header"> --}}
        {{--					<div class="card-title">Activities List</div> --}}
        {{--					<div class="graph-day-selection" role="group"> --}}
        {{--					</div> --}}
        {{--				</div> --}}
        {{--				<div class="card-body"> --}}
        {{--                    <ul class="tickets-container"> --}}
        {{--                        <li> --}}
        {{--                            <div class="ticket-details"> --}}
        {{--                                <h6>Executives Meeting</h6> --}}
        {{--                                <span class="ticket-time">10/02/2020 - 9:00 AM</span> --}}
        {{--                            </div> --}}
        {{--                            <div class="ticket-status"> --}}
        {{--                                <span class="badge bg-success">Important</span> --}}
        {{--                            </div> --}}
        {{--                        </li> --}}
        {{--                        <li> --}}
        {{--                            <div class="ticket-details"> --}}
        {{--                                <h6>Apppoint Members</h6> --}}
        {{--                                <span class="ticket-time">14/02/2020 - 9:30 AM</span> --}}
        {{--                            </div> --}}
        {{--                            <div class="ticket-status"> --}}
        {{--                                <span class="badge bg-info">Urgent</span> --}}
        {{--                            </div> --}}
        {{--                        </li> --}}
        {{--                        <li> --}}
        {{--                            <div class="ticket-details"> --}}
        {{--                                <h6>Meeting New Members</h6> --}}
        {{--                                <span class="ticket-time">25/02/2020 - 11:00 AM</span> --}}
        {{--                            </div> --}}
        {{--                            <div class="ticket-status"> --}}
        {{--                                <span class="badge bg-danger">Important and Urgent</span> --}}
        {{--                            </div> --}}
        {{--                        </li> --}}
        {{--                        <li> --}}
        {{--                            <div class="ticket-details"> --}}
        {{--                                <h6>Executives Meeting</h6> --}}
        {{--                                <span class="ticket-time">10/02/2020 - 9:00 AM</span> --}}
        {{--                            </div> --}}
        {{--                            <div class="ticket-status"> --}}
        {{--                                <span class="badge bg-success">Important</span> --}}
        {{--                            </div> --}}
        {{--                        </li> --}}
        {{--                    </ul> --}}
        {{--				</div> --}}
        {{--			</div> --}}
        {{--        </div> --}}
    </div>
    <!-- Row end -->

    <div class="row gutters">
        {{-- <input type="hidden" value="" id="PieData" /> --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Number of Electoral Areas and Polling Stations</div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Constituency</th>
                                <th>Number of Pollings Stations</th>
                                <th>Number of Electoral Area</th>
                                <th>Number of Polling stations Executives</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Bawku Central</td>
                                <td>149</td>
                                <td>20</td>
                                <td>745</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Binduri</td>
                                <td>87</td>
                                <td>12</td>
                                <td>435</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Bolga East</td>
                                <td>43</td>
                                <td>16</td>
                                <td>215</td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>Bolgatanga Central</td>
                                <td>148</td>
                                <td>27</td>
                                <td>740</td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Bongo</td>
                                <td>123</td>
                                <td>38</td>
                                <td>615</td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>Builsa North</td>
                                <td>81</td>
                                <td>31</td>
                                <td>405</td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>Builsa Sout</td>
                                <td>57</td>
                                <td>20</td>
                                <td>285</td>
                            </tr>

                            <tr>
                                <td>8</td>
                                <td>Chianga-Paga</td>
                                <td>129</td>
                                <td>35</td>
                                <td>645</td>
                            </tr>

                            <tr>
                                <td>9</td>
                                <td>Garu</td>
                                <td>70</td>
                                <td>13</td>
                                <td>350</td>
                            </tr>

                            <tr>
                                <td>10</td>
                                <td>Nabdam</td>
                                <td>50</td>
                                <td>13</td>
                                <td>250</td>
                            </tr>

                            <tr>
                                <td>11</td>
                                <td>Navrongo Central</td>
                                <td>126</td>
                                <td>46</td>
                                <td>630</td>
                            </tr>

                            <tr>
                                <td>12</td>
                                <td>Pusiga</td>
                                <td>94</td>
                                <td>15</td>
                                <td>470</td>
                            </tr>

                            <tr>
                                <td>13</td>
                                <td>Talensi</td>
                                <td>98</td>
                                <td>22</td>
                                <td>490</td>
                            </tr>

                            <tr>
                                <td>14</td>
                                <td>Tempane</td>
                                <td>98</td>
                                <td>17</td>
                                <td>490</td>
                            </tr>

                            <tr>
                                <td>15</td>
                                <td>Zebilla</td>
                                <td>138</td>
                                <td>34</td>
                                <td>690</td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Constituency Total</th>
                                <th>1,491</th>
                                <th>359</th>
                                <th>7,445</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Row start report-->
    {{-- <div class="row gutters">
 <div class="card">
    <div class="card-header">
        <div class="card-title">Reports</div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="scrollVertical" class="table custom-table">
                <thead>
                    <tr>
                    <th>Report</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-info">Pending</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                     <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-success">Important</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                     <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-success">Important</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                     <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-success">Important</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                     <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-success">Important</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                     <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-success">Important</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                     <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-success">Important</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                     <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-success">Important</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                     <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-info">Pending</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                     <tr>
                    <td>Executive Meeting Report</td>
                    <td>09-01-2023</td>
                    <td><span class="badge bg-success">Important</span></td>
                    <td><a href="#">View</a></td>
                    </tr>
                </tbody>
        </table>
        </div>
    </div>
</div>
</div> --}}
    <!--Row end -->
@endsection
