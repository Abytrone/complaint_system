<!-- Page wrapper end -->

<!-- *************
   ************ Required JavaScript Files *************
  ************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{ asset('js/jquery.min.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('js/modernizr.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('js/moment.js?version=' . Str::random(5) . '') }}"></script>

<!-- *************
   ************ Vendor Js Files *************
  ************* -->

<!-- Pie Graphs -->
<script src="{{ asset('vendor/apex/examples/pie/basic-pie-graph.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/apex/examples/pie/basic-pie-graph-gradient.js?version=' . Str::random(5) . '') }}">
</script>
<script src="{{ asset('vendor/apex/examples/pie/basic-pie-graph-monochrome.js?version=' . Str::random(5) . '') }}">
</script>
<script
    src="{{ asset('vendor/apex/examples/pie/basic-pie-graph-monochrome-gradient.js?version=' . Str::random(5) . '') }}">
</script>

<!-- Megamenu JS -->
<script src="{{ asset('vendor/megamenu/js/megamenu.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/megamenu/js/custom.js?version=' . Str::random(5) . '') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('vendor/slimscroll/slimscroll.min.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/slimscroll/custom-scrollbar.js?version=' . Str::random(5) . '') }}"></script>

<!-- Search Filter JS -->
<script src="{{ asset('vendor/search-filter/search-filter.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/search-filter/custom-search-filter.js?version=' . Str::random(5) . '') }}"></script>

<!-- Calendar JS -->
<script src="{{ asset('vendor/calendar/js/main.min.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/calendar/custom/daygrid-calendar.js?version=' . Str::random(5) . '') }}"></script>

<!-- Data Tables ?version='.Str::random(5).'' -->
<script src="{{ asset('vendor/datatables/dataTables.min.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap.min.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.responsive.min.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/datatables/responsive.bootstrap4.min.js?version=' . Str::random(5) . '') }}"></script>


<!-- Custom Data tables -->
<script src="{{ asset('vendor/datatables/custom/custom-datatables.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/datatables/custom/fixedHeader.js?version=' . Str::random(5) . '') }}"></script>

<!-- Apex Charts -->
<script src="{{ asset('vendor/apex/apexcharts.min.js?version=' . Str::random(5) . '') }}"></script>

<!-- Main Js Required -->
<script src="{{ asset('js/main.js?version=' . Str::random(5) . '') }}"></script>

<!--App JS Required -->
<script src="{{ asset('js/app.js?version=' . Str::random(5) . '') }}"></script>

<!--App JS Required -->
<script src="{{ asset('js/loading-data-tables.js?version=' . Str::random(5) . '') }}"></script>

<!--App JS Required -->
<script src="{{ asset('js/pieChart.js?version=' . Str::random(5) . '') }}"></script>

<!--App JS Required -->
<script src="{{ asset('js/user-roles.js?version=' . Str::random(5) . '') }}"></script>

<!-- Date Range JS -->
<script src="{{ asset('vendor/daterange/daterange.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/daterange/custom-daterange.js?version=' . Str::random(5) . '') }}"></script>

<!-- Bootstrap Select JS -->
<script src="{{ asset('vendor/bs-select/bs-select.min.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('vendor/bs-select/bs-select-custom.js?version=' . Str::random(5) . '') }}"></script>
<script src="{{ asset('js/activity-management.js?version=' . Str::random(5) . '') }}"></script>
@livewireScripts
<script src="{{ asset('js/map.js') }}"></script>
<script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChd0TVcVJuB-5yaZDW4ODpj3GF6sbzC2I&callback=initAutocomplete&libraries=places&v=weekly">
</script>

@yield('scripts')

<script>
    window.addEventListener('swal:success', function(evt){
Swal.fire({
            title: "Success!",
            text: evt.detail.message,
            icon: "success"
        });
    })

    window.addEventListener('reloadPage', function(){
        location.reload();
    })

    window.addEventListener('swal:confirm', function(evt){
Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, delete!",
            customClass: {
            confirmButton: "btn btn-success",
            cancelButton:"btn btn-danger" 
            }
}).then(function(result){
    if (result.value) {
                Livewire.emit('deleteRecord');
            }
})
    })

    window.addEventListener('swal:delete', function(evt){
Swal.fire({
            title: "Record Deleted!",
            text: evt.detail.message,
            icon: "success"
        }).then(function(result){
            location.reload();
        })
    })
</script>
