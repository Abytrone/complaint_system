<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Conflict Management System">
    <meta name="author" content="JSolutionsgh">
    <link rel="shortcut icon" href="{{asset('img/fav.png')}}"/>


    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">


</head>
<body class="authentication">

<div id="loading-wrapper">
    <div class="spinner-border"></div>
    Loading...
</div>

<div class="login-container">

    <div class="container-fluid h-100">

        <!-- Row start -->
        <div class="row g-0 h-100">

            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/modernizr.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
