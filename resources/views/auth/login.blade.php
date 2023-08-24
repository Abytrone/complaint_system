<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="UniPro App">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="img/fav.png" />

    <!-- Title -->
    <title>Complaint Management System</title>


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

</head>

<body class="authentication">

    <!-- Loading wrapper start -->
    <div id="loading-wrapper">
        <div class="spinner-border"></div>
        Loading...
    </div>
    <!-- Loading wrapper end -->

    <!-- *************
    ************ Login container start *************
************* -->
    <div class="login-container">

        <div class="container-fluid h-100">

            <!-- Row start -->
            <div class="row g-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="login-about">
                        <div class="slogan">
                            <span>Complaint</span>
                            <span>Management</span>
                            <span>System.</span>
                            <hr>
                            <span>CECOTAPS</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="login-wrapper">
                        <form action="{{ route('dashboard') }}">
                            {{-- <form action=""> --}}
                            <div class="login-screen">
                                <div class="login-body">
                                    <a href="crm.html" class="login-logo">
                                        <img src="{{ asset('img/cecotap_logo.png') }}" alt="iChat">
                                    </a>
                                    <h6>Welcome back,<br>Please login to your account.</h6>
                                    <div class="field-wrapper">
                                        <input type="email" autofocus>
                                        <div class="field-placeholder">Email ID</div>
                                    </div>
                                    <div class="field-wrapper mb-3">
                                        <input type="password">
                                        <div class="field-placeholder">Password</div>
                                    </div>
                                    <div class="actions">
                                        <a href="forgot-password.html">Forgot password?</a>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Row end -->


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

    <!-- *************
    ************ Vendor Js Files *************
************* -->

    <!-- Main Js Required -->
    <script src="js/main.js"></script>

</body>

</html>
