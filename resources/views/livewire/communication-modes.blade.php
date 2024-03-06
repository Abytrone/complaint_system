<div>
    <div class="card">
        <div class="card-header">
            <h3>Complaints</h3>
        </div>
        {{-- <x-headers.hr /> --}}
        <div class="card-body">
            <div class="my-3">
                <button  href="{{ route('communication-mode.create') }}" id="addBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#communication-mode-modal">
                    <i class="icon-plus"></i> Add New
                </button>
                @include('setups.modals.communication-mode-modal')
            </div>
            <div wire:ignore class="table-responsive">
                <table id="basicExample" class="table custom-table">
                    <thead>
                        <tr>
                            <th>Modes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($communicationModes as $item)
                            <tr>
                                <td>{{ $item->mode }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="#" wire:click.prevent="edit({{$item->mode_id}})" data-bs-toggle="modal" data-bs-target="#communication-mode-modal">
                                            <i class="icon-edit1 text-primary"></i>
                                        </a>
                                        <a  href="#"
                                        wire:click="delete({{$item->mode_id}})"
                                        wire:confirm    
                                        >
                                            <i class="icon-x-circle text-danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
