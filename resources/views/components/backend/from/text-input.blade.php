@php
    $label=$attributes->get('label');
    $required= $attributes->get('required');
    $name=$attributes->get('name');
    $value=$attributes->get('value')
@endphp
    <div class="mt-1">
        <label class="labels">{{$label}} 
        @if ($required)
        <span style="color:red;">*</span>
        @endif
    </label>
        <input {{ $attributes->merge(['class' => 'form-control'])->merge(['placeholder'=>$label]) }} value="{{ $value ? $value : '' }}">
        @error($name)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>