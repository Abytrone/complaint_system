@props(['name', 'text', 'required'=>true, 'disabled' => false, 'isShow' => false, 'hasBlankOption' => true, 'emptyText'=>'Please choose'])
@php
    $classes = $errors->get($name) ? 'form-select is-invalid': 'form-select';
@endphp
<div class="field-wrapper">
    <select id="{{ $name }}" {{ $disabled ? 'disabled' : '' }}
    name="{{ $name }}" {{$attributes->merge(['class'=> $classes])}}>
        @if($hasBlankOption)
            <option value="">{{$emptyText}}</option>
        @endif
        {{$slot}}
    </select>

    <label for="{{ $name }}" class="field-placeholder">{{$text }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
