{{-- <x-app-layout> --}}
@extends('layout.app')

@section('app-content')
    <div class="card">
        <div class="card-header">
            <h3>Complaints</h3>
        </div>
        {{-- <x-headers.hr /> --}}
        <div class="card-body">
            <div class="my-3">
                <a href="{{ route('complaints.create') }}" id="addBtn" type="button" class="btn btn-primary">
                    <i class="icon-plus"></i> Add New
                </a>
            </div>
            <div class="table-responsive">
                <x-success-message></x-success-message>
                <table id="basicExample" class="table custom-table">
                    <thead>
                    <tr>

                        <th>Reporter</th>
                        <th>Phone Number</th>
                        <th>Complaint</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Media</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($complaints as $item)
                        <tr>

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ substr($item->raw_report, 0, 100).'...' }}</td>
                            <td>{{ $item->category->category }}</td>
                            <td>{{ $item->subcategory->description }}</td>
                            <td>{{ $item->priority}}</td>
                            <td>{{ $item->status->status }}</td>
                            <td><a class="link" href="{{route('complaints.media.index' , $item)}}">Media</a></td>
                            <td>
                                <div class="actions">
 
                                    <a href="#"  data-bs-toggle="tooltip"
                                       data-bs-placement="top" title=""
                                       data-bs-original-title="Process">
                                        <i class="icon-sync text-primary"></i>
                                    </a>
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                       data-bs-original-title="Show">

                                        <i class="icon-eye text-primary"></i>
                                    </a>
                                    <a href="{{ route('complaints.edit', $item) }}" data-bs-toggle="tooltip"
                                       data-bs-placement="top" title="" data-bs-original-title="Edit">
                                        <i class="icon-edit1 text-primary"></i>
                                    </a>
                                    <a onclick="deleteItem('deleteForm-{{ $item->issue_id }}')" href="#"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                       data-bs-original-title="Delete">
                                        <i class="icon-x-circle text-danger"></i>
                                    </a>
                                    <form hidden method="post" id="deleteForm-{{ $item->issue_id }}"
                                          action="{{ route('complaints.destroy', $item->issue_id) }}">
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
{{-- </x-app-layout> --}}
@section('scripts')
    <script>
        function deleteItem(form) {
            if (confirm('Are you sure you want to delete this item?')) {
                document.getElementById(form).submit();
            }
        }
    </script>
@endsection
