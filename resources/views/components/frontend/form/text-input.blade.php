@php
    $name = $attributes->get('name');
    $label = $attributes->has('label') ? $attributes->get('label') : $name;
    $placeholder = $attributes->has('placeholder') ? $attributes->get('placeholder') : $name;
@endphp
<div class="form-outline mb-2">
    <label class="form-label text-capitalize" :for="$name">{{ $label }}</label>
    <input :value="old($name)"
        {{ $attributes->class('form-control')->merge([
            'type' => 'text',
            'name' => $name,
            'id' => $name,
            'placeholder' => $placeholder,
        ]) }} />
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
