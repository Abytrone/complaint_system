{{-- <x-app-layout> --}}
@extends('layouts.app')

@section('app-content')
    <div class="card">
        <div class="card-header">
            <h3>Complaint Media</h3>
        </div>

        <div class="card-body">
            <div class="my-3">
                <a href="#"
                   onclick="Livewire.emit('openModal',  'complaint-media-form',{{json_encode(['complaint_id'=> $complaint->issue_id])}})"
                   id="addBtn"
                   type="button"
                   class="btn btn-primary">
                    <i class="icon-plus"></i> Add New
                </a>
            </div>
            <div class=" ">

                <table id="table" class="table custom-table">
                    <thead>
                    <tr>
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

@endsection

@section('scripts')
    <script>
        let table = $('#table').DataTable({
            responsive: true,
            ajax: '/complaints/{{$complaint->issue_code}}/media/table',
            columns: [
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
{{-- </x-app-layout> --}}
