<!-- Sidebar wrapper start -->
<nav class="sidebar-wrapper">

    <!-- Sidebar content start -->
    <div class="sidebar-tabs">

        <!-- Tabs nav start -->
        <div class="nav" role="tablist" aria-orientation="vertical">
            <a href="#" class="logo">
                <img src="{{ asset('img/tama-foundation-logo.jpg') }}" alt="Tama-Foundation">
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
            <a class="nav-link {{ Request::is('reports*') ? 'active' : '' }}" id="reports-tab" data-bs-toggle="tab"
               href="#tab-reports" role="tab" aria-controls="tab-product" aria-selected="false">
                <i class="icon-documents"></i>
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
            <div
                class="tab-pane fade {{ Request::is('complaints*') || Request::is('awaiting-complaints*') ? 'show active' : '' }}"
                id="tab-main-menu" role="tabpanel" aria-labelledby="tab-main-menu">

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
                                <a href="{{ route('complaints.create') }}"
                                   class="{{ Request::is('complaints/create*') ? 'current-page' : '' }}">Capture
                                    Complaints</a>
                            </li>
                            <li>
                                <a href="{{ route('complaints.index') }}"
                                   class="{{ Request::is('complaints') ? 'current-page' : '' }}">
                                    Complaints</a>
                            </li>
                            <li>
                                <a href="{{ route('awaiting_complaints') }}"
                                   class="{{ Request::is('awaiting-complaints/awaiting_complaints*') ? 'current-page' : '' }}">Awaiting
                                    Resolution</a>
                            </li>
                            <li>
                                <a href="#">Response Overdue</a>
                            </li>
                            <li>
                                <a href="#">Awaiting Closure</a>
                            </li>
                            <li>
                                <a href="#">Reopen Complaints</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar menu ends -->
            </div>

            <div class="tab-pane fade {{ Request::is('reports*') ? 'show active' : '' }}"
                 id="tab-reports" role="tabpanel" aria-labelledby="tab-reports">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Report Summaries
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li class="list-heading">Summaries</li>

                            <li>
                                <a href="{{ route('complaints.create') }}"
                                   class="{{ Request::is('complaints/create*') ? 'current-page' : '' }}">Statistics</a>
                            </li>
                            <li>
                                <a href="{{ route('complaints.index') }}"
                                   class="{{ Request::is('complaints') ? 'current-page' : '' }}">Reports Print</a>
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
                            <li class="list-heading">Setup</li>
                            <li>
                                <a href="{{route('communication-mode.index')}}"
                                    class="{{ Request::is('setups/communication-mode') ? 'current-page' : '' }}">Communication Mode</a>
                            </li>

                            <li>
                                <a href="{{route('issue-category.index')}}"
                                    class="{{ Request::is('setups/issue-category') ? 'current-page' : '' }}">Issue Category</a>
                            </li>
                            <li>
                                <a href="{{route('issue-field.index')}}"
                                    class="{{ Request::is('setups/issue-field') ? 'current-page' : '' }}">Issue Field</a>
                            </li>
                            <li>
                                <a href="{{route('issue-category-field.index')}}"
                                    class="{{ Request::is('setups/issue-category-field') ? 'current-page' : '' }}">Issue Category Field</a>
                            </li>
                            <li>
                                <a href="{{route('issue-subcategory.index')}}"
                                    class="{{ Request::is('setups/issue-subcategory') ? 'current-page' : '' }}">Issue Subcategory</a>
                            </li>
                            <li>
                                <a href="{{route('issue-source.index')}}"
                                    class="{{ Request::is('setups/issue-source') ? 'current-page' : '' }}">Issue Source</a>
                            </li>
                            <li>
                                <a href="{{route('issue-status.index')}}"
                                    class="{{ Request::is('setups/issue-status') ? 'current-page' : '' }}">Issue Status</a>
                            </li> 
                            <li>
                                <a href="{{route('support-groups.index')}}"
                                    class="{{ Request::is('setups/support-group') ? 'current-page' : '' }}">Support Group</a>
                            </li>
                        </ul>

                        <ul>
                            <li class="list-heading">Configurations</li>
                            <li>
                                <a href="#" class="{{ Request::is('setups/users*') ? 'current-page' : '' }}">User
                                    Manager</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="{{ Request::is('setups/user-roles*') ? 'current-page' : '' }}">User Support
                                    Groups</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="{{ Request::is('setups/user-roles*') ? 'current-page' : '' }}">Support Groups
                                    Mapping</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="{{ Request::is('setups/user-roles*') ? 'current-page' : '' }}">Manage
                                    Messages</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="{{ Request::is('setups/user-roles*') ? 'current-page' : '' }}">Global
                                    Configuration</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="{{ Request::is('setups/user-roles*') ? 'current-page' : '' }}">Roles
                                    Access</a>
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
