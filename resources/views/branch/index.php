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
                                        <h4>Branch List</h4>
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
                                                <table id="simpletable"  class="table table-striped table-bordered nowrap print-demo2">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>SL</th>
                                                            <th>Branch Name</th>
                                                            <th>Address</th>
                                                            <th>Phone Number One</th>
                                                            <th>Phone Number Two</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
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
                                                                        <span class="branch_name">
                                                                            <?php if (!empty($row['name'])) echo $row['name']; ?>
                                                                        </span>
                                                                        <input type="text" name="branchname" class="form-control d-none branchname" value="<?php if (!empty($row['name'])) echo $row['name']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="b_address">
                                                                            <?php if (!empty($row['address'])) echo $row['address']; ?>
                                                                        </span>
                                                                        <input type="text" name="baddress" class="form-control d-none baddress" value="<?php if (!empty($row['address'])) echo $row['address']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="phone_number_1">
                                                                            <?php if (!empty($row['phone_number_one'])) echo $row['phone_number_one']; ?>
                                                                        </span>
                                                                        <input type="text" name="phone_number_one" class="form-control d-none phone_number_one" value="<?php if (!empty($row['phone_number_one'])) echo $row['phone_number_one']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="phone_number_2">
                                                                            <?php if (!empty($row['phone_number_two'])) echo $row['phone_number_two']; ?>
                                                                        </span>
                                                                        <input type="text" name="phone_number_two" class="form-control d-none phone_number_two" value="<?php if (!empty($row['phone_number_two'])) echo $row['phone_number_two']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="email_1">
                                                                            <?php if (!empty($row['email'])) echo $row['email']; ?>
                                                                        </span>
                                                                        <input type="text" name="email" class="form-control d-none email" value="<?php if (!empty($row['email'])) echo $row['email']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="b_status">
                                                                            <?php if (isset($row['status'])) echo $row['status'] ? 'Yes' : 'No'; ?>
                                                                        </span>
                                                                        <select name="bstatus" id="" class="form-control d-none bstatus d-print-none">
                                                                            <option <?php echo $row['status'] == 1 ? 'selected' : ' '; ?> value="1">Yes</option>
                                                                            <option <?php echo $row['status'] == 0 ? 'selected' : ' '; ?> value="0">No</option>
                                                                        </select>
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
                                                                  <?php }?>
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
            $(this).closest('tr').find('.branch_name, .b_address, .email_1,.phone_number_1,.phone_number_2 ,.b_status, .edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.branchname, .baddress,.email, .phone_number_one,.phone_number_two,.bstatus, .back, .save').removeClass('d-none');

        })
        $('.back').click(function() {
            $(this).closest('tr').find('.branch_name, .b_address, .email_1,.phone_number_1,.phone_number_2 , .b_status, .edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.branchname, .baddress,.email, .phone_number_one,.phone_number_two, .bstatus, .back, .save').addClass('d-none');
        })

        $('.save').click(function() {
            let thiss = $(this);
            let id = $(this).val();
            let BranchName = $(this).closest('tr').find('.branchname').val();
            let Address = $(this).closest('tr').find('.baddress').val();
            let phone_number_one = $(this).closest('tr').find('.phone_number_one').val();
            let phone_number_two = $(this).closest('tr').find('.phone_number_two').val();
            let email = $(this).closest('tr').find('.email').val();
            let Active = $(this).closest('tr').find('.bstatus').val();
            $.ajax({
                url: "<?php echo route('branch/save'); ?>",
                dataType: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'BranchName': BranchName,
                    'Address': Address,
                    'Active': Active,
                    'phone_number_one':phone_number_one,
                    'phone_number_two':phone_number_two,
                    'email':email
                },
                success: function(response) {
                    if (response.length) {
                        console.log(response);
                        thiss.closest('tr').find('.branch_name').text(response[0]['name']);
                        thiss.closest('tr').find('.b_address').text(response[0]['address']);
                        thiss.closest('tr').find('.phone_number_1').text(response[0]['phone_number_one']);
                        thiss.closest('tr').find('.phone_number_2').text(response[0]['phone_number_two']);
                        thiss.closest('tr').find('.email_1').text(response[0]['email']);
                        thiss.closest('tr').find('.b_status').text((response[0]['status'] == 1 ? 'Yes' : 'No'));
                        thiss.closest('tr').find('.branch_name, .b_address, .b_status, .edit, .delete').removeClass('d-none');
                        thiss.closest('tr').find('.branchname, .baddress, .bstatus, .back, .save').addClass('d-none');
                        toastr.success("Edit Successfully");
                    } else {
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })
    })
</script>