<div>
    <form wire:submit.prevent="save" id="frmStatus">
        <div class="row">
            <div class="col-12">
                <div class="field-wrapper">
                    <input class="form-control @error('status') is-invalid @enderror" type="text"
                           name="status" wire:model="status">
                    <div class="field-placeholder">status <span class="text-danger">*</span></div>
                    @error('status')
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
                    <textarea wire:model="sms_msg" rows="4" name="sms_msg"
                              class="form-control @error('raw_report') is-invalid @enderror"></textarea>
                        <div class="field-placeholder">SMS Message <span class="text-danger">*</span></div>
                        @error('sms_msg')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="field-wrapper">
                    <textarea wire:model="email_msg" rows="4" name="email_msg"
                              class="form-control @error('raw_report') is-invalid @enderror"></textarea>
                        <div class="field-placeholder">Email Message <span class="text-danger">*</span></div>
                        @error('email_msg')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>
        </div>
    </form>
</div>
