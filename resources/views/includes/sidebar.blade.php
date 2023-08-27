<!-- Sidebar wrapper start -->
<nav class="sidebar-wrapper">

    <!-- Sidebar content start -->
    <div class="sidebar-tabs">

        <!-- Tabs nav start -->
        <div class="nav" role="tablist" aria-orientation="vertical">
            <a href="#" class="logo">
                <img src="{{ asset('img/cecotap_logo.png') }}" alt="CECOTAP">
            </a>
            {{--            request()->routeIs('dashboard') --}}
            <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab"
                href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">
                <i class="icon-home2"></i>
            </a>
            <a class="nav-link {{ Request::is('complaints*') ? 'active' : '' }}" id="main-menu-tab" data-bs-toggle="tab"
                href="#tab-main-menu" role="tab" aria-controls="tab-product" aria-selected="false">
                <i class="icon-layers2"></i>
            </a>
            <a class="nav-link {{ Request::is('setups*') ? 'active' : '' }}" id="system-settings-tab"
                data-bs-toggle="tab" href="#tab-system-settings" role="tab" aria-controls="tab-system-settings"
                aria-selected="false">
                <i class="icon-settings"></i>
            </a>

        </div>
        <!-- Tabs nav end -->

        <!-- Tabs content start -->
        <div class="tab-content">

            <!-- Chat tab -->
            <div class="tab-pane fade {{ Request::is('dashboard*') ? 'show active' : '' }}" id="tab-home"
                role="tabpanel" aria-labelledby="home-tab">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Dashboards
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('dashboard') }}"
                                    class="{{ Request::is('dashboard') ? 'current-page' : '' }}">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar menu ends -->
            </div>

            <!-- Pages tab -->
            <div class="tab-pane fade {{ Request::is('complaints*') ? 'show active' : '' }}" id="tab-main-menu"
                role="tabpanel" aria-labelledby="tab-main-menu">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Main Menu
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li class="list-heading">Complaints</li>

                            <li>
                                <a href="{{ route('complaints.index') }}"
                                    class="{{ Request::is('complaints*') ? 'current-page' : '' }}">Complaints</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="{{ Request::is('conflicts/events*') ? 'current-page' : '' }}">Events</a>
                            </li>
                            <li>
                                <a href="#">Events-Community</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar menu ends -->
            </div>

            <!-- Authentication tab -->
            <div class="tab-pane fade {{ Request::is('setups*') ? 'show active' : '' }}" id="tab-system-settings"
                role="tabpanel" aria-labelledby="system-settings-tab">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    System Setups
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li class="list-heading">Conflicts</li>
                            <li>
                                <a href="#"
                                    class="{{ Request::is('setups/actors*') ? 'current-page' : '' }}">Actors</a>
                            </li>

                            <li>
                                <a href="#"
                                    class="{{ Request::is('setups/communities*') ? 'current-page' : '' }}">Communities</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="{{ Request::is('setups/event-types*') ? 'current-page' : '' }}">Event
                                    Types</a>
                            </li>
                            <li>
                                <a href=""
                                    class="{{ Request::is('setups/violence-types*') ? 'current-page' : '' }}">Violence
                                    Types</a>
                            </li>
                        </ul>

                        <ul>
                            <li class="list-heading">Users</li>
                            <li>
                                <a href="#" class="{{ Request::is('setups/users*') ? 'current-page' : '' }}">Add
                                    Users</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="{{ Request::is('setups/user-roles*') ? 'current-page' : '' }}">User
                                    Roles</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- Sidebar menu ends -->
            </div>
        </div>
        <!-- Tabs content end -->
    </div>
    <!-- Sidebar content end -->
</nav>
<!-- Sidebar wrapper end -->
