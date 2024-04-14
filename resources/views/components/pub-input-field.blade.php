@props(['name', 'text', 'required'=>true, 'disabled' => false, 'isShow' => false])
@php
    $classes = $errors->get($name) ? 'form-control is-invalid': 'form-control';
@endphp
<div class="">
    <label for="{{ $name }}" class="field-placeholder">{{$text }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <input id="{{ $name }}" {{ $disabled ? 'disabled' : '' }}
           name="{{ $name }}" {{$attributes->merge(['class'=> $classes])}} >
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
