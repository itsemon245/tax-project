@php
    $name = $attributes->get('name');
@endphp
<div class="rounded bg-white py-2 px-md-4 px-2">
    @if ($name)
        <h4 class="my-2 text-center d-print-none">{{ $name }}</h4>
    @endif
    {{ $slot }}
</div>
