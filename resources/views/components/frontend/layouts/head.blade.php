@php
    $title = $attributes->get('title');
    $description = $attributes->get('description');
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description }}">
    <link rel="shortcut icon" href="{{$favicon}}" type="image/x-icon">

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
</head>
