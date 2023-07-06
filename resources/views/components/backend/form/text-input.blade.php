@php
    $label = $attributes->get('label');
    $required = $attributes->get('required');
    $name = $attributes->get('name');
    $class = $attributes->get('class');
    // $value = $attributes->has('value') ? $attributes->get('value') : old($name);
@endphp
<div class="mb-2">
    @if ($label)
        <label class="form-label mb-0" style="font-size: 14px;">{{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    <input class="{{ 'form-control ' . $class }} @error($name)
        is-invalid
    @enderror"
        {{ $attributes->merge(['placeholder' => $label])->merge(['value' => old($name)]) }}>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
