@extends('layouts.app')
@section('app-content')
    <div class="row gutters">
        <div class="col-xl-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Complaint Details</div>
                    <a href="{{ session('complaint-url') }}">
                        <button class="btn btn-small btn-primary">Go Back</button>
                    </a>
                </div>
                <hr>
                <div class="card-body">
                    <livewire:complaint-form
                        :complaint="$complaint" is-show="true">
                    </livewire:complaint-form>
                </div>
            </div>
            <!-- Card end -->
        </div>
    </div>

    <div class="row gutters tw-mt-5">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Processing</div>
                </div>
                <hr>
                <div class="card-body">
                    @include('complaints.report_processing_tabs', ['complaint' => $complaint])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let tableMileStone = $('#table-mile-stone').DataTable({})

        let table = $('#complaint-media').DataTable({
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
