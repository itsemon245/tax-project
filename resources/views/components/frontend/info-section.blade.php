@php
    $title = $attributes->get('title');
@endphp
<section class="mt-5 mb-2 px-5 py-2">
    <div>
        <h2 {{ $attributes->merge(['class' => 'text-uppercase text-center mb-5']) }}
            style="font-size: 28px; font-weight: 800;">{!! $title !!}</h2>
        <div class="d-flex align-items-center justify-content-center" style="flex-wrap: wrap;">
            {!! $slot !!}
        </div>
    </div>
    <div>

    </div>
</section>
