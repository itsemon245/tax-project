@php
    $name = $attributes->get('name');
    $class = $attributes->get('class');
@endphp
@pushOnce('customCss')
    <style>
        @media print {
            .card {
                padding: 0 !important;
                margin: 0 !important;
            }

            .card-body {
                padding: 0 !important;
                margin: 0 !important;
            }
        }
    </style>
@endPushOnce
<div {{ $attributes->merge(['class' => 'card m-0 p-2']) }}>
    @if ($name)
        <h4 class="my-2 text-center d-print-none card-header bg-white">{!! $name !!}</h4>
    @endif
    <div class="card-body p-0 p-sm-3">
        {{ $slot }}
    </div>
</div>
