@php
    $name = $attributes->get('name');
    $id = $attributes->get('id');
    $label = $attributes->get('label');
    $required = $attributes->get('required');
    $placeholder = $attributes->get('placeholder');
@endphp

<div class="">
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    <select {{ $attributes->merge(['class' => 'form-select text-capitalize'])->merge() }}>
        <option selected disabled>{{ $placeholder }}</option>
        {{ $slot }}
    </select>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

@push('customJs')
@endpush
