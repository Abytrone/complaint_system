<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Complaint System - Submit Complain</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="pub-lib/animate/animate.min.css" rel="stylesheet">
    <link href="pub-lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="pub-css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="pub-css/style.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    
    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                 <div class="header__brand">Complaint System</div>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    {{-- <div class="navbar-nav ms-auto">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <a href="about.html" class="nav-item nav-link">Tack Complaint</a>
                        <a href="product.html" class="nav-item nav-link">News</a>
                        <a href="store.html" class="nav-item nav-link">Contact Us</a>
                    </div> --}}
                    <div class="navbar-nav ms-auto">
                       <a class="nav-item nav-link fs-4 text-uppercase"> Use this form to submit your complaint.</a>
                       <a href="https://complaint-web.jsolutionsgh.com/" class="nav-item nav-link fs-4 text-uppercase text-success"><i class="fa fa-globe"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


  


    <!-- Contact Start -->
    <div class="container-xxl contact py-5 main_form_container">
        <div class="container form_container">
            <div class="row g-5">
                {{-- <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                   
                </div> --}}
                @livewire('submit-complaint')
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium" href="#">Complaint System</a>, All Right Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    {{-- <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
 --}}

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="pub-lib/wow/wow.min.js"></script>
    <script src="pub-lib/easing/easing.min.js"></script>
    <script src="pub-lib/waypoints/waypoints.min.js"></script>
    <script src="pub-lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="pub-js/main.js"></script>

    <script src="{{ asset('js/map.js') }}"></script>
<script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChd0TVcVJuB-5yaZDW4ODpj3GF6sbzC2I&callback=initAutocomplete&libraries=places&v=weekly&loading=async">
</script>
    @livewireScripts
</body>

</html>