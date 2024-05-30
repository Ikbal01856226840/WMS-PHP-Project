
<div class="pcoded-main-container">
    <div class="pcoded-content  ">
        <div class="pcoded-inner-content  " >
               <br>
                <!-- Main-body start -->
            <div class="main-body ">
                <div class="page-wrapper m-t-0 m-l-2 m-r-2 p-12">
                <!-- Page-header start -->
                    <div class="page-header m-0 p-0">
                        <div class="row">
                            <div class="col-11 mx-auto text-center my-3 py-2 bg-success">
                                <div class="page-header-title">
                                    <div class="">
                                        <h4>Add Product Price</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <!-- Page body start -->
                    <div class="page-body">
                            <!-- Basic Form Inputs card start -->
                        <form action="<?php echo route('pricelist/save'); ?>" method="POST">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="sub-title">Add Product Price</h4>
                                    <form>
                                        <div class="row">                                           
                                            <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">                                                
                                                <div class="form-group row d-flex align-items-center">
                                                    <label class="col-sm-2 col-form-label">Stock Group</label>
                                                    <div class="col-sm-10">
                                                        <select name="stock_group" class="form-control-sm js-example-basic-single stock_group" required>
                                                            <option value="0">Choose Battery Group</option>
                                                            <?php
                                                            if (!empty($stock_group)) {
                                                                foreach ($stock_group as $row) { ?>
                                                                    <option value="<?php if (!empty($row['id'])) echo $row['id']; ?>" warranty="<?php if (!empty($row['warrantry_period'])) echo $row['warrantry_period']; ?>"><?php if (!empty($row['name'])) echo $row['name']; ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex align-items-center">
                                                    <label class="col-sm-2 col-form-label">Battery Type</label>
                                                    <div class="col-sm-10">
                                                        <select name="product_type" class="form-control-sm js-example-basic-single" required>
                                                            <option value="0">Choose Battery Type</option>
                                                            <?php
                                                            if (!empty($product_type)) {
                                                                foreach ($product_type as $data) { ?>
                                                                    <option value="<?php if (!empty($data['id'])) echo $data['id']; ?>"><?php if (!empty($data['name'])) echo $data['name']; ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex align-items-center">
                                                    <label class="col-sm-2 col-form-label">Warranty (Months)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="warranty_period" class="form-control warranty_month" placeholder="" readonly>
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">Capacity @20Ah</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="capacity" class="form-control" placeholder="">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">Volt</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="volt" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                                                                
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="form-group row d-flex align-items-center">
                                                    <label class="col-sm-2 col-form-label">Length (mm)</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="length" class="form-control" placeholder="">
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">Width (mm)</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="width" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex align-items-center mt-4">
                                                    <label class="col-sm-2 col-form-label">Height Without Post (mm)</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="height_wp" class="form-control" placeholder="">
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">Height With Post (mm)</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="height_op" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex align-items-center mt-4">
                                                    <label class="col-sm-2 col-form-label">Plate/Cell</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="plate_pc" class="form-control" placeholder="">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">CCA</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="cca" class="form-control" placeholder="">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">RC</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="rc" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="form-group row d-flex align-items-center">
                                                    <label class="col-sm-2 col-form-label">Dry Weight (kg)</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="d_weight" class="form-control" placeholder="">
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">Wet Weight (kg)</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="w_weight" class="form-control" placeholder="">
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">Electrolyte/ <br>Battery (ltr)</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="electrolyte" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="form-group row d-flex align-items-center">                                                    
                                                    <label class="col-sm-4 col-form-label">Application (Engine CC / IPS)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="cc_ips" class="form-control" placeholder="">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">Price</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="price" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-lg-6">
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
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </form>   
                    </div>  
                </div>   
           </div>  
       </div>
   </div>
</div>


<script>
$(document).ready(function(){
    $('.stock_group').change(function(){
        $('.warranty_month').val($('.stock_group option:selected').attr('warranty'))
    })
})
</script>


