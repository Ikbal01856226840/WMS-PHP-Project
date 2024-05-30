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
                                      <h4>User Dealer View</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                            <div class="page-header m-0 p-0 ">
                                <form action="<?php echo route('user/dealer-index'); ?>" method="GET">
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
                                <div class="col-sm-12">
                                    <!-- Zero config.table start -->
                                    <div class="card">
                                        <div class="card-header">


                                        </div>

                                        <div class="card-block">
                                            <div class="text-center">
                                                    <button type="button" id="printr" class="btn btn-primary btn-print-invoice m-b-5 btn-sm waves-effect waves-light m-r-20 print ">Print</button>
                                            </div>
                                            <div class="dt-responsive table-responsive ">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap print-demo2">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>User ID</th>
                                                            <th>Password</th>
                                                            <th>User Level</th>
                                                            <th>Dealer Code</th>
                                                            <th>Branch</th>
                                                            <th>Branch Area</th>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Status</th>
                                                            <th class=" d-print-none">Edit</th>
                                                            <th class=" d-print-none">Delete</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($users)) {
                                                            $i = 1;
                                                            // dd($users);
                                                            foreach ($users as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                        <span class="user_name">
                                                                            <?php if (!empty($row['user_name'])) echo $row['user_name']; ?>
                                                                        </span>
                                                                        <input type="text" name="username" class="form-control d-none username" value="<?php if (!empty($row['user_name'])) echo $row['user_name']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="Password">
                                                                           *********
                                                                        </span>
                                                                        <input type="password" name="password" class="form-control d-none password">
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <span class="level_id">
                                                                            <?php if (!empty($row['user_level'])) echo $row['user_level']; ?>
                                                                        </span>
                                                                        <select name="levelid" class="form-control levelid d-none d-print-none">
                                                                            <option value="0">Select</option>
                                                                            <?php
                                                                            if (!empty($userLevel)) {
                                                                                foreach ($userLevel as $lvl) { ?>
                                                                                    <option <?php echo ($row['role_id'] == $lvl['id']) ? 'selected' : ' '; ?> value="<?php if (!empty($lvl['id'])) echo $lvl['id']; ?>"><?php if (!empty($lvl['user_level'])) echo $lvl['user_level']; ?></option>
                                                                            <?php }
                                                                            } ?>
                                                                            <select>
                                                                    </td>
                                                                    <td>
                                                                        <span class="dealer_code">
                                                                            <?php if (!empty($row['dealercode'])) echo $row['dealercode']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="branch_name">
                                                                            <?php if (!empty($row['branch'])) echo $row['branch']; ?>
                                                                        </span>
                                                                        <select name="branchname" id="branchName" class="form-control branchname d-none d-print-none">
                                                                            <option value="0">Select</option>
                                                                            <?php
                                                                            if (!empty($branchs)) {
                                                                                foreach ($branchs as $brnch) { ?>
                                                                                    <option <?php echo ($row['branch'] == $brnch['name']) ? 'selected' : ' '; ?> value="<?php if (!empty($brnch['id'])) echo $brnch['id']; ?>"><?php if (!empty($brnch['name'])) echo $brnch['name']; ?></option>
                                                                            <?php }
                                                                            } ?>
                                                                            <select>
                                                                    </td>
                                                                    <td>
                                                                        <span class="area">
                                                                            <?php if (!empty($row['area_name'])) echo $row['area_name']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="full_name">
                                                                          <?php if (!empty($row['name'])) echo wordwrap( $row['name'],20, "<br>\n"); ?>
                                                                        </span>
                                                                        <input type="text" name="fullname" class="form-control d-none fullname" value="<?php if (!empty($row['name'])) echo $row['name']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="e_mail">
                                                                            <?php if (!empty($row['email'])) echo $row['email']; ?>
                                                                        </span>
                                                                        <input type="text" name="email" class="form-control d-none email" value="<?php if (!empty($row['email'])) echo $row['email']; ?>" required placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="user_phone">
                                                                            <?php if (!empty($row['user_phone'])) echo $row['user_phone']; ?>
                                                                        </span>
                                                                        <input type="text" name="userphone" class="form-control d-none userphone" value="<?php if (!empty($row['user_phone'])) echo $row['user_phone']; ?>" required placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="user_address">
                                                                           <?php if (!empty($row['address'])) echo wordwrap( $row['address'],20, "<br>\n"); ?>
                                                                        </span>
                                                                        <input type="text" name="useraddress" class="form-control d-none useraddress" value="<?php if (!empty($row['address'])) echo $row['address']; ?>" required placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="b_status">
                                                                            <?php   if (isset($row['is_active'])) echo $row['is_active'] ? 'Active ' : 'Deactivate'; ?>
                                                                        </span>
                                                                        <select name="is_active" id="" class="form-control d-none bStatus">
                                                                            <option <?php echo $row['is_active'] == 1 ? 'selected' : ' '; ?> value="1">Active</option>
                                                                            <option <?php echo $row['is_active'] == 0 ? 'selected' : ' '; ?> value="0">Deactivate</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-primary edit mr-5" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                        <button type="button" class="btn btn-sm btn-info back mr-5 d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                    </td>
                                                                    <td class="d-print-none">
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
            $(this).closest('tr').find('.user_name, .level_id, .branch_name, .full_name, .e_mail, .user_phone, .user_address,.Password,.b_status, .edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.username, .levelid, .branchname, .fullname, .email, .userphone, .useraddress,.password, .bStatus, .back, .save').removeClass('d-none');

        })
        $('.back').click(function() {
            $(this).closest('tr').find('.user_name, .level_id, .branch_name, .full_name, .e_mail, .user_phone, .user_address,.Password, .b_status,.edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.username, .levelid, .branchname, .fullname, .email, .userphone, .useraddress,.password,.bStatus, .back, .save').addClass('d-none');
        })

        $('.save').click(function() {
            let thiss = $(this);
            let id = $(this).closest('tr').find(this).val();

            let userName = $(this).closest('tr').find('.username').val();
            let  password = $(this).closest('tr').find('.password').val();
            let  is_active= $(this).closest('tr').find('.bStatus').val();
            let userLevel = $(this).closest('tr').find('.levelid').val();
            // let branchname = $('.branchname').val();
            let branchname = $(this).closest('tr').find('.branchname').val();
            let fullname = $(this).closest('tr').find('.fullname').val();
            let email = $(this).closest('tr').find('.email').val();
            let userPhone = $(this).closest('tr').find('.userphone').val();
            let address = $(this).closest('tr').find('.useraddress').val();
            $.ajax({
                url: "<?php echo route('user/save'); ?>",
                dataType: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'fullName': fullname,
                    'password':password,
                    'emailAddress': email,
                    'userName': userName,
                    'userLevel': userLevel,
                    'userPhone': userPhone,
                    'address': address,
                    'branchName': branchname,
                    'is_active':is_active
                },
                success: function(response) {
                    if (response.length) {
                        toastr.success("Edit Successfully");
                        thiss.closest('tr').find('.user_name').text(response[0]['user_name']);
                        thiss.closest('tr').find('.Password').text('*********');
                        thiss.closest('tr').find('.b_status').text(response[0]['is_active']== 1 ? 'Active' : 'Deactivate');
                        thiss.closest('tr').find('.level_id').text(response[0]['role_id']);
                        thiss.closest('tr').find('.branch_name').text(response[0]['branch']);
                        thiss.closest('tr').find('.full_name').text(response[0]['name']);
                        thiss.closest('tr').find('.e_mail').text(response[0]['email']);
                        thiss.closest('tr').find('.user_phone').text(response[0]['user_phone']);
                        thiss.closest('tr').find('.user_address').text(response[0]['address']);

                        thiss.closest('tr').find('.user_name, .level_id, .branch_name, .full_name, .e_mail, .user_phone, .user_address,.Password,.b_status, .edit, .delete').removeClass('d-none');
                        thiss.closest('tr').find('.username, .levelid, .branchname, .fullname, .email, .userphone, .useraddress,.bStatus,.password, .back, .save').addClass('d-none');
                    } else {
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })

    })
</script>