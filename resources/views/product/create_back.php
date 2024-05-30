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
                                <h4 class="text-center mx-auto">Add Stock Item</h4>
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
                        <form action="<?php echo route('product/save'); ?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="card-block ">
                                            <h6 class="m-t-0">Add Stock Item</h6>
                                            <hr>
                                            <!-- <div class="form-group my-2 my-2 row">
                                                <label class="col-md-3 col-form-label">Stock Group</label>
                                                <div class="col-md-8">
                                                    <select name="stockGroup" class="form-control js-example-basic-single" id="" required>
                                                        <option value="0">Select</option>
                                                        <?php
                                                            if (!empty($data)) {
                                                                foreach ($data as $row) { ?>
                                                                    <option <?php  if(!empty($stock_select)){
                                                                    echo  $stock_select == $row['id'] ? 'selected' : ''; }?> 
                                                                    value="<?php if (!empty($row['id'])) echo $row['id']; ?>"><?php if (!empty($row['name'])) echo $row['name']; ?></option>
                                                            <?php }
                                                            } ?>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="form-group my-2 my-2 row">
                                                <label class="col-md-3 col-form-label">Battery Type</label>
                                                <div class="col-md-8">
                                                    <span id="user_name_span" class="" style="font-size: small;"></span>
                                                    <input type="text" name="name"  id="product_name" class="form-control duplicate_product_name" placeholder="" required>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group my-2 my-2 row">
                                                <label class="col-md-3 col-form-label">Battery Type</label>
                                                <div class="col-md-8">
                                                    <span id="user_product_span" class="" style="font-size: small;"></span>
                                                    <input type="text" name="product_short_name" id="product_id" class="form-control duplicate_product_id" placeholder="" >
                                                </div>
                                            </div> -->
                                            <div class="form-group my-2 my-2 row">
                                                    <label class="col-md-3 col-form-label">Batch No Matching</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="BatchNo" class="form-control" placeholder="" required>
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
                                                    <div class="form-group my-2 my-2 row">
                                                        <label class="col-md-3 col-form-label">Company</label>
                                                        <div class="col-md-8">
                                                            <select name="company" class="form-control js-example-basic-single" required>
                                                                <option value="1">Primary</option>
                                                                <?php
                                                                if (!empty($company)) {
                                                                    foreach ($company as $row) { ?>
                                                                        <option <?php  if(!empty($get_compant)){
                                                                        echo $get_compant== $row['id'] ? 'selected' : ''; }?> 
                                                                        value=" <?php if (!empty($row['id'])) echo $row['id']; ?>"><?php if (!empty($row['name'])) echo $row['name']; ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group my-2 my-2 row">
                                                        <label class="col-md-3 col-form-label">Units</label>
                                                        <div class="col-md-8">
                                                        <select name="units" class="form-control js-example-basic-single" id="" required>
                                                                <option  value="0">Select</option>
                                                                <option <?php  if(!empty($get_units)){
                                                                    echo $get_units=='Pcs' ? 'selected' : ''; }?>    
                                                                value="Pcs">Pcs</option>
                                                                <option <?php  if(!empty($get_units)){
                                                                echo $get_units=='Kg' ? 'selected' : ''; }?>   
                                                                value="Kg">Kg</option>
                                                                <option  <?php  if(!empty($get_units)){
                                                                echo $get_units=='L' ? 'selected' : ''; }?>
                                                                value="L">L</option>
                                                        </select>
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
    
    $('.duplicate_product_name').on('keyup', function() {
        var product_name = $('#product_name').val();
        var user_exist = '';
        $.ajax({
            url: "<?php echo route('duplicate_product_name/check')?>",
            type: "GET",
            data: {
                "product_name": product_name
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data == '0') {
                    $("#user_name_span").removeClass("badge badge-danger");
                    $("#user_name_span").text(' Product Name ' + name + " Available").addClass("badge badge-success");
                    $(":submit").removeAttr("disabled");
                } else {
                    $("#user_name_span").removeClass("badge badge-success");
                    $("#user_name_span").text(' Product Name ' + name + " Already Exists").addClass("badge badge-danger");
                    $(":submit").attr("disabled", true);
                }
            }
        });
    });
    $('.duplicate_product_id').on('keyup', function() {
        var product_id = $('#product_id').val();
        var user_exist = '';
        $.ajax({
            url: "<?php echo route('duplicate_product_id/check')?>",
            type: "GET",
            data: {
                "product_id": product_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data == '0') {
                    $("#user_product_span").removeClass("badge badge-danger");
                    $("#user_product_span").text(' Product Short Name ' + name + " Available").addClass("badge badge-success");
                    $(":submit").removeAttr("disabled");
                } else {
                    $("#user_product_span").removeClass("badge badge-success");
                    $("#user_product_span").text(' Product Name ' + name + " Already Exists").addClass("badge badge-danger");
                    $(":submit").attr("disabled", true);
                }
            }
        });
    });
</script>