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
                <table id="copy-print-csv" class="table v-middle">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Complaint</th>
                            <th>states</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaints as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->phone }}
                                </td>
                                <td>
                                    {{ $item->raw }}
                                </td>
                                <td>
                                    {{ $item->states }}
                                </td>

                                <td>
                                    <div class="actions">
                                        <a href="{{ route('complaints.edit', $item) }}">
                                            <i class="icon-edit1 text-primary"></i>
                                        </a>
                                        <a href="{{ route('complaints.show', $item) }}">
                                            <i class="icon-eye text-warning"></i>
                                        </a>
                                        <a onclick="deleteItem('deleteForm-{{ $item->id }}')" href="#"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete">
                                            <i class="icon-x-circle text-danger"></i>
                                        </a>
                                        <form hidden method="post" id="deleteForm-{{ $item->id }}"
                                            action="{{ route('complaints.destroy', $item->id) }}">
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
