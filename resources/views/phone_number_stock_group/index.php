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
                                        <h4>Number Stock Group List</h4>
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
                                                <table id="simpletable" class="table table-striped table-bordered nowrap  print-demo2">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Name</th>
                                                            <th>Alias</th>
                                                            <th>Under</th>
                                                            <th>QtyAdd</th>
                                                            <th class=" d-print-none">Edit</th>
                                                            <th class=" d-print-none">Delete</th>
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
                                                                        <span class="under_name">
                                                                            <?php if (!empty($row['underName'])) echo $row['underName']; else echo 'Primary';?>
                                                                        </span>
                                                                        <select name="undername" class="form-control undername d-none  d-print-none">
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
                                                                    <td class=" d-print-none">
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
            $(this).closest('tr').find('.prd_name, .prd_alise, .under_name, .add_qty, .edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.prdname, .prdalise, .undername, .addqty, .back, .save').removeClass('d-none');

        })
        $('.back').click(function() {
            $(this).closest('tr').find('.prd_name, .prd_alise, .under_name, .add_qty, .edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.prdname, .prdalise, .undername, .addqty, .back, .save').addClass('d-none');
        })

        $('.save').click(function(){
            let thiss=$(this);
            let id =$(this).val();
            let stockGroup=$(this).closest('tr').find('.prdname').val();
            let alias=$(this).closest('tr').find('.prdalise').val();
            let under=$(this).closest('tr').find('.undername').val();
            let qtyAdd=$(this).closest('tr').find('.addqty').val();
            $.ajax({
                url: "<?php echo route('phone_number/stock/save');?>",
                dataType:"JSON",
                method:"POST",
                data: {
                    'id':id,
                    'stockGroup':stockGroup,
                    'alias':alias,
                    'under':under,
                    'qtyAdd':qtyAdd
                },
                success: function(response){
                    if(response.length){
                        toastr.success("Edit Successfully");
                        thiss.closest('tr').find('.prd_name').text(response[0]['name']);
                        thiss.closest('tr').find('.prd_alise').text(response[0]['alias']);
                        thiss.closest('tr').find('.under_name').text((response[0]['underName']?response[0]['underName']:'Primary'));
                        thiss.closest('tr').find('.add_qty').text(response[0]['qty_add_per']?'Yes' : 'No');
                    
                        thiss.closest('tr').find('.prd_name, .prd_alise, .under_name, .add_qty, .edit, .delete').removeClass('d-none');
                        thiss.closest('tr').find('.prdname, .prdalise, .undername, .addqty, .back, .save').addClass('d-none');
                    }else{
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })

    })
</script>
