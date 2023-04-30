@php
    $name = $attributes->get('name');
@endphp
<div class="container rounded bg-white py-3 px-4">
    <h4 class="my-3 text-center">{{ $name }}</h4>
    {{ $slot }}
</div>
