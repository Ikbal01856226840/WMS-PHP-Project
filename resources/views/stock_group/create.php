
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
                                <h4 class="text-center mx-auto">Add Stock Group</h4>
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
                        <form action="<?php echo route('stockGroup/save'); ?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="card-block ">
                                            <h6 class="m-t-0">Add Stock Group</h6>
                                            <hr>
                                            <div class="form-group my-2 row">
                                                <label class="col-sm-2 col-form-label">Stock Group</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="stockGroup" class="form-control" placeholder="Enter Stock Group Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-sm-2 col-form-label">Alias</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="alias" class="form-control" placeholder="Enter Alias" >
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-sm-2 col-form-label">Stock Group Code</label>
                                                <div class="col-sm-10">
                                                    <span id="stock_group_code" class="" style="font-size: small;"></span>
                                                    <input type="text" name="stock_group_code" id="sgc" class="form-control stock_group_code barcode" placeholder="Enter Stock Group Code" required>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-sm-2 col-form-label">Warranty Period  Name</label>
                                                <div class="col-sm-10">
                                                <select name="warrantry_period" class="form-control value js-example-basic-single" required>
                                                        <option value="0" class="d-inline">Select</option>
                                                        <option value="3" class="d-inline">3 Months</option>
                                                        <option value="6" class="d-inline">6 Months</option>
                                                        <option value="9" class="d-inline">9 Months</option>
                                                        <option value="12" class="d-inline">12 Months</option>
                                                        <option value="15" class="d-inline">15 Months</option>
                                                        <option value="18" class="d-inline">18 Months</option>
                                                        <option value="21" class="d-inline">21 Months</option>
                                                        <option value="24" class="d-inline">24 Months</option>
                                                        <option value="30" class="d-inline">30 Months</option>
                                                        <option value="36" class="d-inline">36 Months</option>
                                                        <option value="40" class="d-inline">40 Months</option>
                                                        <option value="48" class="d-inline">48 Months</option>
                                                        <option value="60" class="d-inline">60 Months</option>
                                                </select>
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
                                                    <div class="form-group my-2 row">
                                                        <label class="col-sm-2 col-form-label">Under</label>
                                                        <div class="col-sm-10">
                                                            <select name="under" class="form-control js-example-basic-single" required>
                                                                <option value="0">Primary</option>
                                                                <?php
                                                                if (!empty($data)) {
                                                                    foreach ($data as $row) { ?>
                                                                        <option value="<?php if (!empty($row['id'])) echo $row['id']; ?>"><?php if (!empty($row['name'])) echo $row['name']; ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-sm-2 col-form-label">Quantity Add Permission:</label>
                                                        <div class="col-sm-10">
                                                            <select name="qtyAdd" id="" class="form-control js-example-basic-single" required>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                     <div class="form-group my-2 row">
                                                        <label class="col-sm-2 col-form-label">Sales Date Expire:</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" name="sales_expire_date" class="form-control" placeholder="Enter Sales Expire Date" required>
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


<script>
    $('.stock_group_code').on('keyup', function() {
        var sgc = $('#sgc').val().toUpperCase();
        console.log(sgc);
        $.ajax({
            url: "<?php echo route('stockGroup/duplicate_sgc'); ?>",
            type: "GET",
            data: {
                "stock_group_code": sgc,
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data == '0') {
                    $("#stock_group_code").removeClass("badge badge-danger");
                    $("#stock_group_code").text(' Code ' + sgc + " Available").addClass("badge badge-success");
                    $(":submit").removeAttr("disabled");
                } else {
                    $("#stock_group_code").removeClass("badge badge-success");
                    $("#stock_group_code").text(" Stock Group Code Already Exists").addClass("badge badge-danger");
                    $(":submit").attr("disabled", true);
                }
            }
        });
    });
</script>

