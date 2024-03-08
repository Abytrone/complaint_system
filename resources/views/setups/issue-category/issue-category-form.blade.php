<div>
    <form wire:submit.prevent="save" id="frmCategory">
        <div class="row">
            <div class="col-6">
                <div class="field-wrapper">
                    <input class="form-control @error('category') is-invalid @enderror" type="text"
                           name="category" wire:model="category">
                    <div class="field-placeholder">Category <span class="text-danger">*</span></div>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="field-wrapper">
                    <select wire:model="active" name="active"
                            class="form-select @error('active') is-invalid @enderror">
                        <option>Select</option>
                            <option selected value="0">No</option>
                            <option  value="1">Yes</option>
                    </select>
                    <div class="field-placeholder">Set Active</div>
                    @error('active')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="field-wrapper">
                    <textarea wire:model="description" rows="6" name="description"
                              class="form-control @error('raw_report') is-invalid @enderror"></textarea>
                        <div class="field-placeholder">Description <span class="text-danger">*</span></div>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>
        </div>
    </form>
</div>
