<div>
    @if(!$showForm)
        <button wire:click="toggleForm" class="btn btn-primary tw-mb-3">Add new</button>
    @endif
    @if($showForm)
        <div class="row tw-mb-3">
            <form wire:submit.prevent="saveChanges">
                <div class="row">
                    <div class="col">
                        <x-textarea-field rows="5" name="comment" text="Comment"
                                          wire:model="comment"></x-textarea-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-input-field text="Attachment" name="attachment" wire:model="attachment" type="file"
                                       id="upload-{{$fileResetCounter}}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col tw-flex tw-gap-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-danger" type="button" wire:click="toggleForm">Cancel
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
                    <th>Attachment</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($comments ??[] as $comment)
                    <tr>
                        <td> <img alt="pic" style='width:60px;height:60px' src="{{$comment->attachment_fmt}}"/></td>
                        <td>{{$comment->creator->fullname}}</td>

                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->status->status}}</td>
                        <td>{{$comment->created_at_fmt}}</td>
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
                @empty
                    <tr>
                        <td></td>
                        <td> No comments yet</td>
                        <td></td>
                    </tr>
                @endforelse

                </tbody>

            </table>
        </div>
    </div>

</div>
