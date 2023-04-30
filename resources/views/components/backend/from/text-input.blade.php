@php
    $label=$attributes->get('label');
    $required= $attributes->get('required');
    $name=$attributes->get('name');
@endphp
    <div class="mt-1">
        <label class="labels">{{$label}} 
        @if ($required)
        <span style="color:red;">*</span>
        @endif
    </label>
        <input {{ $attributes->merge(['class' => 'form-control'])->merge(['placeholder'=>$label]) }} >
        @error($name)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>