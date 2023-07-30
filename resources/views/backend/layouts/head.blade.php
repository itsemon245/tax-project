<head>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard | UBold - Responsive Admin Dashboard Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

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

        .dotted-border {
            border: 3px dotted var(--ct-gray-400);
            border-top: 0;
            border-right: 0;
            border-left: 0;
        }
    </style>
    @stack('customCss')
    <!-- Head js -->
    <script src="{{ asset('backend/assets/js/head.js') }}"></script>
</head>
