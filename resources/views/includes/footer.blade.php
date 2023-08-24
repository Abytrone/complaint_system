<!-- Page wrapper end -->

<!-- *************
   ************ Required JavaScript Files *************
  ************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{ asset('js/jquery.min.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('js/modernizr.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('js/moment.js?version='.Str::random(5).'') }}"></script>

<!-- *************
   ************ Vendor Js Files *************
  ************* -->

<!-- Megamenu JS -->
<script src="{{ asset('vendor/megamenu/js/megamenu.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('vendor/megamenu/js/custom.js?version='.Str::random(5).'') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('vendor/slimscroll/slimscroll.min.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('vendor/slimscroll/custom-scrollbar.js?version='.Str::random(5).'') }}"></script>

<!-- Search Filter JS -->
<script src="{{ asset('vendor/search-filter/search-filter.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('vendor/search-filter/custom-search-filter.js?version='.Str::random(5).'') }}"></script>

<!-- Calendar JS -->
<script src="{{ asset('vendor/calendar/js/main.min.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('vendor/calendar/custom/daygrid-calendar.js?version='.Str::random(5).'') }}"></script>

<!-- Data Tables ?version='.Str::random(5).'' -->
<script src="{{ asset('vendor/datatables/dataTables.min.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap.min.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.responsive.min.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('vendor/datatables/responsive.bootstrap4.min.js?version='.Str::random(5).'') }}"></script>



<!-- Custom Data tables -->
<script src="{{ asset('vendor/datatables/custom/custom-datatables.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('vendor/datatables/custom/fixedHeader.js?version='.Str::random(5).'') }}"></script>

<!-- Apex Charts -->
<script src="{{ asset('vendor/apex/apexcharts.min.js?version='.Str::random(5).'')}}"></script>

<!-- Main Js Required -->
<script src="{{ asset('js/main.js?version='.Str::random(5).'') }}"></script>

<!--App JS Required -->
<script src="{{ asset('js/app.js?version='.Str::random(5).'') }}"></script>

<!--App JS Required -->
<script src="{{ asset('js/loading-data-tables.js?version='.Str::random(5).'') }}"></script>

<!--App JS Required -->
<script src="{{ asset('js/pieChart.js?version='.Str::random(5).'') }}"></script>

<!--App JS Required -->
<script src="{{ asset('js/user-roles.js?version='.Str::random(5).'') }}"></script>

<!-- Date Range JS -->
<script src="{{ asset('vendor/daterange/daterange.js?version='.Str::random(5).'')}}"></script>
<script src="{{ asset('vendor/daterange/custom-daterange.js?version='.Str::random(5).'')}}"></script>

<!-- Bootstrap Select JS -->
<script src="{{asset('vendor/bs-select/bs-select.min.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('vendor/bs-select/bs-select-custom.js?version='.Str::random(5).'') }}"></script>
<script src="{{ asset('js/activity-management.js?version='.Str::random(5).'') }}"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11?version='.Str::random(5).'"></script>

@yield('scripts')
