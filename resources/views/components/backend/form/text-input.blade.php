@php
    $label = $attributes->get('label');
    $required = $attributes->get('required');
    $name = $attributes->get('name');
    // $value = $attributes->has('value') ? $attributes->get('value') : old($name);
@endphp
<div class="mt-1">
    <label class="labels text-uppercase" style="font-size: 14px;">{{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <input {{ $attributes->class('form-control')->merge(['placeholder' => $label])->merge(['value' => old($name)]) }}>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
