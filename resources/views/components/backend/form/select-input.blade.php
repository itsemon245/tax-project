@php
    $name = $attributes->get('name');
    $id = $attributes->get('id');
    $label = $attributes->get('label');
    $required = $attributes->get('required');
    $value = $attributes->has('value') ? $attributes->get('value') : null;
    $placeholder = $attributes->get('placeholder');
@endphp

@pushOnce('customCss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endPushOnce
<div class="mt-1">
    <label for="{{ $id }}" class="form-label">{{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
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