@php
    $name = $attributes->get('name');
    $id = $attributes->has('id') ? $attributes->get('id') : 'imageFile';
    $image = $attributes->get('image');
    $class = $attributes->get('class');
    $style = $attributes->get('style');

    $note = $attributes->has('note') ? $attributes->get('note') : '<span class="text-danger" style="font-weight: 500;">*</span>Accepted files : <span class="text-success" style="font-weight: 500;">jpg, png, svg, webp up to 5 MB</span> ';
@endphp
<div class="">
    <label for="{{ $id }}">
        @if ($attributes->has('label'))
            <span class="form-label text-capitalize">{{ $attributes->get('label') }}</span>
        @endif
        <input id="{{ $id }}" name="{{ $name }}" type="file" hidden>
        <img class="w-100 border border-2 border-primary {{$class}}" style="{{$style}}" id="live-{{ $id }}"
            src="{{ $image ? useImage($image) : asset('images/Placeholder_view_vector.svg.png') }}">
    </label>
    <p class="mt-2" id="{{ $name . '_note' }}">
        {!! $note !!}
    </p>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

@push('customJs')
    {{-- Photo Preview for uploads --}}
    <script>
        $(document).ready(function() {  

            const input = $('#{{ $id }}')
            input.on('input', e => {
                const image = $('#live-'+e.target.id)
                const url = URL.createObjectURL(e.target.files[0])
                image.attr('src', url)
            })
        });
    </script>
    {{-- Photo Preview for uploads --}}
@endPush
