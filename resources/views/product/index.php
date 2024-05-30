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
                                        <h4>Stock Item List</h4>
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
                                                            <!-- <th>Product Group</th>-->
                                                            <th>Battery Type</th> 
                                                            <th>Batch No</th>
                                                            <th>Units</th>
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
                                                                    <!-- <td>
                                                                        <span class="Prd_stockGroup">
                                                                            <?php if (!empty($row['sgname'])) echo $row['sgname']; ?>
                                                                        </span>
                                                                        <select name="stockGroup" class="form-control stockGroup d-none  d-print-none" >
                                                                            <option value="0">Select</option>
                                                                            <?php
                                                                            if (!empty($stockGroup)) {
                                                                                foreach ($stockGroup as $sto) { ?>
                                                                                    <option <?php echo ($row['stock_group']==$sto['id'])?'selected':' '; ?> value="<?php if (!empty($sto['id'])) echo $sto['id']; ?>"><?php if (!empty($sto['name'])) echo $sto['name']; ?></option>
                                                                            <?php }
                                                                            } ?>
                                                                        <select>
                                                                    </td>-->
                                                                    <td>
                                                                        <span class="Prd_name">
                                                                        <?php if (!empty($row['name'])) echo $row['name']; ?>
                                                                        </span>
                                                                        <input type="text" name="name" class="form-control d-none name" value="<?php if (!empty($row['name'])) echo $row['name']; ?>" >
                                                                    </td> 
                                                                    <!-- <td>
                                                                        <span class="product_short_name">
                                                                            <?php if (!empty($row['product_short_name'])) echo $row['product_short_name']; ?>
                                                                        </span>
                                                                        <input type="text" name="productId" class="form-control d-none productShortName" value="<?php if (!empty($row['product_short_name'])) echo $row['product_short_name']; ?>" placeholder="" >
                                                                    </td> -->
                                                                    <td>
                                                                        <span class="Prd_batch_no">
                                                                            <?php if (!empty($row['batch_no'])) echo $row['batch_no']; ?>
                                                                        </span>
                                                                        <input type="text" name="batch_no" class="form-control d-none batch_no" value="<?php if (!empty($row['batch_no'])) echo $row['batch_no']; ?>" >
                                                                    </td>
                                                                    <td>
                                                                        <span class="Prd_unit">
                                                                            <?php if (!empty($row['unit'])) echo $row['unit']; ?>
                                                                        </span>
                                                                        <input type="text" name="unit" class="form-control d-none unit" value="<?php if (!empty($row['unit'])) echo $row['unit']; ?>">
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
            $(this).closest('tr').find(' .Prd_name, .Prd_company,  .Prd_warranty, .Prd_batch_no, .Prd_unit, .edit, .delete').addClass('d-none');
            $(this).closest('tr').find(' .name, .warranty, .batch_no, .unit, .back, .save').removeClass('d-none');  
        })
        $('.back').click(function(){
            $(this).closest('tr').find(' .Prd_name, .Prd_company,  .Prd_warranty, .Prd_batch_no, .Prd_unit, .edit, .delete').removeClass('d-none');
            $(this).closest('tr').find(' .name,  .warranty, .batch_no, .unit, .back, .save').addClass('d-none');
        })
        $('.save').click(function(){
            let thiss=$(this);
            let id =$(this).val();

            let name=$(this).closest('tr').find('.name').val();
            let company=$(this).closest('tr').find('.company').val();
            let brand_name=$(this).closest('tr').find('.brandName').val();
            let warranty_period_id=$(this).closest('tr').find('.warranty').val();
            let batch_no=$(this).closest('tr').find('.batch_no').val();
            let units=$(this).closest('tr').find('.unit').val();
            $.ajax({
                url: "<?php echo route('product/save');?>",
                dataType:"JSON",
                method:"POST",
                data: {
                    'id':id,
                    'name':name,
                    'company':company,
                    'units':units,
                    'BatchNo':batch_no
                },
                success: function(response){
                    if(response.length){
                        toastr.success("Edit Successfully");
                        thiss.closest('tr').find('.Prd_name').text(response[0]['name']);
                        thiss.closest('tr').find('.Prd_batch_no').text(response[0]['batch_no']);
                        thiss.closest('tr').find('.Prd_unit').text(response[0]['unit']);

                    thiss.closest('tr').find(' .Prd_name, .Prd_company, .Prd_warranty, .Prd_batch_no, .Prd_unit, .edit, .delete').removeClass('d-none');
                    thiss.closest('tr').find(' .name, .company,  .warranty, .batch_no, .unit, .back, .save').addClass('d-none');
                    }else{
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })

    })
</script>