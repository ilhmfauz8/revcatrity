<!-- Success Alert Modal -->
<div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-success">
            <div class="modal-body">
                <div class="text-center">
                    <i class="dripicons-checkmark h1 text-white"></i>
                    <h4 class="mt-2 text-white" id="alertSuccess"></h4>
                    <p class="mt-3 text-white" id="keteranganSuccess"></p>
                    <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Info Alert Modal -->
<div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2" id="alertInfo"></h4>
                    <p class="mt-3" id="keteranganInfo"></p>
                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Warning Alert Modal -->
<div id="warning-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <i class="dripicons-warning h1 text-warning"></i>
                    <h4 class="mt-2" id="alertWarning"></h4>
                    <p class="mt-3" id="keteranganWarning"></p>
                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Danger Alert Modal -->
<div id="danger-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-danger">
            <div class="modal-body">
                <div class="text-center">
                    <i class="dripicons-wrong h1 text-white"></i>
                    <h4 class="mt-2 text-white" id="alertDanger"></h4>
                    <p class="mt-3 text-white" id="keteranganDanger"></p>
                    <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Vendor -->
<script>
    function success(alert = null, keterangan = null){
        $('#alertSuccess').text(alert);
        $('#keteranganSuccess').text(keterangan);
        $('#success-alert-modal').modal('show');
    }
    function info(alert = null, keterangan = null){
        $('#alertInfo').text(alert);
        $('#keteranganInfo').text(keterangan);
        $('#info-alert-modal').modal('show');
    }
    function warning(alert = null, keterangan = null){
        $('#alertWarning').text(alert);
        $('#keteranganWarning').text(keterangan);
        $('#warning-alert-modal').modal('show');
    }
    function danger(alert = null, keterangan = null){
        $('#alertDanger').text(alert);
        $('#keteranganDanger').text(keterangan);
        $('#danger-alert-modal').modal('show');
    }
</script>
<script src="{{ asset('assets_backend/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/feather-icons/feather.min.js') }}"></script>

<!-- knob plugin -->
<script src="{{ asset('assets_backend/libs/jquery-knob/jquery.knob.min.js') }}"></script>

<!--Morris Chart-->
{{-- <script src="{{ asset('assets_backend/libs/morris.js06/morris.min.js') }}"></script> --}}
<script src="{{ asset('assets_backend/libs/raphael/raphael.min.js') }}"></script>

<!-- Dashboar init js-->
{{-- <script src="{{ asset('assets_backend/js/pages/dashboard.init.js') }}"></script> --}}

<!-- App js-->
<script src="{{ asset('assets_backend/js/app.min.js') }}"></script>

<!-- third party js -->
<script src="{{ asset('assets_backend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ asset('assets_backend/js/pages/datatables.init.js') }}"></script>

<!-- Input Mask -->
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Flactpick date-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


{{-- Highchart --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    function fileValidasi(id) {
        console.log(id);
        var fileInput = document.getElementById(id);
        var file = fileInput.files[0];
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!allowedExtensions.exec(filePath)) {
            info('Format File Tidak Sesuai !','Please upload file having extensions .jpg/.jpeg/.png only.');
            fileInput.value = '';
            return false;
        } else {
            if (file.size >= 10485760) { //10mb
                info('Size File Terlalu Besar !','File '+ file.name +'is'+ file.size +' bytes in size');
                fileInput.value = '';
                return false;
            }
        }
    }
</script>