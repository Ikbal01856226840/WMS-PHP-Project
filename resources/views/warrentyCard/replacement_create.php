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
                                        <h4 class="text-center mx-auto">Replacement Battery Create</h4>
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
                        <form action="<?php echo route('warrantyCard/replacement/store'); ?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="card-block ">
                                            <h6 class="m-t-0">Old Battery Information</h6>
                                            <hr>
                                            <div class="form-group my-2 my-2 my-1  row">
                                                <label class="col-md-3 col-form-label">Product Batch Number</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="old_ProductSerial" class="form-control old_ProductSerial barcode" placeholder="" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1  row ">
                                                <label class="col-md-3 col-form-label">Stock Group</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control old_stock_group old_stock_group'" id="old_stock_group" readonly>
                                                    <input type="hidden" name="warrenty_id" class="form-control  old_warrenty_id">

                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1  row ">
                                                <label class="col-md-3 col-form-label">Battery Type</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="name" class="form-control name old_Name" placeholder="Type for Suggestion" readonly>
                                                    <input type="hidden" name="product_id" class="form-control name product_id" id="product_id" placeholder="Type for Suggestion" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Card No</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="CardNo" class="form-control old_CardNo" autofocus readonly>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Sales Date</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="SalesDate" class="form-control old_SalesDate" placeholder="" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Dealer Name</label>
                                                <div class="col-md-8">
                                                    <input id="my_ajax" value="" type="text" name="dealer_name" class="form-control old_dealer_name " placeholder="Type for Suggestion" autocomplete="off" readonly>
                                                    <input id="dealer_id" value="" type="hidden" name="dealer_id" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Branch Name</label>
                                                <div class="col-md-8">
                                                    <input id="branch_name" value="" type="text" name="branch_name" class="form-control old_branch_name" placeholder="Type for Suggestion" autocomplete="off" readonly>
                                                    <input id="branch_id" value="" type="hidden" name="branch_id" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Branch Area</label>
                                                <div class="col-md-8">
                                                    <input id="area_name" type="text" name="area_name" class="form-control old_area_name" readonly>
                                                    <input id="area_id" type="hidden" name="area_id">
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Sales Person</label>
                                                <div class="col-md-8">
                                                    <input id="SalesPerson" type="text" name="SalesPerson" class="form-control old_SalesPerson" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <div class="card-block  ">
                                            <h6 class="">Replacement Battery Information</h6>
                                            <hr>
                                            <div class=" b-l-default m-t-0 " style="margin-left:-36px;">
                                                <div style="margin-left: 36px;">

                                                    <div class="form-group my-2 my-2 my-1  row">
                                                        <label class="col-md-3 col-form-label">Product Batch Number</label>
                                                        <div class="col-md-8">
                                                            <span id="user_name_span" class="" style="font-size: small;"></span>
                                                            <input type="text" name="ProductSerial" class="form-control ProductSerial ProductSerial_id barcode" placeholder="" autofocus required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1  row ">
                                                        <label class="col-md-3 col-form-label">Stock Group</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control " id="stock_group" readonly>
                                                            <input type="hidden" name="stock_group_id" class="form-control  stock_group_id" id="stock_group_id">

                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1  row ">
                                                        <label class="col-md-3 col-form-label">Battery Type</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="name" class="form-control name pName" id="pName" placeholder="Type for Suggestion" readonly>
                                                            <input type="hidden" name="product_id" class="form-control name product_id" id="product_id" placeholder="Type for Suggestion" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Card No</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="CardNo" class="form-control CardNo" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Replacement Date</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="replacement_date" id="datepicker" class="form-control create_date" placeholder="dd-mm-yyyy" autofocus required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Priority</label>
                                                        <div class="col-md-8">
                                                            <select name="Priority" class="form-control Priority js-example-basic-single">
                                                                <option value="2">Replacement</option>
                                                                <option value="1">New</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <div class="form-group">
                                                <button type="submit" class="btn hor-grd btn-grd-primary btn-block submit" style="width:100%"><u>S</u>ave</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <a class=" btn hor-grd btn-grd-success btn-block " href="<?php echo route('dashboard') ?>" style="width:100%"><u>B</u>ack</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input Alignment card end -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

        $('.ProductSerial_id').on('keyup keypress blur change click keydown', function() {
            let serial_id = $('.ProductSerial_id').val().toUpperCase();
            
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

                    if (res.date == null) {
                        $('.CardEndDate').val('<?php echo date('Y-m-d'); ?>');
                    } else {
                        $('.CardEndDate').val(res.date);
                    }
                    if (res.month) {
                        $('.month').val(res.month);
                        // dateCalculate(parseInt(res.month));
                    }

                }

            });
        });


    });
    $(document).ready(function() {
        $('.ProductSerial_id').on('keyup keypress blur change click keydown', function() {
            let serial_id = $('.ProductSerial_id').val().toUpperCase();
            var user_exist = '';
            if (serial_id.length) {
                $.ajax({
                    url: "<?php echo route('replacement/duplicate_serial_id/check') ?>",
                    type: "GET",
                    data: {
                        "serial_id": serial_id
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data == 1) {
                            $("#user_name_span").removeClass("badge badge-success");
                            $("#user_name_span").text("Product Batch Number Is  Already Exists").addClass("badge badge-danger");
                            $(":submit").attr("disabled", true);

                        } else {
                            $("#user_name_span").removeClass("badge badge-danger");
                            $("#user_name_span").text("Product Batch Number Is Available").addClass("badge badge-success");
                            $(":submit").removeAttr("disabled");
                        }
                    }
                });
            }
        });
    });
    $(function() {
        $('.old_ProductSerial').on('keypress', function(e) {
            if (e.which == 32) {
                return false;
            }
        });
    });
    $(document).ready(function() {

        $('.old_ProductSerial').on('keyup keypress blur change click keydown', function() {
            let old_ProductSerial = $('.old_ProductSerial').val().toUpperCase();
               
            if (old_ProductSerial.length > 10) {
                $.ajax({
                    url: "<?php echo route('warrantyCard/replacement'); ?>",
                    type: "GET",
                    data: {
                        'old_ProductSerial': old_ProductSerial
                    },
                    dataType: "JSON",
                    success: function(res) {
                        $('.old_warrenty_id').val(res.id);
                        $('.old_stock_group').val(res.group_name);
                        $('.old_Name').val(res.name);
                        $('.old_CardNo').val(res.card_no);
                        $('.old_SalesDate').val(format(new Date(res.sales_date)));
                        $('.old_dealer_name').val(res.dealerName);
                        $('.old_branch_name').val(res.branchName);
                        $('.old_area_name').val(res.area_name);
                        $('.old_SalesPerson').val(res.sales_parson);

                    }
                });
            } else {
                $('.old_warrenty_id').val();
                $('.old_stock_group').val();
                $('.old_Name').val();
                $('.old_CardNo').val();
                $('.old_SalesDate').val();
                $('.old_dealer_name').val();
                $('.old_branch_name').val();
                $('.old_area_name').val();
                $('.old_SalesPerson').val();
            }

        });


    });

    function format(inputDate) {
        let date, month, year;
        date = inputDate.getDate();
        month = inputDate.getMonth() + 1;
        year = inputDate.getFullYear();

        date = date
            .toString()
            .padStart(2, '0');

        month = month
            .toString()
            .padStart(2, '0');

        return `${date}/${month}/${year}`;
    }
    // $(document).ready(function() {
    //     dateCalculate(0);
    //     let productArr = [];
    //     let dealerArr = [];
    //     productData();
    //     dealerData();

    //     function productData(id = null) {
    //         $.ajax({
    //             url: "//<?php //echo route('product/data'); 
                            ?>",
    //             type: "POST",
    //             dataType: "JSON",
    //             data: {},
    //             success: function(response) {
    //                 if (response.length) {
    //                     for (i = 0; i < response.length; i++) {
    //                         productArr[i] = response[i]['id'] + '-' + response[i]['name'];
    //                     }
    //                 }
    //             }
    //         })
    //     }
    //     $("#name").autocomplete({
    //         source: productArr
    //     });

    //     function dealerData() {
    //         $.ajax({
    //             url: "<?php //echo //route('dealer/data'); 
                            ?>",
    //             type: "POST",
    //             dataType: "JSON",
    //             data: {},
    //             success: function(response) {
    //                 if (response.length) {
    //                     for (i = 0; i < response.length; i++) {
    //                         dealerArr[i] = response[i]['id'] + '-' + response[i]['name'];
    //                     }
    //                 }
    //             }
    //         })
    //     }
    //     $("#dealer").autocomplete({
    //         source: dealerArr
    //     });

    //     function productDataId(id = null) {
    //         $.ajax({
    //             url: "<?php //echo route('product/data'); 
                            ?>",
    //             type: "POST",
    //             dataType: "JSON",
    //             data: {
    //                 'id': id
    //             },
    //             success: function(response) {
    //                 // if (response[0]['warranty']) {
    //                 //     dateCalculate(response[0]['warranty']);
    //                 // } else {
    //                 dateCalculate(0);
    //                 // }
    //             }
    //         })
    //     }

    //     $('.name').change(function() {
    //         let name = $('.name').val();
    //         if (name) {
    //             let id = name.split("-");
    //             productDataId(id[0]);
    //         }
    //     })

    //     $('.SalesDate').change(function() {
    //         let name = $('.name').val();
    //         dateCalculate(parseInt($('.month').val()));
    //         if (name) {
    //             let id = name.split("-");
    //             productDataId(id[0]);
    //         }

    //     })

    // })
    // function dateCalculate($month) {
    //         let month = 0;
    //         let year = 0;
    //         let SalesDate = $('.SalesDate').val();
    //         let startDate = SalesDate.split('-');
    //         if ((parseInt(startDate[1]) + parseInt($month)) > 12) {
    //             month = parseInt(startDate[1]) + parseInt($month);
    //             year = month / 12;
    //             startDate[1] = (parseInt(startDate[1]) + parseInt($month)) - (parseInt(year) * 12);
    //             startDate[0] = parseInt(startDate[0]) + parseInt(year);
    //         } else {
    //             startDate[1] = (parseInt(startDate[1]) + parseInt($month));
    //         }
    //         let warrentyEndDate = startDate[0] + '-' + startDate[1] + '-' + startDate[2];
    //         if (parseInt(startDate[1]) < 10) {
    //             warrentyEndDate = startDate[0] + '-0' + startDate[1] + '-' + startDate[2];
    //         }
    //         $('.CardEndDate').val(warrentyEndDate);
    //     }
</script>