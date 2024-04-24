<head>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('libs/tail.select.js-1.0.2/css/tail.select.css') }}">
    <style>
        .tail-select {
            width: 100% !important;
            padding: 0.75rem !important;
        }
    </style>
    {{-- @vite(['resources/css/tailwind.css']) --}}
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ useImage(app('setting')->basic->favicon) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}">


    <!-- Bootstrap css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    @vite(['resources/js/app.js'])


    {{-- Plugins link  --}}
    <style>
        .mdi {
            font-size: 24px;
        }
    </style>
    @stack('customCss')
    <!-- Head js -->
    <script src="{{ asset('backend/assets/js/head.js') }}"></script>
</head>
