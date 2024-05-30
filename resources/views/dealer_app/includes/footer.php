<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <div class="align-items-center">
                    <div class="d-flex justify-content-center mt-2">
                        <div class="mx-2">
                            <a href="https://www.facebook.com/hamkobattery.official"><i
                                    class="fs-2 text-white bi bi-facebook"></i></a>
                        </div>
                        <div class="mx-2">
                            <!-- <a href="http://hamko.com.bd/"><i class="fs-2 text-white bi bi-globe2"></i></a> -->
                            <a href="http://hamkoservice.com/"><i class="fs-2 text-white bi bi-globe2"></i></a>
                        </div>
                        <div class="mx-2">
                            <a href="https://www.youtube.com/@hamkobatteryofficial"><i
                                    class="fs-2 text-white bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xs-12">
                <div class="foot-text">
                    <span class="">Copyright &copy; 2014-2022 <a href="http://www.hamko-ict.com/">HAMKO-ICT.</a> All
                        rights reserved.</span>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<script src="<?php echo asset('service-assets/js/bootstrap.bundle.js') ?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
let $type = "<?php echo session('notification_type'); ?>";
let $message = "<?php echo session('notification_message'); ?>";
if ($type != null) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "6000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    switch ($type) {
        case 'info':
            toastr.info($message);
            break;

        case 'warning':
            toastr.warning($message);
            break;

        case 'success':
            toastr.success($message);
            break;

        case 'danger': //error replaced by danger
            toastr.error($message);
            break;
    }
    //unset_session after displaying message
}
</script>

<?php
       //unset notification sessions
       session('notification_type','');
       session('notification_message','');
    ?>

</body>

</html>