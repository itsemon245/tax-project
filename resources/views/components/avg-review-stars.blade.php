@props([
    'avg' => 0,
])
@php
    $class = $attributes->has('class') ? $attributes->get('class') : '';
    
@endphp
<div>
    <span class="text-dark {{ $class }}">{{ round($avg, 1) }}</span>
    @php
        $color = null;
    @endphp
    @foreach (range(1, 4) as $rating)
        @php
            $color = $rating > $avg ? 'var(--bs-gray-400)' : 'var(--bs-yellow)';
            
        @endphp
        <span class="fas fa-star" style="color: {{ $color }};"></span>
    @endforeach
    <div class="d-inline-flex justify-content-center align-items-center position-relative ">
        <span class="fas fa-star" style="color: var(--bs-gray-400);position:absolute; top:0;left:0;"></span>
        <span class="fas fa-star" style="z-index:2;color: {{ $color }};{{ starStyle($rating, $avg) }}"></span>
    </div>

</div>
