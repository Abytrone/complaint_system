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
                   onclick="Livewire.emit('openModal',  'complaint-media-form',{{json_encode(['complaint'=> $complaint])}})"
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
                    {{--                    @foreach ($complaint->media as $item)--}}
                    {{--                        <tr>--}}
                    {{--                            <td>{{ $item->title }}</td>--}}
                    {{--                            <td>{{ $item->type->media_type }}</td>--}}
                    {{--                            <td><a target="_blank" href="{{ asset('storage/'.$item->file_name)}}">preview</a></td>--}}
                    {{--                            <td>--}}
                    {{--                                <div class="actions">--}}
                    {{--                                    <a onclick="deleteItem('deleteForm-{{ $item->issue_media_id }}')" href="#"--}}
                    {{--                                       data-toggle="tooltip" data-placement="top" title=""--}}
                    {{--                                       data-original-title="Delete">--}}
                    {{--                                        <i class="icon-x-circle text-danger"></i>--}}
                    {{--                                    </a>--}}
                    {{--                                    <form hidden method="post" id="deleteForm-{{ $item->issue_media_id }}"--}}
                    {{--                                          action="{{ route('complaints.media.destroy', [$complaint, $item->issue_media_id]) }}">--}}
                    {{--                                        @csrf--}}
                    {{--                                        @method('delete')--}}
                    {{--                                    </form>--}}
                    {{--                                </div>--}}
                    {{--                            </td>--}}
                    {{--                        </tr>--}}
                    {{--                    @endforeach--}}

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        window.table = $('#table').dataTable({
            responsive:true,
            ajax: '/complaints/{{$complaint->issue_code}}/media/table',
            columns: [
                {
                    data: 'title'
                }, {
                    data: 'type.media_type'
                },
                {
                    data: 'file_name',
                    render: function (data) {
                        return `<a target="_blank" href="{{ asset('storage')}}/${data}">preview</a>`
                    }
                },
                {
                    data: 'issue_media_id',

                }
            ]
        })
    </script>
@endsection
{{-- </x-app-layout> --}}
