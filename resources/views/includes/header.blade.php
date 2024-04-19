<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Monitoring App">
    <meta name="author" content="Complaint Management System">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">

    <!-- Title -->
    <title>{{ $title ?? 'Complaint Management System' }}</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css?version=' . Str::random(5)) }}">

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{ asset('fonts/style.css?version=' . Str::random(5)) }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/main.css?version=' . Str::random(5)) }}">


    <!-- *************
        ************ Vendor Css Files *************
    ************ -->

    <!-- Mega Menu -->
    <link rel="stylesheet" href="{{ asset('vendor/megamenu/css/megamenu.css') }}">

    <!-- Search Filter JS -->
    <link rel="stylesheet" href="{{ asset('vendor/search-filter/search-filter.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/search-filter/custom-search-filter.css') }}">

    <!-- Calendar CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/calendar/css/main.min.css?version=' . Str::random(5)) }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/calendar/css/custom.css?version=' . Str::random(5)) }}"/>

    <!-- Date Range CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/daterange/daterange.css') }}">

    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bs-select/bs-select.css') }}"/>

    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bs4.css?version=' . Str::random(5)) }}"/>
    <link rel="stylesheet"
          href="{{ asset('vendor/datatables/dataTables.bs4-custom.css?version=' . Str::random(5)) }}"/>

    @livewireStyles

    <script src="{{asset('js/photoswipe.umd.min.js')}}"></script>
    <script src="{{asset('js/photoswipe-lightbox.umd.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/photoswipe.css')}}">
</head>
