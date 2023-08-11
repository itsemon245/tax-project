@php
    $label = $attributes->get('label');
    $required = $attributes->get('required');
    $name = $attributes->get('name');
    $class = $attributes->get('class');
    $class = str($class)->contains('dotted-border') ? $class : 'form-control ' . $class;
    // $value = $attributes->has('value') ? $attributes->get('value') : old($name);
@endphp
<div class="mb-2 w-100">
    @if ($label)
        <label class="form-label mb-0" style="font-size: 14px;">{{ $label }}
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
