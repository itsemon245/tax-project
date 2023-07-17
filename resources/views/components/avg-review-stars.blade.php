@props([
    'avg' => 0,
])
@pushOnce('customCss')
    @php
        function style($rating, $avg)
        {
            $gt = $rating < $avg;
            $lt = $avg < $rating + 1;
            if ($gt & $lt) {
                $percnetage = (round($avg, 1) - $rating) * 100;
                $black = "black $percnetage%";
                $transparent = 'transparent ' . (100 - $percnetage) . '%';
                $mask = "
    -webkit-mask-image: linear-gradient(to right, $black , $transparent);
    mask-image: linear-gradient(to right, $black, $transparent);
    ";
                return $mask;
            }
        }
    @endphp
@endPushOnce
<span class="text-dark">{{ round($avg, 1) }}</span>
@php
    $color = null;
@endphp
@foreach (range(1, 4) as $rating)
    @php
        $color = $rating > $avg ? 'var(--bs-gray-400)' : 'var(--bs-yellow)';
        
    @endphp
    <span class="fas fa-star" style="color: {{ $color }};"></span>
@endforeach
<div class="d-inline-flex align-items-center position-relative ">
    <span class="fas fa-star" style="color: var(--bs-gray-400);position:absolute; top:0;left:0;" ></span>
    <span class="fas fa-star" style="z-index:2;color: {{ $color }};{{ style($rating, $avg) }}"></span>
</div>
