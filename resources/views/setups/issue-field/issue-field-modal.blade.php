<!-- Modal start -->
<div wire:ignore.self class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  id="issue-field-modal" tabindex="-1" aria-labelledby="issue-field-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="issue-field-modalLabel">{{$modalTitle}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         @include('setups.issue-field.issue-field-form')
        </div>
        <div class="modal-footer">
            <button type="button" wire:click.prevent="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit"  form="frmIssueField" class="btn btn-primary">{{$modalAction}}</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal end -->