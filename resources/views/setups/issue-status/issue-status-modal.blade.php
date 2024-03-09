<!-- Modal start -->
<div wire:ignore.self class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  id="issue-status-modal" tabindex="-1" aria-labelledby="issue-status-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="issue-status-modalLabel">{{$modalTitle}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         @include('setups.issue-status.issue-status-form')
        </div>
        <div class="modal-footer">
            <button type="button" wire:click.prevent="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit"  form="frmStatus" class="btn btn-primary">{{$modalAction}}</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal end -->