<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="img/fav.png" />


    <!-- Title -->
    <title>Complaint System</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- *************
   ************ Common Css Files *************
  ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/main.css">


    <!-- *************
   ************ Vendor Css Files *************
  ************ -->
    @livewireStyles
</head>

<body class="authentication" onload="Livewire.emit('openModal', 'submit-complaint-modal')">

    <!-- Loading wrapper start -->
    <div id="loading-wrapper">
        <div class="spinner-border"></div>
        Loading...
    </div>
    <!-- Loading wrapper end -->

    <!-- *************
   ************ Login container start *************
  ************* -->
    <div class="bg-green-500">
        <div class="form_container bg-slate-500">
            @livewire('submit-complaint')
        </div>
    </div>
    <!-- *************
   ************ Login container end *************
  ************* -->

    <!-- *************
   ************ Required JavaScript Files *************
  ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/moment.js"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChd0TVcVJuB-5yaZDW4ODpj3GF6sbzC2I&callback=initAutocomplete&libraries=places&v=weekly&loading=async"></script>

    @livewireScripts
    @livewire('livewire-ui-modal')

    <!-- *************
   ************ Vendor Js Files *************
  ************* -->

    <!-- Main Js Required -->
    <script src="js/main.js"></script>

</body>

</html>
