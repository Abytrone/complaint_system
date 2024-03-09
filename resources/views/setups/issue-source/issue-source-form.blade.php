<div>
    <form wire:submit.prevent="save" id="frmIssuesource">
        <div class="row">
            <div class="col-12">
                <div class="field-wrapper">
                    <input class="form-control @error('source') is-invalid @enderror" type="text"
                           name="source" wire:model="source">
                    <div class="field-placeholder">source <span class="text-danger">*</span></div>
                    @error('source')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </form>
</div>
