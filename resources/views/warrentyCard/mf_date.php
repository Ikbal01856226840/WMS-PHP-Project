<div class="pcoded-main-container">
    <div class="pcoded-content  ">
        <div class="pcoded-inner-content  ">
            <br>
            <!-- Main-body start -->
            <div class="main-body ">
                <div class="page-wrapper m-t-0 m-l-2 m-r-2 p-12">
                    <!-- Page-header start -->
                    <div class="page-header m-0 p-0">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline ">
                                        <h4 class="text-center mx-auto my-3">Manufactur Date</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <!-- Page body start -->
                    <div class="page-body">
                        <!-- Basic Form Inputs card start -->
                        <!-- <form action="" method="POST"> -->
                        <div class="card">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="card-block ">
                                        <h6 class="m-t-0">Manufactur Date</h6>
                                        <hr>
                                        <div class="form-group my-2 my-2 my-1  row">
                                            <label class="col-md-3 col-form-label">Product Batch Number</label>
                                            <div class="col-md-8">
                                                <span id="user_name_span" class="" style="font-size: small;"></span>
                                                <input type="text" name="ProductSerial" class="form-control ProductSerial ProductSerial_id barcode" placeholder="" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group my-2 my-2 my-1  row ">
                                            <label class="col-md-3 col-form-label">Stock Group/Brand Name</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control " id="stock_group" required readonly>
                                                <input type="hidden" name="stock_group_id" class="form-control  stock_group_id" id="stock_group_id">

                                            </div>
                                        </div>
                                        <div class="form-group my-2 my-2 my-1  row ">
                                            <label class="col-md-3 col-form-label">Battery Type</label>
                                            <div class="col-md-8">
                                                <input type="text" name="name" class="form-control name pName" id="pName" placeholder="Type for Suggestion" required readonly>
                                                <input type="hidden" name="product_id" class="form-control name product_id" id="product_id" placeholder="Type for Suggestion" required>
                                            </div>
                                        </div>
                                        <div class="form-group my-2 my-2 my-1 row">
                                            <label class="col-md-3 col-form-label">Manufacture Date </label>
                                            <div class="col-md-8">
                                                <input type="text" name="ManufactureDate" class="form-control ManufactureDate edate" value="" placeholder="" required readonly>
                                                <!-- <input class="month" type="hidden"> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true
        });
    });
    $(function() {
        $('.ProductSerial_id').on('keypress', function(e) {
            if (e.which == 32) {
                return false;
            }
        });
    });
    $(document).ready(function() {
        $('.ProductSerial_id').on('blur change click keydown', function() {
            let serial_id = $('.ProductSerial_id').val().toUpperCase();
            if(serial_id.length > 10){
            $.ajax({
                url: "<?php echo route('warrantyCard/serial'); ?>",
                type: "GET",
                data: {
                    'serial_id': serial_id
                },
                dataType: "JSON",
                success: function(res) {
                    if (res.interger) {
                        $('#pName').val(res.interger.name);
                        $('.product_id').val(res.interger.id);
                    }
                    if (res.stock_group) {
                        $('#stock_group').val(res.stock_group.name);
                        $('#stock_group_id').val(res.stock_group.id);
                    }
                    if (res.mf_date == null) {
                        $('.ManufactureDate').val('<?php echo date('d-m-Y'); ?>');
                    } else {
                        $('.ManufactureDate').val(res.mf_date);
                    }
                    if (res.month) {
                        $('.month').val(res.month);
                        // dateCalculate(parseInt(res.month));
                    }
                }
            });
        }
        });

    });
</script>