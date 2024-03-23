<div>
    @if(!$showForm)
        <button wire:click="toggleForm" class="btn btn-primary tw-mb-3">Add new</button>
    @endif
    @if($showForm)
        <div class="row tw-mb-3">
            <form wire:submit.prevent="saveChanges">
                <div class="row">
                    <div class="col">
                        <x-textarea-field name="comment" text="Comment" wire:model="comment"></x-textarea-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col tw-flex tw-gap-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-danger" type="button"  wire:click="toggleForm">Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>

    @endif
    <div class="row tw-mt-5">
        <div class="table-responsive">
            <table class="table custom-table dataTable">
                <thead>
                <tr>
                    <th>Comment</th>
                    <th>Complaint Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->status->status}}</td>
                        <td>
                            <a wire:click="editComment({{$comment}})" href="#" data-bs-toggle="tooltip"
                               data-bs-placement="top" title="" data-bs-original-title="Edit">
                                <i class="icon-edit1 text-warning"></i>
                            </a>

                            <a wire:click="deleteComment({{$comment}})" href="#" data-bs-toggle="tooltip"
                               data-bs-placement="top" title="" data-bs-original-title="Delete">
                                <i class="icon-trash-2 text-danger"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>
