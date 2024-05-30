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
                                        <h4>Stock Group List</h4>
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
                                                            <th>Name</th>
                                                            <th>Alise</th>
                                                            <th>Warranty Period</th>
                                                            <th>Warranty Code</th>
                                                            <th>Sales Expire Date</th>
                                                            <th>Under</th>
                                                            <th>QtyAdd</th>
                                                            <!-- <th>Description</th> -->
                                                            <th class="d-print-none">Edit</th>
                                                            <th class="d-print-none">Delete</th>
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
                                                                        <span class="prd_name">
                                                                            <?php if (!empty($row['name'])) echo $row['name']; ?>
                                                                        </span>
                                                                        <input type="text" name="prdname" class="form-control d-none prdname" value="<?php if (!empty($row['name'])) echo $row['name']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="prd_alise">
                                                                            <?php if (!empty($row['alias'])) echo $row['alias']; ?>
                                                                        </span>
                                                                        <input type="text" name="prdalise" class="form-control d-none prdalise" value="<?php if (!empty($row['alias'])) echo $row['alias']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="prd_warrantry_period">
                                                                            <?php if (!empty($row['warrantry_period'])) echo $row['warrantry_period'].' Months'; ?>
                                                                        </span>
                                                                        <select name="warrantry_period" class="form-control warrantry_period d-none" required>
                                                                            <option <?php echo ($row['warrantry_period'] ==3) ? 'selected' : ' '; ?> value="3">3 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 6) ? 'selected' : ' '; ?> value="6">6 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 9) ? 'selected' : ' '; ?> value="9">9 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 12) ? 'selected' : ' '; ?> value="12">12 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 15) ? 'selected' : ' '; ?> value="15">15 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 18) ? 'selected' : ' '; ?> value="18">18 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 21) ? 'selected' : ' '; ?> value="21">21 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 24) ? 'selected' : ' '; ?> value="24">24 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 30) ? 'selected' : ' '; ?> value="30">24 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 36) ? 'selected' : ' '; ?> value="36">24 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 40) ? 'selected' : ' '; ?> value="40">24 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 40) ? 'selected' : ' '; ?> value="40">24 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 48) ? 'selected' : ' '; ?> value="48">24 Months</option>
                                                                            <option <?php echo ($row['warrantry_period'] == 60) ? 'selected' : ' '; ?> value="60">60 Months</option>
                                                                        </select>
                                                                       
                                                                    </td>
                                                                    <td>
                                                                        <span class="prd_stock_group_code">
                                                                            <?php if (!empty($row['stock_group_code'])) echo $row['stock_group_code']; ?>
                                                                        </span>
                                                                        <input type="text" name="stock_group_code" class="form-control d-none stock_group_code" value="<?php if (!empty($row['stock_group_code'])) echo $row['stock_group_code']; ?>" placeholder="">
                                                                    </td>
                                                                   <td>
                                                                        <span class="prd_sales_expire_date">
                                                                            <?php if (!empty($row['sales_expire_date'])) echo $row['sales_expire_date']; ?>
                                                                        </span>
                                                                        <input type="text" name="sales_expire_date" class="form-control d-none sales_expire_date" value="<?php if (!empty($row['sales_expire_date'])) echo $row['sales_expire_date']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="under_name">
                                                                            <?php if (!empty($row['underName'])) echo $row['underName'];
                                                                            else echo 'Primary'; ?>
                                                                        </span>
                                                                        <select name="undername" class="form-control undername d-none d-print-none">
                                                                            <option value="0">Primary</option>
                                                                            <?php
                                                                            if (!empty($data)) {
                                                                                foreach ($data as $under) { ?>
                                                                                    <option <?php echo ($row['under'] == $under['id']) ? 'selected' : ' '; ?> value="<?php if (!empty($under['id'])) echo $under['id']; ?>"><?php if (!empty($under['name'])) echo $under['name']; ?></option>
                                                                            <?php }
                                                                            } ?>
                                                                            <select>
                                                                    </td>

                                                                    <td>
                                                                        <span class="add_qty">
                                                                            <?php if (!empty($row['qty_add_per'])) echo $row['qty_add_per'] == 0 ? 'No' : 'Yes'; ?>
                                                                        </span>
                                                                        <select name="addqty" id="" class="form-control d-none addqty d-print-none" required>
                                                                            <option <?php echo ($row['qty_add_per'] == 1) ? 'selected' : ' '; ?> value="1">Yes</option>
                                                                            <option <?php echo ($row['qty_add_per'] == 0) ? 'selected' : ' '; ?> value="0">No</option>
                                                                        </select>
                                                                    </td>
                                                                    <!-- <td>
                                                                        <span class="descriptione_id">
                                                                            <?php if (!empty($row['description'])) echo $row['description']; ?>
                                                                        </span>
                                                                        <input type="text" name="description" class="form-control d-none description" value="<?php if (!empty($row['description'])) echo $row['description']; ?>" placeholder="">
                                                                    </td> -->
                                                                    
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


<script type="text/javascript">
    $(document).ready(function() {
        $('.edit').click(function() {
            $(this).closest('tr').find('.prd_name,.prd_stock_group_code,.prd_warrantry_period, .prd_alise,.prd_sales_expire_date, .under_name, .add_qty,.descriptione_id,.edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.prdname,.stock_group_code,.warrantry_period, .prdalise,.sales_expire_date, .undername, .addqty,.description,.back, .save').removeClass('d-none');

        })
        $('.back').click(function() {
            $(this).closest('tr').find('.prd_name,prd_stock_group_code,.prd_warrantry_period, .prd_alise,.prd_sales_expire_date, .under_name, .add_qty,.descriptione_id, .edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.prdname,stock_group_code,.warrantry_period, .prdalise,.sales_expire_date, .undername, .addqty,.description, .back, .save').addClass('d-none');
        })

        $('.save').click(function() {
            let thiss = $(this);
            let id = $(this).val();
            let stockGroup = $(this).closest('tr').find('.prdname').val();
            let stock_group_code = $(this).closest('tr').find('.stock_group_code').val();
            let warrantry_period = $(this).closest('tr').find('.warrantry_period').val();
            let prdalise = $(this).closest('tr').find('.prdalise').val();
            let under = $(this).closest('tr').find('.undername').val();
            let qtyAdd = $(this).closest('tr').find('.addqty').val();
            let description = $(this).closest('tr').find('.description').val();
            let sales_expire_date = $(this).closest('tr').find('.sales_expire_date').val();
            $.ajax({
                url: "<?php echo route('stockGroup/save'); ?>",
                dataType: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'stockGroup': stockGroup,
                    'stock_group_code':stock_group_code,
                    'warrantry_period':warrantry_period,
                    'alias':prdalise,
                    'under': under,
                    'qtyAdd': qtyAdd,
                    'description': description,
                    'sales_expire_date': sales_expire_date
                },
                success: function(response) {
                    
                    if (response.length) {
                        toastr.success("Edit Successfully");
                        thiss.closest('tr').find('.prd_name').text(response[0]['name']);
                        thiss.closest('tr').find('.prd_stock_group_code').text(response[0]['stock_group_code']);
                        thiss.closest('tr').find('.prd_warrantry_period').text(response[0]['warrantry_period']+' Months');
                        thiss.closest('tr').find('.prd_alise').text(response[0]['alise']);
                        thiss.closest('tr').find('.prd_sales_expire_date').text(response[0]['sales_expire_date']);
                        thiss.closest('tr').find('.under_name').text((response[0]['underName'] ? response[0]['underName'] : 'Primary'));
                        thiss.closest('tr').find('.add_qty').text(response[0]['qty_add_per'] ? 'Yes' : 'No');
                        thiss.closest('tr').find('.descriptione_id').text(response[0]['description']);
                        thiss.closest('tr').find('.prd_name,.prd_stock_group_code,.prd_warrantry_period,.prd_alise,.prd_sales_expire_date, .under_name, .add_qty,.descriptione_id, .edit, .delete').removeClass('d-none');
                        thiss.closest('tr').find('.prdname,.stock_group_code,.warrantry_period, .prdalise,.sales_expire_date, .undername, .addqty,.description, .back, .save').addClass('d-none');
                    } else {
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })

    })
</script>