
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
                                <h4 class="text-center mx-auto">Add Phone Number Stock Group</h4>
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
                        <form action="<?php echo route('phone_number/stock/save'); ?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="card-block ">
                                            <h6 class="m-t-0">Add Phone Number Stock Group</h6>
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