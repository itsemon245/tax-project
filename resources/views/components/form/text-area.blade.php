{{-- <div class="mb-3">
    <label for="example-textarea" class="form-label">Text area</label>
    <textarea class="form-control" id="example-textarea" rows="5"></textarea>
</div> --}}
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
    <textarea class="{{ 'form-control ' . $class }} @error($name)
        is-invalid
    @enderror"
        {{ $attributes->merge(['placeholder' => $label])->merge(['value' => old($name)])->merge(['rows' => 3]) }}>{{ $slot ? $slot : old($name) }}</textarea>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
