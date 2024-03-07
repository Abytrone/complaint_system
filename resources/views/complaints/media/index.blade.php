{{-- <x-app-layout> --}}
@extends('layout.app')

@section('app-content')
    <div class="card">
        <div class="card-header">
            <h3>Complaint Media</h3>
        </div>

        <div class="card-body">
            <div class="my-3">
                <a href="{{ route('complaints.media.create', $complaint) }}" id="addBtn" type="button"
                   class="btn btn-primary">
                    <i class="icon-plus"></i> Add New
                </a>
            </div>
            <div class="table-responsive">
                <x-success-message></x-success-message>
                <table id="basicExample" class="table custom-table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>File Type</th>
                        <th></th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($complaint->media as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->type->media_type }}</td>
                            <td><a target="_blank" href="{{ asset('storage/'.$item->file_name)}}">preview</a></td>
                            <td>
                                <div class="actions">
                                    <a onclick="deleteItem('deleteForm-{{ $item->issue_media_id }}')" href="#"
                                       data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete">
                                        <i class="icon-x-circle text-danger"></i>
                                    </a>
                                    <form hidden method="post" id="deleteForm-{{ $item->issue_media_id }}"
                                          action="{{ route('complaints.media.destroy', [$complaint, $item->issue_media_id]) }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function deleteItem(form) {
            if (confirm('Are you sure you want to delete this item?')) {
                document.getElementById(form).submit();
            }
        }
    </script>
@endsection
{{-- </x-app-layout> --}}
