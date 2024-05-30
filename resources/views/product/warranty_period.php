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
                                        <h4>Warrenty Period List</h4>
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
                                                            <th>Warrenty Period</th>
                                                            <th>Warrenty Code</th>
                                                            <th>Warrenty Note</th>
                                                            <th class=" d-print-none">Edit</th>
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
                                                                        <span class="d_value">
                                                                            <?php if (!empty($row['value'])) echo $row['value'].' Months'; ?>
                                                                        </span>
                                                                        <select name="value" class="form-control value d-none" required>
                                                                            <option <?php echo ($row['value'] ==3) ? 'selected' : ' '; ?> value="3">3 Months</option>
                                                                            <option <?php echo ($row['value'] == 6) ? 'selected' : ' '; ?> value="6">6 Months</option>
                                                                            <option <?php echo ($row['value'] == 9) ? 'selected' : ' '; ?> value="9">9 Months</option>
                                                                            <option <?php echo ($row['value'] == 12) ? 'selected' : ' '; ?> value="12">12 Months</option>
                                                                            <option <?php echo ($row['value'] == 15) ? 'selected' : ' '; ?> value="15">15 Months</option>
                                                                            <option <?php echo ($row['value'] == 18) ? 'selected' : ' '; ?> value="18">18 Months</option>
                                                                            <option <?php echo ($row['value'] == 21) ? 'selected' : ' '; ?> value="21">21 Months</option>
                                                                            <option <?php echo ($row['value'] == 24) ? 'selected' : ' '; ?> value="24">24 Months</option>
                                                                        </select>
                                                                    </td>
                                                                   
                                                                    <td>
                                                                        <span class="d_code">
                                                                            <?php if (!empty($row['code'])) echo $row['code']; ?>
                                                                        </span>
                                                                        <input type="text" name="code" class="form-control d-none code" value="<?php if (!empty($row['code'])) echo $row['code']; ?>" placeholder="" >
                                                                    </td>
                                                                    <td>
                                                                        <span class="d_note">
                                                                            <?php if (!empty($row['note'])) echo $row['note']; ?>
                                                                        </span>
                                                                        <input type="text" name="note" class="form-control d-none note" value="<?php if (!empty($row['note'])) echo $row['note']; ?>" placeholder="" >
                                                                    </td>
                                                                    
                                                                    <td class=" d-print-none">
                                                                        <button class="btn btn-sm btn-primary mr-5 edit" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                        <button class="btn btn-sm btn-primary mr-5 back d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                    </td>
                                                                    <td class=" d-print-none">
                                                                        <button class="btn btn-sm btn-danger delete" value="<?php if(!empty($row['id'])) echo $row['id']; ?>">Delete</button>
                                                                        <button class="btn btn-sm btn-info mr-5 save d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Save</button>
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
    $(document).ready(function(){
        $('.edit').click(function(){
            $(this).closest('tr').find('.d_value,.d_code,.d_note, .edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.value, .code,.note, .back, .save').removeClass('d-none');  
        })
        $('.back').click(function(){
            $(this).closest('tr').find('.d_value,.d_code, .d_note,.edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.value,.code,.note, .back, .save').addClass('d-none');
        })
        $('.save').click(function(){
            let thiss=$(this);
            let id =$(this).val();
            let value=$(this).closest('tr').find('.value').val();
            let code=$(this).closest('tr').find('.code').val();
            let note=$(this).closest('tr').find('.note').val();
            $.ajax({
                url: "<?php echo route('product/warranty/period_store');?>",
                dataType:"JSON",
                method:"POST",
                data: {
                    'id':id,
                    'value':value,
                    'code':code,
                    'note':note

                },
                success: function(response){
                    if(response.length){
                        toastr.success("Edit Successfully");
                        thiss.closest('tr').find('.d_value').text(response[0]['value']+' Months');
                        thiss.closest('tr').find('.d_code').text(response[0]['code']);
                        thiss.closest('tr').find('.d_note').text(response[0]['note']);
                    thiss.closest('tr').find('.d_value, .d_code,.d_note, .edit, .delete').removeClass('d-none');
                    thiss.closest('tr').find('.value,  .code,note, .back, .save').addClass('d-none');
                    }else{
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })

    })
</script>