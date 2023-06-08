@props([
    'canCreate' => true,
])
@php
    $name = $attributes->get('name');
    $id = $attributes->get('id');
    $label = $attributes->get('label');
@endphp
@if ($label)
<label for="{{$id}}" class="mb-0">{{$label}}</label>
@endif
<select multiple {{ $attributes->merge(['class' => 'selectize text-capitalize'])->merge() }}>
    {{$slot}}
</select>
@error($name)
<span class="text-danger">{{ $message }}</span>
@enderror

@pushOnce('selectizeCDN')

    {{-- Selectize start --}}
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
    integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
    integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    ></script>
    {{-- Selectize end --}}

    <script>
        $('.selectize').selectize({ sortField: 'text', maxItems:1, create: '{{$canCreate}}', })
    </script>
@endPushOnce
