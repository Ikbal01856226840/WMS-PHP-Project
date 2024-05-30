
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
                                <h4 class="text-center mx-auto">Add Retailer</h4>
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
                        <form action="<?php echo route('retailer/save'); ?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="card-block ">
                                            <h6 class="m-t-0">Add Retailer</h6>
                                            <hr>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Dealer </label>
                                                <div class="col-md-8">
                                                    <select name="dealer_id" id="" class="form-control js-example-basic-single  dealer_id" required>
                                                        <?php
                                                        if (!empty($dealers)) {
                                                            foreach ($dealers as $row) { ?>
                                                                <option value="<?php if (!empty($row['id'])) echo $row['id']; ?>"><?php if (!empty($row['name'])) echo $row['name']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Retailer Type</label>
                                                <div class="col-md-8">
                                                    <select name="retailer_type"  class="form-control js-example-basic-single retailer_type" required>
                                                    <option value="0">Select</option>
                                                        <?php
                                                        if (!empty($data)) {
                                                            foreach ($data as $row) { ?>
                                                                <option value="<?php if (!empty($row['id'])) echo $row['id']; ?>"><?php if (!empty($row['typename'])) echo $row['typename']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Retailer Code</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="retailer_code" value="<?php  echo ($cid['dealercode'] +1) ?>" class="form-control DealerCode" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Retailer Alias</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="retailer_alias" class="form-control " placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Retailer Name</label>
                                                <div class="col-md-8">
                                                    <input name="retailer_name" class="form-control" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                              <label class="col-md-3 col-form-label">Branch</label>
                                              <div class="col-md-8">
                                                <select name="branch_id" class="form-control js-example-basic-single  ParentDealer" id="branch_id" required>
                                                    <option value="0">Select</option>
                                                    <?php
                                                    if (!empty($branchs)) {
                                                        foreach ($branchs as $branch) { ?>
                                                            <option value="<?php if (!empty($branch['id'])) echo $branch['id']; ?>"><?php if (!empty($branch['name'])) echo $branch['name']; ?></option>
                                                    <?php }
                                                    }
                                                    ?>
                                                </select>
                                              </div>
                                          </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Branch Area</label>
                                                <div class="col-md-8">
                                                    <select name="area_id" class="form-control js-example-basic-single  area_id " id="" required>
                                                    <option value="0">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Active</label>
                                                <div class="col-md-8">
                                                    <select name="status" id="" class="form-control status js-example-basic-single" required>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
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
                                                        <label class="col-md-3 col-form-label">Address</label>
                                                        <div class="col-md-8">
                                                            <textarea name="Address" class="form-control Address" placeholder="" ></textarea>

                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-md-3 col-form-label">Thana</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="thana" class="form-control thana" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-md-3 col-form-label">District</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="District" class="form-control District" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-md-3 col-form-label">Near Area</label>
                                                        <div class="col-md-8">
                                                            <textarea  name="near_area" class="form-control Address" placeholder="" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-md-3 col-form-label">Email</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Email" class="form-control Email" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-md-3 col-form-label">Phone1</label>
                                                        <div class="col-md-8">
                                                            <input type="number" name="Phone1" class="form-control Phone1" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-md-3 col-form-label">Phone2</label>
                                                        <div class="col-md-8">
                                                            <input type="number" name="Phone2" class="form-control Phone2" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-md-3 col-form-label">Fax</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Fax" class="form-control Fax" placeholder="">
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
</script>
<script>
    $('#branch_id').on(' change', function() {
        var branch_id = $('#branch_id').val();
        $.ajax({
            url: "<?php echo route('dealer/area/get') ?>",
            type: "GET",
            data: {
                "branch_id": branch_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);           
                $('.area_id').html('<option value="0">Select Name</option>');
                $.each(data, function(key, value) {
                    $(".area_id").append('<option value="' + value.id + '">' + value.area_name + '</option>');
                });
            }
        });
    });
</script>