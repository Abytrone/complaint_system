<div>
    <form wire:submit.prevent="save" id="frmIssueField">
        <div class="row">
            <div class="col-12">
                <div class="field-wrapper">
                    <input class="form-control @error('field_name') is-invalid @enderror" type="text"
                           name="field_name" wire:model="field_name">
                    <div class="field-placeholder">Issue Field <span class="text-danger">*</span></div>
                    @error('field_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </form>
</div>
