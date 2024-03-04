<div>
    <form wire:submit.prevent="store">
        <div class="row">
            <div class="col-6">
                <div class="field-wrapper">
                    <input class="form-control @error('mode') is-invalid @enderror" type="text"
                           name="mode" wire:model="mode">
                    <div class="field-placeholder">Communcation Mode <span class="text-danger">*</span></div>
                    @error('mode')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-6 mt-2">
                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
