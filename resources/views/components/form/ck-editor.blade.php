@php
    $id = $attributes->get('id');
    $label = $attributes->has('label') ? $attributes->get('label') : $attributes->get('name');
@endphp
@pushOnce('customCss')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
@endPushOnce
<label for="{{$id}}" class="form-label text-capitalize">{{$label}}</label>
<textarea {{$attributes->merge()}}>
    {{$slot}}
</textarea>

@pushOnce('customJs')
    <script>
        ClassicEditor
            .create( document.querySelector('#{{$id}}'))
    </script>
@endPushOnce

