<div class="pcoded-main-container">
    <div class="pcoded-content  ">
        <div class="pcoded-inner-content  " >
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
                                <h4 class="text-center mx-auto">Add New Phone Number</h4>
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
                        <form action="<?php  echo route('phoner_number/store'); ?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="card-block ">
                                            <h6 class="m-t-0">Add New Phone Number</h6>
                                            <hr>
                                              <div class="form-group my-2 my-2 my-1  row ">
                                                    <label class="col-md-3 col-form-label">
                                                        Stock Group
                                                    </label>
                                                    <div class="col-md-8">
                                                        <select name="stock_group_id" class="form-control js-example-basic-single stock_group_id" required>
                                                            <option value="">select</option>
                                                            <?php foreach ($stocks as $stock) { ?>
                                                                <option value="<?php echo $stock['id']; ?>">

                                                                    <?php echo $stock['name']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group my-2 my-2 my-1  row">
                                                    <label class="col-md-3 col-form-label">Brand</label>
                                                    <div class="col-md-6 mt-2">
                                                        <input type="radio" id="html" name="brand_id" value="Hamko" required>
                                                          <label for="html">HAMKO</label>
                                                          <input type="radio" class="ms-3" id="css" name="brand_id" value="Others Brand">
                                                          <label for="css">Other Brand</label><br>
                                                         
                                                    </div>
                                                </div>
                                                <div class="form-group my-2 my-2 my-1  row">
                                                    <label class="col-md-3 col-form-label">Phone Number User Type</label>
                                                    <div class="col-md-6 mt-2">
                                                           <input type="radio" id="html" name="phone_type" value="Owner" required>
                                                          <label for="html">Owner</label>
                                                          <input type="radio" class="ms-3" id="css" name="phone_type" value="User/Driver">
                                                          <label for="css">User/Driver</label><br>
                                                         
                                                    </div>
                                                </div>
                                                <div class="form-group my-2 my-2 my-1 row">
                                                    <label class="col-md-3 col-form-label">Phone Number</label>
                                                    <div class="col-md-8">
                                                        <span id="user_name_span" class="" style="font-size: small;"></span>
                                                        <input type="number" name="phone_number" id="phone_number" class="form-control CardNo duplicate_phone_number" placeholder="Phone Number" required>
                                                    </div>
                                             </div>
											 <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Location</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="location" class="form-control CardNo" placeholder="location" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6 "  >
                                        <div class="card-block  " > 
                                            <h6 class="">Basic Inputs</h6>
                                            <hr>
                                            <div class=" b-l-default m-t-0 " style="margin-left:-36px;">
                                                <div style="margin-left: 36px;">
                                                   <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Customer Name</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="customer_name" class="form-control" value="" placeholder="Customer Name" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label"> Date</label>
                                                        <div class="col-md-8">
                                                            <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" placeholder="" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Note</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="note" class="form-control DealerName" id='dealer' placeholder="Type for Suggestion" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <button type="submit" class="btn hor-grd btn-grd-primary btn-block submit" style="width:100%" ><u>S</u>ave</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $('.duplicate_phone_number').on('keyup', function() {
        var phone = $('#phone_number').val();
        var stock_id = $('.stock_group_id').val();

        var user_exist = '';
        $.ajax({
            url: "duplicate_number/check",
            type: "GET",
            data: {
                "phone_number": phone,
                "stock_id": stock_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data == '0') {
                    $("#user_name_span").removeClass("badge badge-danger");
                    $("#user_name_span").text(' Phone ' + phone + " Available").addClass("badge badge-success");
                    $(":submit").removeAttr("disabled");
                } else {
                    $("#user_name_span").removeClass("badge badge-success");
                    $("#user_name_span").text(" Phone  And  Stock Group Name  Already Exists").addClass("badge badge-danger");
                    $(":submit").attr("disabled", true);
                }
            }
        });
    });
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        dateCalculate(12);
        let productArr = [];
        let dealerArr = [];
        productData();
        dealerData();

        function productData(id = null) {
            $.ajax({
                url: "<?php echo route('product/data'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {},
                success: function(response) {
                    if (response.length) {
                        for (i = 0; i < response.length; i++) {
                            productArr[i] = response[i]['id'] + '-' + response[i]['name'];
                        }
                    }
                }
            })
        }
        $("#name").autocomplete({
            source: productArr
        });

        function dealerData() {
            $.ajax({
                url: "<?php echo route('dealer/data'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {},
                success: function(response) {
                    if (response.length) {
                        for (i = 0; i < response.length; i++) {
                            dealerArr[i] = response[i]['id'] + '-' + response[i]['name'];
                        }
                    }
                }
            })
        }
        $("#dealer").autocomplete({
            source: dealerArr
        });

        function productDataId(id = null) {
            $.ajax({
                url: "<?php echo route('product/data'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    'id': id
                },
                success: function(response) {
                    // if (response[0]['warranty']) {
                    //     dateCalculate(response[0]['warranty']);
                    // } else {
                    dateCalculate(12);
                    // }
                }
            })
        }

        $('.name').change(function() {
            let name = $('.name').val();
            if (name) {
                let id = name.split("-");
                productDataId(id[0]);
            }
        })

        $('.SalesDate').change(function() {
            let name = $('.name').val();
            dateCalculate(12);
            if (name) {
                let id = name.split("-");
                productDataId(id[0]);
            }

        })

        function dateCalculate($month) {
            let month = 0;
            let year = 0;
            let SalesDate = $('.SalesDate').val();
            let startDate = SalesDate.split('-');
            if ((parseInt(startDate[1]) + parseInt($month)) > 12) {
                month = parseInt(startDate[1]) + parseInt($month);
                year = month / 12;
                startDate[1] = (parseInt(startDate[1]) + parseInt($month)) - (parseInt(year) * 12);
                startDate[0] = parseInt(startDate[0]) + parseInt(year);
            } else {
                startDate[1] = (parseInt(startDate[1]) + parseInt($month));
            }
            let warrentyEndDate = startDate[0] + '-' + startDate[1] + '-' + startDate[2];
            if (parseInt(startDate[1]) < 10) {
                warrentyEndDate = startDate[0] + '-0' + startDate[1] + '-' + startDate[2];
            }
            $('.CardEndDate').val(warrentyEndDate);
        }

    })
</script>