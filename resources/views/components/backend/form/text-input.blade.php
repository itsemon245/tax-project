@pushOnce('customCss')
    <style>
        .border-focus-2:focus {
            border-width: 2px!important;
        }
    </style>
@endPushOnce
@php
    $label = $attributes->get('label');
    $required = $attributes->get('required');
    $name = $attributes->get('name');
    $class = $attributes->get('class');
    $class = str($class)->contains('dotted-border') ? $class : 'form-control px-3 py-2 border-focus-2' . $class;
    // $value = $attributes->has('value') ? $attributes->get('value') : old($name);
@endphp

<div class="mb-3 w-100">
    @if ($label)
        <label class="form-label mb-1" style="font-size: 14px;">{{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    <input class="{{ $class }} @error($name)
        is-invalid
    @enderror"
        {{ $attributes->merge(['placeholder' => $label])->merge(['value' => old($name)]) }}>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
