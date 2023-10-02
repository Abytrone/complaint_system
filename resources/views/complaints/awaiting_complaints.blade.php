{{-- <x-app-layout> --}}
@extends('layout.app')

@section('app-content')
    <div class="card">
        <div class="card-header">
            <h3>Awaiting Complaints</h3>
        </div>
        {{-- <x-headers.hr /> --}}
        <div class="card-body">
            <div class="table-responsive">
                <x-success-message></x-success-message>
                <table id="basicExample" class="table custom-table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Complaint</th>
                            <th>Region</th>
                            <th>District</th>
                            <th>states</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaints as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->raw }}</td>
                                <td>{{ $item->region_id }}</td>
                                <td>{{ $item->mmda_id }}</td>
                                <td>{{ $item->states }}</td>

                                <td>
                                    <div class="actions">
                                        <a href="{{ route('complaints.show', $item->issue_id) }}">
                                            <i class="icon-eye text-primary"></i>
                                        </a>
                                        <a href="{{ route('complaints.edit', $item->issue_id) }}">
                                            <i class="icon-edit1 text-primary"></i>
                                        </a>
                                        <a onclick="deleteItem('deleteForm-{{ $item->issue_id }}')" href="#"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete">
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
@section('scripts')
    <script>
        function deleteItem(form) {
            if (confirm('Are you sure you want to delete this item?')) {
                document.getElementById(form).submit();
            }
        }
    </script>
@endsection
@endsection
{{-- </x-app-layout> --}}
