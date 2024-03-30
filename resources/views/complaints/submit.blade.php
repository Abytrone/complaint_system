<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Complaint Management System">
    <meta name="author" content="Jsolutions">
    <link rel="shortcut icon" href="img/fav.png">

    <!-- Title -->
    <title>Complaint System</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="fonts/style.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/web-main.css">


    <!-- *************
   ************ Vendor Css Files *************
  ************ -->

    <!-- Mega Menu -->
    <link rel="stylesheet" href="vendor/megamenu/css/megamenu.css">

    <!-- Search Filter JS -->
    <link rel="stylesheet" href="vendor/search-filter/search-filter.css">
    <link rel="stylesheet" href="vendor/search-filter/custom-search-filter.css">
    @livewireStyles

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>

    <!-- Page wrapper start -->
    <div class="page-wrapper">



        <!-- *************
    ************ Main container start *************
   ************* -->
        <div class="form_container">
            <h3 class="text-center">SUBMIT COMPLAINT WITH THIS FORM</h3>
            <hr>
            @livewire('submit-complaint')
        </div>
        <!-- *************
    ************ Main container end *************
   ************* -->

    </div>
    <!-- Page wrapper end -->

    <!-- *************
   ************ Required JavaScript Files *************
  ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/moment.js"></script>

    <!-- *************
   ************ Vendor Js Files *************
  ************* -->

    <!-- Megamenu JS -->
    <script src="vendor/megamenu/js/megamenu.js"></script>
    <script src="vendor/megamenu/js/custom.js"></script>

    <!-- Slimscroll JS -->
    <script src="vendor/slimscroll/slimscroll.min.js"></script>
    <script src="vendor/slimscroll/custom-scrollbar.js"></script>

    <!-- Search Filter JS -->
    <script src="vendor/search-filter/search-filter.js"></script>
    <script src="vendor/search-filter/custom-search-filter.js"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChd0TVcVJuB-5yaZDW4ODpj3GF6sbzC2I&callback=initAutocomplete&libraries=places&v=weekly&loading=async">
    </script>
    <!-- Main Js Required -->
    <script src="js/main.js"></script>
    @livewireScripts
    <script>
        window.addEventListener('swal:success', function (evt) {
        Swal.fire({
            title: "Complaint Submitted!",
            text: evt.detail.message,
            icon: "success",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, submit another!",
            cancelButtonText: "No, Leave!",
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            }
        }).then(function (result) {
            if (result.value) {
               location.reload()
            }else{
                window.location.href = "https://complaint-web.jsolutionsgh.com/";
            }
        })
    })
    </script>

</body>

</html>
