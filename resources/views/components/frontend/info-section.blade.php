@php
    $title = $attributes->get('title');
@endphp
<section class="mt-5 mb-2 px-5 py-2">
    <h2 {{ $attributes->merge(['class' => 'text-uppercase text-center mb-5']) }}
        style="font-size: 28px; font-weight: 800;">{!! $title !!}</h2>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 items-center justify-center">
        {!! $slot !!}
    </div>
</section>
