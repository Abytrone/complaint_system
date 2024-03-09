<div>
    <div>
        <div class="card">
            <div class="card-header">
                <h3>Issue source</h3>
            </div>
            {{-- <x-headers.hr /> --}}
            <div class="card-body">
                <div class="my-3">
                    <button  href="#" id="addBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#issue-source-modal">
                        <i class="icon-plus"></i> Add New
                    </button>
                    @include('setups.issue-source.issue-source-modal')
                </div>
                <div wire:ignore class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Source</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sources as $item)
                                <tr>
                                    <td>{{ strtoUpper($item?->source) }}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="#" wire:click.prevent="edit({{$item?->source_id}})" data-bs-toggle="modal" data-bs-target="#issue-source-modal">
                                                <i class="icon-edit1 text-primary"></i>
                                            </a>
                                            <a  href="#"
                                            wire:click="delete({{$item?->source_id}})"
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
    
</div>
