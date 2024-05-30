<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body mt-5">
                            <div class="row">
                                <div class="page-header m-0 p-0 ">
                                    <form action="<?php echo route('phoner_number/view'); ?>" method="POST">
                                        <div class="row ">
                                            <div class="form-group col-md-2">
                                                <label>Branch</label>
                                                <select name="branch_id" class="form-control js-example-basic-single branch_id">
                                                    <?php if ((session('user_lavel') == 2) || (session('user_lavel') == 4) || (session('user_lavel') == 8)) {
                                                        echo "<option value='" . $branchs[0]['id'] . "'>ALL</option>";                                                                
                                                    }else{ ?>
                                                    <option value="All">ALL</option>                                                            
                                                    <?php }?>
                                                    <?php if (!empty($branchs)) {
                                                        foreach ($branchs as $row) { ?>
                                                            <option <?php if (!empty($branch_id)) { echo $branch_id == $row['id']  ? 'selected' : ''; } ?> value="<?php echo $row['id']; ?>">
                                                                <?php echo $row['name']; ?>
                                                            </option>
                                                    <?php }
                                                      } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <input type="hidden" name="user_lavel" class="form-control user_lavel" value="<?php echo session('user_lavel'); ?>" placeholder="" required>
                                                <label>User</label>
                                                <select name="user_id" class="form-control js-example-basic-single user_id">
                                                    <option value="0">Select</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 ">
                                                <label>Stock Group</label>
                                                <select name="stock_group_id" class="form-control js-example-basic-single stock_group_id">
                                                    <option <?php if (!empty($stock_group_id)) { echo $stock_group_id == 0 ? 'selected' : ''; } ?> value="0">ALL</option>
                                                    <?php foreach ($stocks as $stock) { ?>
                                                        <option <?php if (!empty($stock_group_id)) { echo $stock_group_id == $stock['id']  ? 'selected' : ''; } ?> value="<?php echo $stock['id']; ?>">
                                                            <?php echo $stock['name']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-1 ">
                                                <label>Brand</label>
                                                <select name="brand" class="form-control js-example-basic-single ">
                                                    <option <?php if (!empty($brand_get)) { echo $brand_get == 0 ? 'selected' : ''; } ?> value="0">ALL</option>
                                                    <option <?php if (!empty($brand_get)) { echo $brand_get == 'Hamko' ? 'selected' : ''; } ?> value="Hamko">Hamko</option>
                                                    <option <?php if (!empty($brand_get)) { echo $brand_get == 'Others Brand' ? 'selected' : ''; } ?> value="Others Brand">Other Brand</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 ">
                                                <label>Number Type</label>
                                                <select name="phone_type" class="form-control js-example-basic-single ">
                                                    <option <?php if (!empty($phone_type_get)) { echo $phone_type_get == 0 ? 'selected' : ''; } ?> value="0">ALL</option>
                                                    <option <?php if (!empty($phone_type_get)) { echo $phone_type_get == 'Owner' ? 'selected' : ''; } ?> value="Owner">Owner</option>
                                                    <option <?php if (!empty($phone_type_get)) { echo $phone_type_get == 'User/Driver' ? 'selected' : ''; } ?> value="User/Driver">User/Driver</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Date From</label>
                                                <div class="form-group mt-2">
                                                    <input type="date" name="from_date" value="<?php if (!empty($from_date)) { echo $from_date; } else { echo date('Y-m-d'); } ?>" class="form-control" min="2022-12-01" />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Date To</label>
                                                <div class="form-group mt-2">
                                                    <input type="date" name="to_date" value="<?php if (!empty($to_date)) { echo $to_date; } else { echo date('Y-m-d'); } ?>" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label></label>
                                                <div class="form-group">
                                                    <button type="submit" class="btn hor-grd btn-grd-primary  float-right submit" style="width:100%;display: block;float:right;">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-md-12">
                                        <!-- Zero config.table start -->
                                        <div class="card">
                                            <div class="card-header">
                                            </div>
                                            <div class="card-block">
                                                <?php if (!empty($tasks)) { ?>
                                                    <div class="dt-responsive table-responsive warrenty_card_div">
                                                        <table id="phone_id" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>SL</th>
                                                                    <th>Stock Group</th>
                                                                    <th>Alias</th>
                                                                    <th>Brand</th>
                                                                    <th>Phone Number User Type</th>
                                                                    <th>Phone Number</th>
                                                                    <th>Customer Name</th>
                                                                    <th>Location</th>
                                                                    <th>Entry Date</th>
                                                                    <th>User</th>
                                                                    <?php if (session('user_lavel') == 1) { ?>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($tasks as $key => $row) { ?>
                                                                    <tr>
                                                                        <td><?php echo $key + 1 ?></td>
                                                                        <td><?php if (!empty($row['group_name'])) {
                                                                                echo wordwrap($row['group_name'], 20, "<br>\n");
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['alias'])) {
                                                                                echo wordwrap($row['alias'], 20, "<br>\n");
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['brand'])) {
                                                                                echo wordwrap($row['brand'], 20, "<br>\n");
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['phone_type'])) {
                                                                                echo wordwrap($row['phone_type'], 20, "<br>\n");
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['phone_number'])) {
                                                                                echo '+88' . ($row['phone_number']);
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['customer_name'])) {
                                                                                echo wordwrap($row['customer_name'], 20, "<br>\n");
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['location'])) {
                                                                                echo wordwrap($row['location'], 20, "<br>\n");
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['phone_entry_date'])) {
                                                                                echo date('d M, Y', strtotime($row['phone_entry_date']));
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['UserName'])) {
                                                                                echo wordwrap($row['UserName'], 20, "<br>\n");
                                                                            } ?></td>
                                                                        <?php if (session('user_lavel') == 1) { ?>
                                                                            <td><button type="button" class="btn btn-primary edit btn-sm" name="edit" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button></td>
                                                                            <td><button type="button" class="btn btn-danger btn-sm delete" name="delete" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Delete</button></td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="noData">
                                                        <h4>there is no data!</h4>
                                                    </div>
                                                <?php } ?>
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


    <script>
        $(document).ready(function() {
            $('.pcoded-inner-content').css('min-height', $(document).height() - 50);
            $('#phone_id').DataTable({
                paging: false,
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',

                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },

                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                ]
            });
        });
        $('.edit').click(function() {
            $('.editModal').show();
            let id = $(this).val();
            console.log('Checking');
            console.log(id);

            let url = "<?php echo route('phoner_number/edit/') ?>" + id;
            $('.editApprove').click(function() {
                location.replace(url);
            })
        })

        $('.deleteApprove').click(function() {
            $('.deleteModal').hide();
            $.ajax({
                url: "<?php echo route('phoner_number/delete') ?>",
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function(response) {
                    if (response == 1) {
                        // thisBtn.delete();
                        toastr.success("Delect Success");
                    }
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            var branch_id = $('.branch_id').val();
            var user_lavel = $('.user_lavel').val();
            get_user(branch_id, user_lavel);
        });
        $('.branch_id').on(' change', function() {
            var branch_id = $('.branch_id').val();
            var user_lavel = $('.user_lavel').val();
            get_user(branch_id, user_lavel);

        });

        function get_user(branch_id = null, user_lavel = null) {
            var selected_user = "<?php echo $user_id;?>";
            $.ajax({
                url: "<?php echo route('task/user') ?>",
                type: "GET",
                data: {
                    "branch_id": branch_id
                },
                dataType: "json",
                success: function(data) {

                    if (user_lavel != 4) {
                        $('.user_id').html('<option value="All">ALL</option>');
                    } else {
                        $('.user_id').html('<option value="0">Select Name</option>');
                    }

                    $.each(data, function(key, value) {
                        $(".user_id").append('<option '+ (selected_user == value.id ? "selected" : "" )+' value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        }
    </script>