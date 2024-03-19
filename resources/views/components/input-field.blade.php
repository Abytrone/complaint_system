@props(['disabled' => false])
<div class="field-wrapper">
    <input @disabled($disabled) class="form-control @error('phone') is-invalid @enderror" type="text"
           name="phone" wire:model="phone">
    <div class="field-placeholder">Phone Number <span class="text-danger">*</span></div>
    @error('phone')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
