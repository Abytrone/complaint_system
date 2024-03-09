<div>
    <div>
        <div class="card">
            <div class="card-header">
                <h3>Issue status</h3>
            </div>
            {{-- <x-headers.hr /> --}}
            <div class="card-body">
                <div class="my-3">
                    <button  href="#" id="addBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#issue-status-modal">
                        <i class="icon-plus"></i> Add New
                    </button>
                    @include('setups.issue-status.issue-status-modal')
                </div>
                <div wire:ignore class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Description</th>            
                                <th>SMS Message</th>
                                <th>Email Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuses as $item)
                                <tr>
                                    <td>{{ strtoUpper($item?->status) }}</td>
                                    <td>{{ strtoUpper($item?->description) }}</td>
                                    <td>{{ strtoUpper($item?->sms_msg) }}</td>
                                    <td>{{ strtoUpper($item?->email_msg) }}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="#" wire:click.prevent="edit({{$item?->status_id}})" data-bs-toggle="modal" data-bs-target="#issue-status-modal">
                                                <i class="icon-edit1 text-primary"></i>
                                            </a>
                                            <a  href="#"
                                            wire:click="delete({{$item?->status_id}})"
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
