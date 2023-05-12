@php
    $name = $attributes->get('name');
@endphp
<div class="rounded bg-white py-2 px-4">
    <h4 class="my-2 text-center">{{ $name }}</h4>
    {{ $slot }}
</div>
