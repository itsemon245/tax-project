@php
    $label = $attributes->get('label');
    $name = $attributes->get('name');
    $class = $attributes->get('class');
    $id = $attributes->get('id');
    $checked = $attributes->get('checked');
@endphp
<div class="form-check form-switch">
    <input class="form-check-input {{ $class }}"
        {{ $attributes->merge(['type' => 'checkbox']) }} @if ($checked) checked @endif>
    <label class="form-check-label text-capitalize" for="{{ $id }}">{{ $label }}</label>
</div>
