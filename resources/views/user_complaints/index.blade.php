@extends('layout.user_app')

@section('app-content')
    <!-- Row start -->
    {{-- <div class="row"> --}}
    <div class="col-md-12">
        <!-- Card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">New Complaint</div>
            </div>
            <hr>
            <div class="card-body">
                <x-success-message></x-success-message>
                <!-- Row start -->
                <form method="POST" action="{{ route('user_complaints.store') }}">
                    @csrf
                    @include('user_complaints.form', [
                        'complaint' => $complaints,
                        'isShow' => false,
                    ])
                </form>
                <!-- Row end -->
            </div>
        </div>
        <!-- Card end -->
    </div>
    {{-- </div> --}}
    <!-- Row end -->

    <script>
        const districtSelect = document.getElementById('districtSelect');
        const constituencySelect = document.getElementById('constituencySelect');
        const electoraAreaSelect = document.getElementById('electoraAreaSelect');
        const pollingStationSelect = document.getElementById('pollingStationSelect');

        function loadDistricts(region) {
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

        function loadElectoralAreas(constituency) {
            $.get("/get-electoral-areas", {
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

        function loadPollingStation(electoralarea) {
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
