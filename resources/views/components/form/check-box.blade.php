@php
    $label = $attributes->get('label');
    $name = $attributes->get('name');
    $class = $attributes->get('class');
@endphp
<div class="form-check form-switch">
    <input class="form-check-input {{ $class }}" id="{{ $name }}"
        {{ $attributes->merge(['type' => 'checkbox']) }}>
    <label class="form-check-label text-capitalize" for="{{ $name }}">{{ $label }}</label>
</div>
