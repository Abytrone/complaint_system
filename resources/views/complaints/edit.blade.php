@extends('layouts.app')
@section('app-content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Complaint</div>
                    <a href="{{ route('complaints.index') }}">
                        <button class="btn btn-small btn-primary">Go Back</button>
                    </a>
                </div>
                <hr>
                <div class="card-body">
                    <x-success-message></x-success-message>
                    <!-- Row start -->
                    <livewire:complaint-form :complaint="$complaint" :show-submit="true"></livewire:complaint-form>
                    <div class="tw-mt-5">
                        <button class="btn btn-warning"
                                onclick="document.getElementById('map-container').classList.toggle('tw-hidden')">
                            Show/Hide Map
                        </button>
                    </div>
                    <div id="map-container" class="mt-3 tw-hidden">
                        <input style="max-width: 500px; margin-top: 10px;" id="pac-input" class="form-control"
                               type="text"
                               placeholder="Search Box"/>
                        <div style="width:100%; height: 500px;" id="google-map"></div>
                    </div>
                    <!-- Row end -->
                </div>
            </div>
            <!-- Card end -->
            <div class="card" id="media-section">
                <div class="card-header">
                    <div class="card-title">Complaint Media</div>
                </div>
                <div class="card-body">
                    <div class=" ">

                        <table id="table" class="table custom-table">
                            <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Title</th>
                                <th>File Type</th>
                                <th></th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
{{--    <div class="test-gallery tw-flex">--}}
{{--        @foreach(\App\Models\ComplaintMedia::where('complaint_id', $complaint->issue_id)->get() as $file)--}}
{{--            <a href="{{asset('storage/'. $file->file_name)}}" data-pswp-width="100" data-pswp-height="100">--}}
{{--                <img src="{{asset('storage/'. $file->file_name)}}" style="object-fit: cover" width="100" height="100" alt=""/>--}}
{{--            </a>--}}
{{--        @endforeach--}}
{{--    </div>--}}


    <script type="text/javascript">
            var lightbox = new PhotoSwipeLightbox({
                gallery: '.test-gallery',
                children: 'a',
                // dynamic import is not supported in UMD version
                pswpModule: PhotoSwipe
            });
            lightbox.init();
    </script>

@endsection
@section('scripts')
    <script>
        let table = $('#table').DataTable({
            responsive: true,
            ajax: '/complaints/{{$complaint->issue_code}}/media/table',
            columns: [
                {
                    data: 'file_name',
                    render: function (data) {
                        return `<img style='width:60px;height:60px' src="{{asset('storage')}}/${data}"/>`
                    }
                },
                {data: 'title'},
                {data: 'type.media_type'},
                {
                    data: 'file_name', render: function (data) {
                        return `<a target="_blank" href="{{ asset('storage')}}/${data}">preview</a>`
                    }
                },
                {
                    data: 'issue_media_id',
                    render: function (data) {
                        return `<a href="#" onclick="deleteMedia(${data})" ata-bs-toggle="tooltip"
                           data-bs-placement="top" title="" data-bs-original-title="Delete">
                            <i class="icon-trash-2 text-danger"></i>
                        </a>`

                    }
                    //     todo: delete action here

                }
            ]
        })
        window.table = table

        function deleteMedia(id) {
            window.swalConfirm().then(function (result) {
                if (result.value) {
                    window.axios.delete(route('complaints.media.destroy', {
                        complaint: '{{$complaint->issue_code}}',
                        medium: id
                    })).then(_ => {
                        swalCustom('Record deleted successfully')
                    }).catch(_ => {
                        swalCustom('An error occurred', 'Error!', 'error')
                    })
                }

                table.ajax.reload();
            })
        }
    </script>
@endsection
