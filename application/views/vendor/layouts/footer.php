<div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light footer-shadow">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; <?= date('Y') ?><a class="ml-25" href="<?= base_url('/'); ?>" target="_blank">Pengadaan PPKS</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url('/app-assets/vendors/js/vendors.min.js') ?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/extensions/wNumb.min.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/extensions/nouislider.min.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/forms/wizard/bs-stepper.min.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/extensions/toastr.min.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') ?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('/app-assets/js/core/app-menu.js') ?>"></script>
    <script src="<?= base_url('/app-assets/js/core/app.js') ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('app-assets/vendors/js/extensions/dropzone.min.js') ?>"></script>
    <script src="<?= base_url('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') ?>"></script>
    <script src="<?= base_url('/app-assets/js/scripts/forms/form-select2.js') ?>"></script>
    <!-- END: Page JS-->

    <script src="<?= base_url('/assets/js/select_area.js') ?>"></script>

      <!-- BEGIN: Datatable  JS-->
    <!-- <script src="<s?= base_url('/app-assets/js/scripts/tables/table-datatables-advanced.js') ?>"></script> -->
    <script src="<?= base_url('/assets/js/datatable_script.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/scripts/pages/page-account-settings.js') ?>"></script>
    <!-- END: Datatable JS-->


    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <!-- <div id="toast-container" class="toast-container toast-top-right">
        <div class="toast toast-success rtl" aria-live="polite" style="">
            <div class="toast-title" style="float: left; margin-left: 30px;">Produk ditambahkan ke keranjang</div>
            <button type="button" class="toast-close-button" style="float:right;" role="button">×</button>
        </div>
    </div> -->
    <!-- <div id="toast-container" class="toast-container toast-top-right"><div class="toast toast-success rtl" aria-live="polite" style=""><button type="button" class="toast-close-button" role="button">×</button><div class="toast-title">Added Item In Your Cart 🛒</div></div></div> -->
</body>
<!-- END: Body-->

</html>