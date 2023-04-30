@php
    $name= $attributes->get('name');
    $button_class= $attributes->get('className');
@endphp

<div class="mt-3">
    <button
        class="btn {{ $button_class }} waves-effect waves-light profile-button">{{ $name }}</button>
</div>