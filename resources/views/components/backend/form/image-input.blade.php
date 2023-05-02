@php
    $name = $attributes->get('name');
    $image = $attributes->get('image');
    $note = $attributes->has('note') ? $attributes->get('note') : '<span class="text-danger" style="font-weight: 500;">*</span>Accepted files : <span class="text-success" style="font-weight: 500;">jpg, png, svg, webp up to 5 MB</span> ';
@endphp
<div class="">
    <label for="imagefile">
        <input id="imagefile" name="{{ $name }}" type="file" hidden>
        <img {{ $attributes->class('w-100 border border-2 border-primary') }} id="liveImage"
            src="{{ $image ? useImage($image) : asset('images/Placeholder_view_vector.svg.png') }}">
    </label>
    <p class="mt-2" id="{{ $name . '_note' }}">
        {!! $note !!}
    </p>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
