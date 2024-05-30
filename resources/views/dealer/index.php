<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <div class="page-header mt-4">
                            <div class="row align-items-end">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4> Dealer List</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                            <div class="page-header m-0 p-0 ">
                            <form action="<?php echo route('dealer/index'); ?>" method="GET">
                                 <div class="row ">
                                        <div class="col-md-4">
                                            <label>Branch</label>
                                            <select name="branch_id" class="form-control js-example-basic-single branch_id">
                                                <option <?php  if(!empty($branch_id)){echo $branch_id == 0 ? 'selected' : ''; }?> value="0">ALL</option>
                                            
                                                    <?php foreach ($branchs as $branch) { ?>
                                                        <option <?php  if(!empty($branch_id)){echo $branch_id == $branch['id']  ? 'selected' : ''; }?> value="<?php echo $branch['id']; ?>">
                                                            <?php echo $branch['name']; ?>
                                                        </option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 ">
                                            <label>Branch Area</label>
                                            <select name="area_id" class="form-control js-example-basic-single area_id">
                                                <option <?php  if(!empty($area_id)){echo $area_id == 0 ? 'selected' : ''; }?> value="0">ALL</option>
                                                <?php if(!empty($area_id)){foreach ( $branch_area as  $area) { ?>
                                                <option <?php  if(!empty($area_id)){echo $area_id == $area['id']  ? 'selected' : ''; }?> value="<?php echo $area['id']; ?>">
                                                    <?php echo $area['area_name']; ?>
                                                </option>
                                                <?php } }?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label></label>
                                                <div class="form-group">
                                                    <button type="submit" class="btn hor-grd btn-grd-primary btn-block submit" style="width:100%">Search</button> 
                                            </div>
                                        </div>
                                  </div>
                                </form>
                                <div class="col-md-12">
                                    <!-- Zero config.table start -->
                                    <div class="card">
                                        <div class="card-header">


                                        </div>
                                        <div class="card-block">
                                        <div class="text-center">
                                                    <button type="button" id="printr" class="btn btn-primary btn-print-invoice m-b-5 btn-sm waves-effect waves-light m-r-20 print ">Print</button>
                                            </div>
                                            <div class="dt-responsive table-responsive">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap print-demo2">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Dealer Type</th>
                                                            <th>Dealer Code</th>
                                                            <th>Dealer/Company Name</th>
                                                            <th>Address</th>
                                                            <th>Thana</th>
                                                            <th>District</th>
                                                            <th>Near Area</th>
                                                            <th>Phone 1</th>
                                                            <th>Phone 2</th>
                                                            <th>E-mail</th>
                                                            <th>Branch Name</th>
                                                            <th>Branch Area</th>
                                                            <th>Status</th>
                                                            <?php if(session('user_lavel')!=2){ ?>
                                                            <th class=" d-print-none">Edit</th>
                                                            <?php if(session('user_lavel')==1) {?>
                                                            <th class=" d-print-none">Delete</th>
                                                            <?php } } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($data)) {
                                                            $i = 1;
                                                            // dd($data);
                                                            foreach ($data as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                        <span class="dealer_typename">
                                                                            <?php if (!empty($row['typename']))  echo wordwrap( $row['typename'], 20, "<br>\n"); ?>
                                                                        </span>
                                                                    </td>
                                                                    <td><?php if (!empty($row['dealercode'])) echo $row['dealercode']; ?></td>
                                                                    <td>
                                                                        <span class="dealer_name text-wrap" style="max-width:6%;">
                                                                            <?php if (!empty($row['name'])) echo wordwrap( $row['name'], 15, "<br>\n"); ?>
                                                                        </span>
                                                                    </td>
                                                                  
                                                                    <td>
                                                                        <span class="dealera_ddress text-wrap" style="max-width:12%;">
                                                                            <?php if (!empty($row['address']))  echo wordwrap( $row['address'], 30, "<br>\n"); ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="dealer_thana">
                                                                            <?php if (!empty($row['thana'])) echo wordwrap( $row['thana'], 20, "<br>\n"); ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="dealer_district">
                                                                            <?php if (!empty($row['district'])) echo wordwrap( $row['district'], 20, "<br>\n"); ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="dealer_near_area">
                                                                            <?php if (!empty($row['near_area'])) echo wordwrap( $row['near_area'], 50, "<br>\n"); ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="d_phone1">
                                                                            <?php if (!empty($row['phone1'])) echo $row['phone1']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="d_phone2">
                                                                            <?php if (!empty($row['phone2'])) echo $row['phone2']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="dealer_email">
                                                                            <?php if (!empty($row['email'])) echo $row['email']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="branch_1">
                                                                            <?php if (!empty($row['branch_name'])) echo wordwrap( $row['branch_name'], 20, "<br>\n"); ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="area_1">
                                                                            <?php if (!empty($row['area_name'])) echo $row['area_name']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="b_status">
                                                                            <?php   if (isset($row['status'])) echo $row['status'] ? 'Active ' : 'Deactivate'; ?>
                                                                        </span>
                                                                       
                                                                    </td>
                                                                    <?php if(session('user_lavel')==8) {?>
                                                                    <?php if(session('branch_id')==$row['branch_id']) {?>
                                                                        <td class=" d-print-none">
                                                                            <button type="button" class="btn btn-sm btn-primary edit mr-5" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                            <button type="button" class="btn btn-sm btn-info back mr-5 d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                        </td>
                                                                        
                                                                    <?php } else { ?>
                                                                        <td class=" d-print-none"></td>
                                                                    <?php } ?>
                                                                <?php } else{?>
                                                                   <?php if(session('user_lavel')!=2){ ?>
                                                                    <td class=" d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-primary edit mr-5" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                        <button type="button" class="btn btn-sm btn-info back mr-5 d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                    </td>
                                                                    <?php if(session('user_lavel')==1) {?>
                                                                    <td class=" d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-danger delete" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Delete</button>
                                                                        <button type="button" class="btn btn-sm btn-success save d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Save</button>
                                                                    </td>
                                                                      <?php } ?>
                                                                  <?php } }?>
                                                                </tr>
                                                        <?php $i++;
                                                            }
                                                        } ?>
                                                    </tbody>
                                                    <tfoot>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-body end -->
                    </div>
                    <!-- Main-body end -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Dealer Edit Modal -->

<div class="modal dealereditModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title text-center" id="exampleModalLabel1"><b>Editting Dealer Information</b></h5>
            </div>
            <form action="">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <div class="form-group my-2 row">
                            <label class="col-md-3 col-form-label">Dealer Type</label>
                            <div class="col-md-8">
                                <select name="DealerType" class="form-control DealerType" id="" required>
                                    <?php
                                    // dd($data);
                                    if (!empty($dealertype)) {
                                        foreach ($dealertype as $row) { ?>
                                            <option value="<?php if (!empty($row['id'])) echo $row['id']; ?>"><?php if (!empty($row['typename'])) echo $row['typename']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group my-2 row">
                            <label class="col-md-3 col-form-label">Dealer Code</label>
                            <div class="col-md-8">
                                <input type="text" name="DealerCode" class="form-control DealerCode" value="<?php if (!empty($pid['dealercode'])) echo $pid['dealercode'] + 1; ?>" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="form-group my-2 row">
                            <label class="col-md-3 col-form-label">Dealer Alias</label>
                            <div class="col-md-8">
                                <input type="text" name="DealerAlias" class="form-control DealerAlias" placeholder="">
                            </div>
                        </div>
                        <div class="form-group my-2 row">
                            <label class="col-md-3 col-form-label">Dealer Name</label>
                            <div class="col-md-8">
                                <input name="DealerName" class="form-control DealerName" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group my-2 row">
                            <label class="col-md-3 col-form-label">Branch</label>
                            <div class="col-md-8">
                                <select name="branch_id" class="form-control " id="branch_id" required>
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
                                <select name="area_id" class="form-control  area_id" id="area_id" required>
                                    <!-- <option value="0">Select</option> -->
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group my-2 row">
                            <label class="col-md-3 col-form-label">Active</label>
                            <div class="col-md-8">
                                <select name="status"  class="form-control status " id="status_id">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group my-2 row">
                            <label class="col-md-3 col-form-label">Address</label>
                            <div class="col-md-8">
                                <textarea name="Address"  class=" form-control Address"></textarea>
                                
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
                                <textarea  name="near_area" class="form-control near_area" placeholder="" ></textarea>
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
                        <div class="form-group mb-3 me-4 pe-5 row">
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-primary px-5 mt-4 dealerupdate">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


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
                $('#area_id').html('<option value="0">Select Name</option>');
                $.each(data, function(key, value) {
                    $("#area_id").append('<option value="' + value.id + '">' + value.area_name + '</option>');
                });
            }
        });
    });
</script>
<script>
    $('.branch_id').on(' change', function() {
        var branch_id = $('.branch_id').val();
        $.ajax({
            url: "<?php echo route('dealer/area/get') ?>",
            type: "GET",
            data: {
                "branch_id": branch_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);           
                $('.area_id').html('<option value="0">ALL</option>');
                $.each(data, function(key, value) {
                    $(".area_id").append('<option value="' + value.id + '">' + value.area_name + '</option>');
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.edit').click(function() {
            let id = $(this).closest('tr').find(this).val();
            $.ajax({
                url: 'edit',
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function(response) {
                    // if (response == 1) {
                        if(response.areas){
                        $.each(response.areas, function(key, value) {
                        $(".area_id").append('<option value="' + value.id + '">' + value.area_name + '</option>');
                      });
                    }
                    $('.dealerupdate').val(response.dealer[0].id);
                    $('.DealerType').val(response.dealer[0].dealertype_id);
                    $('.ParentDealer').val(response.dealer[0].parent_dealer);
                    $('.DealerCode').val(response.dealer[0].dealercode);
                    $('.DealerAlias').val(response.dealer[0].dealeralise);
                    $('.DealerName').val(response.dealer[0].name);
                    $('.DealerDetails').val(response.dealer[0].dealerdetails);
                    $('#branch_id').val(response.dealer[0].branch_id);
                    $('.area_id').val(response.dealer[0].area_id);
                    $('#status_id').val((response.dealer[0].status));
                    $('.Address').val(response.dealer[0].address);
                    $('.thana').val(response.dealer[0].thana);
                    $('.District').val(response.dealer[0].district);
                    $('.near_area').val(response.dealer[0].near_area);
                    $('.Email').val(response.dealer[0].email);
                    $('.Phone1').val(response.dealer[0].phone1);
                    $('.Phone2').val(response.dealer[0].phone2);
                    $('.Fax').val(response.dealer[0].fax);
                }
            })
            $('.dealereditModal').show();

            $('.dealerupdate').click(function(event) {
                event.preventDefault();
                let thiss = $(this);
                let id = $(this).val();
                let dealertype = $('.DealerType').val();
                let parentdealer = $('.ParentDealer').val();
                let dealercode = $('.DealerCode').val();
                let dealeralise = $('.DealerAlias').val();
                let dealername = $('.DealerName').val();
                let dealerdetails = $('.DealerDetails').val();
                let area_id=$('#area_id').val();
                let branch_id=$('#branch_id').val();
                let status=$('.status').val();
                let address = $('.Address').val();
                let thana = $('.thana').val();
                let district = $('.District').val();
                let near_area = $('.near_area').val();
                let email = $('.Email').val();
                let phone1 = $('.Phone1').val();
                let phone2 = $('.Phone2').val();
                let fax = $('.Fax').val();
                $.ajax({
                    url: "<?php echo route('dealer/save'); ?>",
                    dataType: "JSON",
                    method: "POST",
                    data: {
                        'id': id,
                        'DealerType': dealertype,
                        'ParentDealer': parentdealer,
                        'DealerCode': dealercode,
                        'DealerAlias': dealeralise,
                        'DealerName': dealername,
                        'DealerDetails': dealerdetails,
                        'area_id':area_id,
                        'branch_id':branch_id,
                        'status':status,
                        'Address': address,
                        'thana': thana,
                        'District': district,
                        'near_area':near_area,
                        'Email': email,
                        'Phone1': phone1,
                        'Phone2': phone2,
                        'Fax': fax
                    },
                    success: function(response) {
                        if (response == 1) {
                            $('.dealereditModal').hide();
                            location.reload();
                        } else {
                            toastr.warning("Edit Error Try Again");
                        }
                    }
                })
            })
        })
    })
</script>