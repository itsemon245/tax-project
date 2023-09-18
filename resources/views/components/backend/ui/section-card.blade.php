@php
    $name = $attributes->get('name');
@endphp
<div class="card m-2 ">
    @if ($name)
        <h4 class="my-2 text-center d-print-none card-header bg-white">{{ $name }}</h4>
    @endif
    <div class="card-body p-0 p-sm-2">
        {{ $slot }}
    </div>
</div>
