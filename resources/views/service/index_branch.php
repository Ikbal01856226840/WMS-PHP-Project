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
                                        <h4>Service Branch List</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <!-- <div class="col-md-1"></div> -->
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
                                                <table  id="simpletable" class="table table-striped table-bordered nowrap print-demo2">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>SL</th>
                                                            <th>Service Center Name</th>
                                                            <th>Branch Name</th>
                                                            <th>Status</th>
                                                            <th>Address</th>
                                                            <th>Thana</th>
                                                            <th>District</th>
                                                            <th>Near Area</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th  class=" d-print-none">Edit</th>
                                                            <th class=" d-print-none">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($data)) {
                                                            $i = 1;
                                                            foreach ($data as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                        <span class="service_center_name">
                                                                            <?php if (!empty($row['service_center_name'])) echo $row['service_center_name']; ?>
                                                                        </span>
                                                                        <input type="text" name="service_center_name" class="form-control d-none serviceCenterName" value="<?php if (!empty($row['service_center_name'])) echo $row['service_center_name']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="branch_name">
                                                                            <?php if (!empty($row['name'])) echo $row['name']; ?>
                                                                        </span>
                                                                        <select name="branch_id" class="form-control branchname d-none" id="branchname" required>
                                                                            <?php
                                                                            if (!empty($branchs)) {
                                                                                foreach ($branchs as $branch) { ?>
                                                                                    <option value="<?php if (!empty($branch['id'])) echo $branch['id']; ?>"><?php if (!empty($branch['name'])) echo $branch['name']; ?></option>
                                                                            <?php }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <span class="b_status">
                                                                            <?php if (isset($row['status'])) echo $row['status'] ? 'Yes' : 'No'; ?>
                                                                        </span>
                                                                        <select name="bstatus" id="" class="form-control d-none bstatus">
                                                                            <option <?php echo $row['status'] == 1 ? 'selected' : ' '; ?> value="1">Yes</option>
                                                                            <option <?php echo $row['status'] == 0 ? 'selected' : ' '; ?> value="0">No</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <span class="b_address">
                                                                   
                                                                            <?php if (!empty($row['address']))  echo wordwrap( $row['address'], 20, "<br>\n") ?>
                                                                        </span>
                                                                        <input type="text" name="address" class="form-control d-none baddress" value="<?php if (!empty($row['address'])) echo $row['address']; ?>" placeholder="">
                                                                       
                                                                    </td>
                                                                    <td>
                                                                        <span class="Thana">
                                                                            <?php if (!empty($row['thana'])) echo $row['thana']; ?>
                                                                        </span>
                                                                        <input type="text" name="thana" class="form-control d-none thana" value="<?php if (!empty($row['thana'])) echo $row['thana']; ?>" placeholder="">
                                                                       
                                                                    </td>
                                                                    <td>
                                                                        <span class="District">
                                                                            <?php if (!empty($row['District'])) echo $row['District']; ?>
                                                                        </span>
                                                                        <input type="text" name="District" class="form-control d-none district" value="<?php if (!empty($row['thana'])) echo $row['thana']; ?>" placeholder="">
                                                                       
                                                                    </td>
                                                                    <td>
                                                                        <span class="near_area">
                                                                            <?php if (!empty($row['near_area']))  echo wordwrap($row['near_area'], 30, "<br>\n",true) ?>
                                                                        </span>
                                                                        <input type="text" name="near_area" class="form-control d-none nearArea" value="<?php if (!empty($row['near_area'])) echo $row['near_area']; ?>" placeholder="">
                                                                       
                                                                    </td>
                                                                    <td>
                                                                        <span class="Email">
                                                                            <?php if (!empty($row['email'])) echo $row['email']; ?>
                                                                        </span>
                                                                        <input type="text" name="email" class="form-control d-none email" value="<?php if (!empty($row['email'])) echo $row['email']; ?>" placeholder="">
                                                                       
                                                                    </td>
                                                                    <td>
                                                                        <span class="Phone">
                                                                            <?php if (!empty($row['Phone1'])) echo $row['Phone1']; ?>
                                                                        </span>
                                                                        <input type="text" name="Phone1" class="form-control d-none phone" value="<?php if (!empty($row['Phone1'])) echo $row['Phone1']; ?>" placeholder="">
                                                                       
                                                                    </td>

                                                                    <td  class=" d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-primary edit mr-5" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                        <button type="button" class="btn btn-sm btn-info back mr-5 d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                    </td>
                                                                    <td class=" d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-danger delete" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Delete</button>
                                                                        <button type="button" class="btn btn-sm btn-success save d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Save</button>
                                                                    </td>
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
            $(this).closest('tr').find('.service_center_name,.branch_name, .b_address, .b_status,.Thana,.District, .near_area,.Email,.Phone,.edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.serviceCenterName,.branchname, .baddress, .bstatus, .back,.thana,.district,.nearArea,.email,.phone, .save').removeClass('d-none');

        })
        $('.back').click(function() {
            $(this).closest('tr').find('.service_center_name,.branch_name, .b_address, .b_status,.Thana,.District,.near_area,.Email,.Phone,.edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.serviceCenterName,.branchname,.baddress, .bstatus, .back,.thana,.district,.nearArea,.email,.phone, .save').addClass('d-none');
        })

        $('.save').click(function() {
            let thiss = $(this);
            let id = $(this).val();
            let serviceCenterName = $(this).closest('tr').find('.serviceCenterName').val();
            let branchname = $(this).closest('tr').find('.branchname').val();
            let Active = $(this).closest('tr').find('.bstatus').val();
            let Address = $(this).closest('tr').find('.baddress').val();
            let thana = $(this).closest('tr').find('.thana').val();
            let district = $(this).closest('tr').find('.district').val();
            let near_area = $(this).closest('tr').find('.nearArea').val();
            let email= $(this).closest('tr').find('.email').val();
            let phone= $(this).closest('tr').find('.phone').val();
            $.ajax({
                url: "<?php echo route('service/branch/save'); ?>",
                dataType: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'service_center_name': serviceCenterName,
                    'branch_id':branchname,
                    'Address': Address,
                    'Active': Active,
                    'thana': thana,
                    'District':district,
                    'near_area':near_area,
                    'Email':email,
                    'Phone1':phone

                },
                success: function(response) {
                    if (response.length) {
                        console.log(response);
                        thiss.closest('tr').find('.service_center_name').text(response[0]['service_center_name']);
                        thiss.closest('tr').find('.branch_name').text(response[0]['name']);
                        thiss.closest('tr').find('.b_address').text(response[0]['address']);
                        thiss.closest('tr').find('.b_status').text((response[0]['status'] == 1 ? 'Yes' : 'No'));
                        thiss.closest('tr').find('.Thana').text(response[0]['thana']);
                        thiss.closest('tr').find('.District').text(response[0]['District']);
                        thiss.closest('tr').find('.near_area').text(response[0]['near_area']);
                        thiss.closest('tr').find('.Email').text(response[0]['email']);
                        thiss.closest('tr').find('.Phone').text(response[0]['Phone1']);
                        thiss.closest('tr').find('.service_center_name,.branch_name, .b_address, .b_status,.Thana,.District,.near_area,.Email,.Phone, .edit, .delete').removeClass('d-none');
                        thiss.closest('tr').find('.serviceCenterName,.branchname, .baddress, .bstatus,.thana, .back,.district,.nearArea,.email,.phone, .save').addClass('d-none');
                        toastr.success("Edit Successfully");
                    } else {
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })
    })
</script>