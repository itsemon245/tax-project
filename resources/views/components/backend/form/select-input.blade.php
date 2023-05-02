@php
    $name = $attributes->get('name');
    $id = $attributes->get('id');
    $label = $attributes->get('label');
    $required = $attributes->get('required');
    $value = $attributes->has('value') ? $attributes->get('value') : null;
    $placeholder = $attributes->get('placeholder');
@endphp
<div class="mt-1">
    <label for="{{ $id }}" class="form-label">{{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <select {{ $attributes->merge(['class' => 'form-control'])->merge() }}>
        <option selected disabled>{{ $placeholder }}</option>
        {{ $slot }}
        </select>
        @error($name)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
