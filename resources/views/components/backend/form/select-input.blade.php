@php
    $name = $attributes->get('name');
    $id = $attributes->get('id');
    $label = $attributes->get('label');
    $required = $attributes->get('required');
    $placeholder = $attributes->get('placeholder') ?? 'Select an option';
@endphp

<div class="mb-3">
    @if ($label)
        <label for="{{ $id }}" class="form-label mb-1">{{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    <select {{ $attributes->merge(['class' => 'form-select text-capitalize px-3 py-2'])->merge() }}>
        <option disabled selected value="">{{ $placeholder }}</option>
        {{ $slot }}
    </select>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

@push('customJs')
@endpush
