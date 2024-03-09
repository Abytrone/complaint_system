<!doctype html>
<html lang="en">
@include('includes.header')

<body>

    <!-- Loading wrapper start -->
    <div id="loading-wrapper">
        <div class="spinner-border"></div>
        Please Wait...
    </div>
    <!-- Loading wrapper end -->

    <!-- Page wrapper start -->
    <div class="page-wrapper">

        @include('includes.sidebar')

        <!-- ************************* Main container start ************************** -->
        <div class="main-container">

            <!-- Page header starts -->
            <div class="page-header">

                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">

                        <div class="search-container">
                            <!-- Toggle sidebar start -->
                            <div class="toggle-sidebar" id="toggle-sidebar">
                                <i class="icon-menu"></i>
                            </div>
                            <!-- Toggle sidebar end -->
                            <div class="ui fluid category search">
                                <div class="page-title-custom">
                                    {{-- ALHAJI FAROUK'S INITIATIVE --}}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

                        <!-- Header actions start -->
                        <ul class="header-actions">
                            <li class="dropdown">

                            </li>
                            <li class="dropdown">
                            </li>
                            <li class="dropdown">
                                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
                                    aria-haspopup="true">
                                    <span class="avatar">
                                        <img src="{{ asset('img/user.svg') }}" alt="User Avatar">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <a href="#"><i class="icon-user1"></i>Profile</a>
                                        <a href="#"><i class="icon-log-out1"></i>Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- Header actions end -->

                    </div>
                </div>
                <!-- Row end -->

            </div>
            <!-- Page header ends -->

            <!-- Content wrapper scroll start -->
            <div class="content-wrapper-scroll">

                <!-- Content wrapper start -->
                <div class="content-wrapper">

                    @yield('app-content')

                </div>
                <!-- Content wrapper end -->

                <!-- App Footer start -->
                <div class="app-footer">{{ 'Jsolutions@' . Illuminate\Support\Carbon::today()->year }}</div>
                <!-- App footer end -->

            </div>
            <!-- Content wrapper scroll end -->

        </div>
        <!-- *************
************ Main container end *************
************* -->

    </div>
    @include('includes.footer')
</body>

</html>
