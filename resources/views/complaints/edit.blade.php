@extends('layout.app')

@section('app-content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Complaint</div>
                    <a href="{{ route('complaints.index') }}"><button class="btn btn-small btn-primary">Go Back</button></a>
                </div>
                <hr>
                <div class="card-body">
                    <x-success-message></x-success-message>
                    <!-- Row start -->
                    <form method="POST" action="{{ route('complaints.update', $complaint?->issue_id ?? '') }}">
                        @method('PUT')
                        @csrf
                        @include('complaints.form', ['complaint' => $complaint, 'isShow' => false])
                    </form>
                    <!-- Row end -->
                </div>
            </div>d
            <!-- Card end -->
        </div>
    </div>
    <script>
        const districtSelect = document.getElementById('districtSelect');
        const constituencySelect = document.getElementById('constituencySelect');
        const electoraAreaSelect = document.getElementById('electoraAreaSelect');
        const pollingStationSelect = document.getElementById('pollingStationSelect');
        const districtID = @json($complaint?->id);
        const districtName = @json($complaint?->District);
        if (districtID) {
            districtSelect.innerHTML = ''
            districtSelect.innerHTML = `<option value="${districtID}">${districtName}</option>`
        }

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
