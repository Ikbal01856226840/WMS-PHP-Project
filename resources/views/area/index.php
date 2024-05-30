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
                                        <h4>Area List</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                            <div class="page-header m-0 p-0 ">
                                <form action="<?php echo route('area/index'); ?>" method="GET">
                                    <div class="row ">
                                            <div class="col-md-4">
                                                <label>Branch</label>
                                                <select name="branch_id" class="form-control js-example-basic-single area_id">
                                                    <option <?php  if(!empty($branch_id)){echo $branch_id == 0 ? 'selected' : ''; }?> value="0">ALL</option>
                                                
                                                        <?php foreach ($branchs as $branch) { ?>
                                                            <option <?php  if(!empty($branch_id)){echo $branch_id == $branch['id']  ? 'selected' : ''; }?> value="<?php echo $branch['id']; ?>">
                                                                <?php echo $branch['name']; ?>
                                                            </option>
                                                        <?php } ?>
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
                                <div class="col-sm-12">
                                    <!-- Zero config.table start -->
                                    <div id="print-demo2" class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-block">
                                        <div class="text-center">
                                                    <button type="button" id="printr" class="btn btn-primary btn-print-invoice m-b-5 btn-sm waves-effect waves-light m-r-20 print ">Print</button>
                                            </div>
                                            <div class="dt-responsive table-responsive">
                                                <table id="simpletable"  class="table table-striped table-bordered nowrap print-demo2">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>SL</th>
                                                            <th>Area Name</th>
                                                            <th>Branch</th>
                                                            <th>Sales Parson</th>
                                                            <th>Phone Number</th>
                                                            <?php if(session('user_lavel')==1||session('user_lavel')==3 ||session('user_lavel')==4 ||session('user_lavel')==7 ||session('user_lavel')==9){ ?>
                                                            <th class=" d-print-none">Edit</th>
                                                            <th class=" d-print-none">Delete</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($data)) {
                                                            $i = 1;
                                                            foreach ($data as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                        <span class="area_name">
                                                                            <?php if (!empty($row['area_name'])) echo $row['area_name']; ?>
                                                                        </span>
                                                                        <input type="text" name="area_name" class="form-control d-none areaName" value="<?php if (!empty($row['area_name'])) echo $row['area_name']; ?>" placeholder="">
                                                                    </td>
                    
                                                                    <td>
                                                                        <span class="b_branch">
                                                                            <?php if (!empty($row['branch_name'])) echo $row['branch_name']; ?>
                                                                        </span>
                                                                        <select name="branch_id" class="form-control  d-none  bBranch d-print-none "  >
                                                                            <option value="0">Select</option>
                                                                            <?php
                                                                            if (!empty($branchs)) {
                                                                                foreach ($branchs as $branch) { ?>
                                                                                    <option <?php echo ($row['branch_id']==$branch['id'])?'selected':' '; ?> value="<?php if (!empty($branch['id'])) echo $branch['id']; ?>"><?php if (!empty($branch['name'])) echo $branch['name']; ?></option>
                                                                            <?php }
                                                                            } ?>
                                                                        <select>
                                                                    </td>
                                                                       
                                                                    <td>
                                                                        <span class="sales_parson">
                                                                            <?php if (!empty($row['sales_parson'])) echo $row['sales_parson']; ?>
                                                                        </span>
                                                                        <input type="text" name="sales_parson" class="form-control d-none salesParson" value="<?php if (!empty($row['sales_parson'])) echo $row['sales_parson']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="phone_number">
                                                                            <?php if (!empty($row['phone_number'])) echo $row['phone_number']; ?>
                                                                        </span>
                                                                        <input type="text" name="phone_number" class="form-control d-none phoneNumber" value="<?php if (!empty($row['phone_number'])) echo $row['phone_number']; ?>" placeholder="">
                                                                    </td>
                                                                    <?php if(session('user_lavel')==1||session('user_lavel')==3 ||session('user_lavel')==4 ||session('user_lavel')==7 ||session('user_lavel')==9){ ?>
                                                                    <td class=" d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-primary edit mr-5" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                        <button type="button" class="btn btn-sm btn-info back mr-5 d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                    </td>
                                                                    <td class=" d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-danger delete" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Delete</button>
                                                                        <button type="button" class="btn btn-sm btn-success save d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Save</button>
                                                                    </td>
                                                                    <?php } ?>
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
                                <div class="col-md-1"></div>
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

<script>
    
    $(document).ready(function() {
        $('.edit').click(function() {
            $(this).closest('tr').find('.area_name, .b_branch, .sales_parson,.phone_number,.edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.areaName, .bBranch,.salesParson, .phoneNumber,.back, .save').removeClass('d-none');

        })
        $('.back').click(function() {
            $(this).closest('tr').find('.area_name, .b_branch, .sales_parson,.phone_number,.edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.areaName, .bBranch,.salesParson, .phoneNumber, .back, .save').addClass('d-none');
        })

        $('.save').click(function() {
            let thiss = $(this);
            let id = $(this).val();
            let areaName = $(this).closest('tr').find('.areaName').val();
            let branch_id = $(this).closest('tr').find('.bBranch').val();
            let sales_parson = $(this).closest('tr').find('.salesParson').val();
            let phone_number= $(this).closest('tr').find('.phoneNumber').val();
          
            $.ajax({
                url: "<?php echo route('area/save'); ?>",
                dataType: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'area_name': areaName,
                    'branch_id':branch_id,
                    'sales_parson':sales_parson,
                    'phone_number':phone_number,
                    
                },
                success: function(response) {
                    console.log(response);
                    if (response.length) {
                        console.log(response);
                        thiss.closest('tr').find('.area_name').text(response[0]['area_name']);
                        thiss.closest('tr').find('.b_branch').text(response[0]['branch_name']);
                        thiss.closest('tr').find('.phone_number').text(response[0]['phone_number']);
                        thiss.closest('tr').find('.sales_parson').text(response[0]['sales_parson']);
                        thiss.closest('tr').find('.area_name, .b_branch, .sales_parson,.phone_number,.edit, .delete').removeClass('d-none');
                        thiss.closest('tr').find('.areaName, .bBranch,.salesParson, .phoneNumber,.back, .save').addClass('d-none');
                        toastr.success("Edit Successfully");
                    } else {
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })
    })
</script>