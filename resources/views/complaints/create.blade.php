@extends('layout.app')

@section('app-content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">New Complaint</div>
                    <a href="{{route('complaints.index')}}"><button class="btn btn-small btn-primary">Go Back</button></a>
                </div>
                <hr>
                <div class="card-body">
                    <x-success-message></x-success-message>
                    <!-- Row start -->
                    <form method="POST" action="{{ route('complaints.store') }}">
                        @csrf
                      @include('complaints.form')
                    </form>
                    <!-- Row end -->
                </div>
            </div>
            <!-- Card end -->
        </div>
    </div>
    <!-- Row end -->

    <script>
        function loadDistricts(region) {
                let districtSelect = document.getElementById('districtSelect');
                $.get("/get-districts", {
                    region: region
                }, function(data) {
                    console.log(data)
                    if (data) {
                        districtSelect.innerHTML = `<option value="">Select Districts</option>`;
                        data.options.forEach((item) => {
                            let option = document.createElement('option');
                            option.text = item.District;
                            option.value = item.id;
                            districtSelect.appendChild(option);
                        })
                    }
                })
            }

            function loadConstituencies(region) {
                let constituencySelect = document.getElementById('constituencySelect');
                $.get("/get-constituencies", {
                    region: region
                }, function(data) {
                    console.log(data)
                    if (data) {
                        constituencySelect.innerHTML = `<option value="">Select Constituency</option>`;
                        data.options.forEach((item) => {
                            let option = document.createElement('option');
                            option.text = item.constituency_name;
                            option.value = item.constituency_id;
                            constituencySelect.appendChild(option);
                        })
                    }
                })
            }

            function loadElectoralAreas(constituency){
                let electoraAreaSelect = document.getElementById('electoraAreaSelect');
                $.get("/get-electoralareas", {
                    constituency: constituency
                }, function(data) {
                    console.log(data)
                    if (data) {
                        electoraAreaSelect.innerHTML = `<option value="">Select Electoral Area</option>`;
                        data.options.forEach((item) => {
                            let option = document.createElement('option');
                            option.text = item.ea_name;
                            option.value = item.ea_id;
                            electoraAreaSelect.appendChild(option);
                        })
                    }
                })
            }

            function loadPollingStation(electoralarea){
                let pollingStationSelect = document.getElementById('pollingStationSelect');
                $.get("/get-polling-station", {
                    electoralArea: electoralarea
                }, function(data) {
                    console.log(data)
                    if (data) {
                        pollingStationSelect.innerHTML = `<option value="">Select Polling Station</option>`;
                        data.options.forEach((item) => {
                            let option = document.createElement('option');
                            option.text = item.ps_name;
                            option.value = item.ps_id;
                            pollingStationSelect.appendChild(option);
                        })
                    }
                })
            }

    </script>
@endsection
