<div>
    <form wire:submit.prevent="save" id="frmCommMode">
        <div class="row">
            <div class="col-12">
                <div class="field-wrapper">
                    <input class="form-control @error('mode') is-invalid @enderror" type="text"
                           name="mode" wire:model="mode">
                    <div class="field-placeholder">Communcation Mode <span class="text-danger">*</span></div>
                    @error('mode')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </form>
</div>
