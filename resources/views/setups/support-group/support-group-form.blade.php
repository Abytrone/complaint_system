<div>
    <form wire:submit.prevent="save" id="frmSupportGroup">
        <div class="row">
            <div class="col-12">
                <div class="field-wrapper">
                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                           name="name" wire:model="name">
                    <div class="field-placeholder">Name <span class="text-danger">*</span></div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="field-wrapper">
                    <textarea wire:model="description" rows="4" name="description"
                              class="form-control @error('raw_report') is-invalid @enderror"></textarea>
                        <div class="field-placeholder">Description <span class="text-danger">*</span></div>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="field-wrapper">
                    <input class="form-control @error('contact_name') is-invalid @enderror" type="text"
                           name="contact_name" wire:model="contact_name">
                    <div class="field-placeholder">Contact Name <span class="text-danger">*</span></div>
                    @error('contact_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="field-wrapper">
                    <input class="form-control @error('phone') is-invalid @enderror" type="text"
                           name="phone" wire:model="phone">
                    <div class="field-placeholder">Phone <span class="text-danger">*</span></div>
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="field-wrapper">
                    <input class="form-control @error('duration') is-invalid @enderror" type="text"
                           name="duration" wire:model="duration">
                    <div class="field-placeholder">Duration <span class="text-danger">*</span></div>
                    @error('duration')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="field-wrapper">
                    <select wire:model="active" name="active"
                            class="form-select @error('active') is-invalid @enderror">
                        <option>Select</option>
                            <option selected value="1">Yes</option>
                            <option  value="0">No</option>
                    </select>
                    <div class="field-placeholder">Set Active</div>
                    @error('active')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </form>
</div>
