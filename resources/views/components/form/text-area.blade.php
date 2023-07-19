@php
    $label = $attributes->get('label');
    $required = $attributes->get('required');
    $name = $attributes->get('name');
    $class = $attributes->get('class');
    $matches = Illuminate\Support\Str::of($class)->matchAll('/\bh-\d+/')->toArray();
    $height = implode(' ', $matches);
    // $value = $attributes->has('value') ? $attributes->get('value') : old($name);
@endphp
<div class="mb-2 {{ $height }}">
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
