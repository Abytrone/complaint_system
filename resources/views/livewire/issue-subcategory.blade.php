<div>
    <div>
        <div class="card">
            <div class="card-header">
                <h3>Issue Category Field</h3>
            </div>
            {{-- <x-headers.hr /> --}}
            <div class="card-body">
                <div class="my-3">
                    <button  href="#" id="addBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#issue-subcategory-modal">
                        <i class="icon-plus"></i> Add New
                    </button>
                    @include('setups.issue-subcategory.issue-subcategory-modal')
                </div>
                <div wire:ignore class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCategories as $item)
                                <tr>
                                    <td>{{ strtoUpper($item->category->category) }}</td>
                                    <td>{{ strtoUpper($item->description) }}</td>
                                    <td>{{ strtoUpper($item->active === 1 ? 'yes' : 'No') }}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="#" wire:click.prevent="edit({{$item->issue_subcategory_id}})" data-bs-toggle="modal" data-bs-target="#issue-subcategory-modal">
                                                <i class="icon-edit1 text-primary"></i>
                                            </a>
                                            <a  href="#"
                                            wire:click="delete({{$item->issue_subcategory_id}})"
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
