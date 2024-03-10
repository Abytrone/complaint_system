<!-- Modal start -->
<div wire:ignore.self class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  id="issue-category-field-modal" tabindex="-1" aria-labelledby="issue-category-field-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="issue-category-field-modallLabel">{{$modalTitle}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         @include('setups.issue-category-field.issue-category-field-form')
        </div>
        <div class="modal-footer">
            <button type="button" wire:click.prevent="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit"  form="frmCategory" class="btn btn-primary">{{$modalAction}}</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal end -->