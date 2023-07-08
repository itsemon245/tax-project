@php
    $title = $attributes->get('title');
    $description = $attributes->get('description');
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description }}">

    <title>{{ config('app.name') . ' - ' . $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    {{-- App Css  --}}
    <link href="{{ asset('frontend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    {{-- bootstrap Css  --}}
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    {{-- icons css  --}}
    <link href="{{ asset('frontend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    @stack('customCss')
    {{-- Head JS  --}}
    <script src="{{ asset('frontend/assets/js/head.js') }}"></script>
    {{-- Color extractor for matching image color --}}
    <script src="{{ asset('frontend/extractColor.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('frontend/assets/jquery/jquery.min.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

    <style>
        /* Range Slider */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
        }

        .range-slider,
        .range-slider>.progress {
            height: 5px;
            border-radius: 5px;
            background-color: #ddd;
        }

        .range-slider {
            background-color: #ddd;
            position: relative;
        }

        .range-slider>.progress {
            background-color: var(--primary);
            position: absolute;
            left: 0%;
            right: 0%;
        }

        .range-slider-input>input {
            position: absolute;
            top: -5px;
            height: 5px;
            width: 100%;
            pointer-events: none;
            background: none;
            -webkit-appearance: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            height: 17px;
            width: 17px;
            border-radius: 50%;
            pointer-events: auto;
            -webkit-appearance: none;
            background: var(--primary);
        }

        input[type="range"]::-moz-slider-thumb {
            height: 17px;
            width: 17px;
            border-radius: 50%;
            pointer-events: auto;
            -moz-appearance: none;
            background: var(--primary);
        }
    </style>
</head>
