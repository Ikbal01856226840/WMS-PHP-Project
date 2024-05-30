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
                                        <h4>Product Price List</h4>                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <form action="<?php echo route('pricelist/index'); ?>" method="GET">
                                            <div class="row">
                                                <div class="col-md-4 ">
                                                    <label>Stock Group</label>                                                            
                                                    <select name="stock_group" class="js-example-basic-single" required>
                                                        <option <?php  if(!empty($stock_group)){echo $stock_group == 0 ? 'selected' : ''; }?> value="0">ALL</option>                                                            
                                                        <?php foreach ($stock_group as $strow) { ?>
                                                            <option value="<?php echo $strow['id'] ?>" <?php  if(!empty($stock_id)){ echo $stock_id == $strow['id'] ? 'selected' : ''; }?>  ><?php echo $strow['name']?></option>
                                                        <?php } ?>                                                                            
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Battery Type</label>
                                                    <select name="product_type" class="form-control js-example-basic-single branch_id">
                                                        <option <?php  if(!empty($product_type)){echo $product_type == 0 ? 'selected' : ''; }?> value="0">ALL</option>                                                            
                                                        <?php foreach ($product_type as $ptype) { ?>
                                                            <option value="<?php echo $ptype['id'] ?>" <?php  if(!empty($product_id)){ echo $product_id == $ptype['id'] ? 'selected' : ''; }?>><?php echo $ptype['name']?></option>
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
                                    </div>
                                    <!-- Zero config.table start -->
                                    <?php if(!empty($product_price)){?>

                                    <div class="card">
                                        <div class="card-header">
                                            
                                        </div>
                                        <div class="card-block">
                                            <div class="text-center">
                                                    <button type="button" id="printr" class="btn btn-primary btn-print-invoice m-b-5 btn-sm waves-effect waves-light m-r-20 print ">Print</button>
                                            </div>
                                            <div class="dt-responsive table-responsive">
                                                <table id="simpletable"  class="table table-striped table-bordered nowrap print-demo2">
                                                <!-- <table id="simpletable" class="table table-striped table-bordered nowrap print-demo2 text-center"> -->
                                                    <thead>
                                                        <tr class="text-center align-middle">
                                                            <th>SL</th>
                                                            <th>StockGroup/<br>Brand</th>
                                                            <th>Warranty<br>(Months)</th>
                                                            <th>Battery<br>Type</th>
                                                            <th>Dry<br>Weight (kg)</th>
                                                            <th>Wet<br>Weight (kg)</th>
                                                            <th>Electrolyte/<br>Battery (ltr)</th>
                                                            <th>Volt</th>
                                                            <th>Plate<br>Per<br>Cell</th>
                                                            <th>Capacity<br>@20Ah</th>
                                                            <th>CCA</th>
                                                            <th>RC<br>(min)</th>
                                                            <th>Length<br>(mm)</th>
                                                            <th>Width<br>(mm)</th>
                                                            <th>Height<br>Without<br>Post (mm)</th>
                                                            <th>Height<br>With<br>Post (mm)</th>
                                                            <th>Application<br>(Engine CC/IPS)</th>
                                                            <th>Price</th>
                                                            <?php if(session('user_lavel')==1||session('user_lavel')==3 ||session('user_lavel')==4 ||session('user_lavel')==7 ||session('user_lavel')==9){ ?>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($product_price)) {
                                                            foreach ($product_price as $i=>$row) { ?>
                                                                <tr class="fw-bold" >
                                                                    <td><?php echo ++$i; ?></td>
                                                                    <td>
                                                                        <span class="pr_stock_group">
                                                                            <?php if (!empty($row['grp_name'])) echo $row['grp_name']; ?>
                                                                        </span>
                                                                        <select name="stock_group" class="form-control d-none prstock_group" required>
                                                                            <?php foreach ($stock_group as $strow) { ?>
                                                                                <option <?php echo ($row['stock_group'] == $strow['id']) ? 'selected' : ' '; ?> value="<?php echo $strow['id'] ?>" warranty="<?php if (!empty($strow['warrantry_period'])) echo $strow['warrantry_period']; ?>"><?php echo $strow['name']?></option>
                                                                            <?php } ?>                                                                            
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <span class="pr_warranty_period">
                                                                            <?php if (!empty($row['warranty_period'])) echo $row['warranty_period'].' Months'; ?>
                                                                        </span>
                                                                        <input type="text" name="warranty_period" class="form-control prwarranty_period d-none" value="<?php if (!empty($row['warranty_period'])) echo $row['warranty_period'].' Months'; ?>" placeholder="" readonly>                                                                        
                                                                    </td>                                                               
                                                                    <td>
                                                                        <span class="pr_product_type">
                                                                            <?php if (!empty($row['prd_name'])) echo $row['prd_name']; ?>
                                                                        </span>
                                                                        <select name="product_type" class="form-control d-none prproduct_type" required>
                                                                            <?php foreach ($product_type as $prow) { ?>
                                                                                <option <?php echo ($row['product_type'] == $prow['id']) ? 'selected' : ' '; ?> value="<?php echo $prow['id'] ?>"><?php echo $prow['name']?></option>
                                                                            <?php } ?>                                                                            
                                                                        </select>
                                                                    </td>                                                                    
                                                                    <td>
                                                                        <span class="pr_d_weight">
                                                                            <?php if (!empty($row['d_weight'])) echo $row['d_weight'].' Kg'; ?>
                                                                        </span>
                                                                        <input type="text" name="d_weight" class="form-control d-none prd_weight" value="<?php if (!empty($row['d_weight'])) echo $row['d_weight']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="pr_w_weight">
                                                                            <?php if (!empty($row['w_weight'])) echo $row['w_weight'].' Kg'; ?>
                                                                        </span>
                                                                        <input type="text" name="w_weight" class="form-control d-none prw_weight" value="<?php if (!empty($row['w_weight'])) echo $row['w_weight']; ?>" placeholder="">
                                                                    </td> 
                                                                    <td>
                                                                        <span class="pr_electrolyte">
                                                                            <?php if (!empty($row['electrolyte'])) echo $row['electrolyte'].' Ltr'; ?>
                                                                        </span>
                                                                        <input type="text" name="electrolyte" class="form-control d-none prelectrolyte" value="<?php if (!empty($row['electrolyte'])) echo $row['electrolyte']; ?>" placeholder="">
                                                                    </td> 
                                                                    <td>
                                                                        <span class="pr_volt">
                                                                            <?php if (!empty($row['volt'])) echo $row['volt'].' V'; ?>
                                                                        </span>
                                                                        <input type="text" name="volt" class="form-control d-none prvolt" value="<?php if (!empty($row['volt'])) echo $row['volt']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="pr_plate_pc">
                                                                            <?php if (!empty($row['plate_pc'])) echo $row['plate_pc'].' Plate'; ?>
                                                                        </span>
                                                                        <input type="text" name="plate_pc" class="form-control d-none prplate_pc" value="<?php if (!empty($row['plate_pc'])) echo $row['plate_pc']; ?>" placeholder="">
                                                                    </td> 
                                                                    <td>
                                                                        <span class="pr_capacity">
                                                                            <?php if (!empty($row['capacity'])) echo $row['capacity'] .' Ah'; ?>
                                                                        </span>
                                                                        <input type="text" name="capacity" class="form-control d-none prcapacity" value="<?php if (!empty($row['capacity'])) echo $row['capacity']; ?>" placeholder="">
                                                                    </td> 
                                                                    <td>
                                                                        <span class="pr_cca">
                                                                            <?php if (!empty($row['cca'])) echo $row['cca'].' A'; ?>
                                                                        </span>
                                                                        <input type="text" name="cca" class="form-control d-none prcca" value="<?php if (!empty($row['cca'])) echo $row['cca']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="pr_rc">
                                                                            <?php if (!empty($row['rc'])) echo $row['rc'].' min'; ?>
                                                                        </span>
                                                                        <input type="text" name="rc" class="form-control d-none prrc" value="<?php if (!empty($row['rc'])) echo $row['rc']; ?>" placeholder="">
                                                                    </td>  
                                                                    <td>
                                                                        <span class="pr_length">
                                                                            <?php if (!empty($row['length'])) echo $row['length'].' mm'; ?>
                                                                        </span>
                                                                        <input type="text" name="length" class="form-control d-none prlength" value="<?php if (!empty($row['length'])) echo $row['length']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="pr_width">
                                                                            <?php if (!empty($row['width'])) echo $row['width'].' mm'; ?>
                                                                        </span>
                                                                        <input type="text" name="width" class="form-control d-none prwidth" value="<?php if (!empty($row['width'])) echo $row['width']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="pr_height_wp">
                                                                            <?php if (!empty($row['height_wp'])) echo $row['height_wp'].' mm'; ?>
                                                                        </span>
                                                                        <input type="text" name="height_wp" class="form-control d-none prheight_wp" value="<?php if (!empty($row['height_wp'])) echo $row['height_wp']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="pr_height_op">
                                                                            <?php if (!empty($row['height_op'])) echo $row['height_op'].' mm'; ?>
                                                                        </span>
                                                                        <input type="text" name="height_op" class="form-control d-none prheight_op" value="<?php if (!empty($row['height_op'])) echo $row['height_op']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <span class="pr_cc_ips">
                                                                            <?php if (!empty($row['cc_ips'])) echo $row['cc_ips']; ?>
                                                                        </span>
                                                                        <input type="text" name="cc_ips" class="form-control d-none prcc_ips" value="<?php if (!empty($row['cc_ips'])) echo $row['cc_ips']; ?>" placeholder="">
                                                                    </td> 
                                                                    <td class="text-end">
                                                                        <span class="pr_price" style="font-size: 17px;">
                                                                            <?php if (!empty($row['price'])) echo $row['price'].' Tk'; ?>
                                                                        </span>
                                                                        <input type="text" name="price" class="form-control d-none prprice" value="<?php if (!empty($row['price'])) echo $row['price']; ?>" placeholder="">
                                                                    </td> 
                                                                    <?php if(session('user_lavel')==1||session('user_lavel')==3 ||session('user_lavel')==4 ||session('user_lavel')==7 ||session('user_lavel')==9){ ?>                                                                    
                                                                    <td class="d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-primary edit mr-5" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                        <button type="button" class="btn btn-sm btn-info back mr-5 d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                    </td>
                                                                    <td class="d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-danger delete" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Delete</button>
                                                                        <button type="button" class="btn btn-sm btn-success save d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Save</button>
                                                                    </td>
                                                                    <?php } ?>
                                                                </tr>
                                                        <?php 
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }else{?>
                                        <div class="d-inline text-center">
                                            <h4 class="text-danger mt-5 pt-5">No Data Found</h4>                                      
                                        </div>
                                    <?php }?>

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

        $('.prstock_group').change(function(){
            $('.prwarranty_period').val($(this).find('option:selected').attr('warranty')+' Months')
        })

        $('.edit').click(function() {
            $(this).closest('tr').find('.pr_stock_group, .pr_warranty_period, .pr_product_type, .pr_d_weight, .pr_w_weight, .pr_electrolyte, .pr_capacity, .pr_plate_pc, .pr_volt, .pr_length, .pr_width, .pr_height_wp, .pr_height_op, .pr_cca, .pr_rc, .pr_cc_ips, .pr_price ,.edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.prstock_group, .prwarranty_period, .prproduct_type, .prd_weight, .prw_weight, .prelectrolyte, .prcapacity, .prplate_pc, .prvolt, .prlength, .prwidth, .prheight_wp, .prheight_op, .prcca, .prrc, .prcc_ips, .prprice ,.back, .save').removeClass('d-none');

        })
        $('.back').click(function() {
            $(this).closest('tr').find('.pr_stock_group, .pr_warranty_period, .pr_product_type, .pr_d_weight, .pr_w_weight, .pr_electrolyte, .pr_capacity, .pr_plate_pc, .pr_volt, .pr_length, .pr_width, .pr_height_wp, .pr_height_op, .pr_cca, .pr_rc, .pr_cc_ips, .pr_price ,.edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.prstock_group, .prwarranty_period, .prproduct_type, .prd_weight, .prw_weight, .prelectrolyte, .prcapacity, .prplate_pc, .prvolt, .prlength, .prwidth, .prheight_wp, .prheight_op, .prcca, .prrc, .prcc_ips, .prprice ,.back, .save').addClass('d-none');
        })

        $('.save').click(function() {
            let thiss = $(this);
            let id = $(this).val();
            let stock_group = $(this).closest('tr').find('.prstock_group').val()
            let product_type = $(this).closest('tr').find('.prproduct_type').val()
            let warranty_period = $(this).closest('tr').find('.prwarranty_period').val()
            let capacity = $(this).closest('tr').find('.prcapacity').val()
            let volt = $(this).closest('tr').find('.prvolt').val()
            let plate_pc = $(this).closest('tr').find('.prplate_pc').val()
            let length = $(this).closest('tr').find('.prlength').val()
            let width = $(this).closest('tr').find('.prwidth').val()
            let height_wp = $(this).closest('tr').find('.prheight_wp').val()
            let height_op = $(this).closest('tr').find('.prheight_op').val()
            let cca = $(this).closest('tr').find('.prcca').val()
            let rc = $(this).closest('tr').find('.prrc').val()
            let d_weight = $(this).closest('tr').find('.prd_weight').val()
            let w_weight = $(this).closest('tr').find('.prw_weight').val()
            let electrolyte = $(this).closest('tr').find('.prelectrolyte').val()
            let cc_ips = $(this).closest('tr').find('.prcc_ips').val()
            let price = $(this).closest('tr').find('.prprice').val()

            $.ajax({
                url: "<?php echo route('pricelist/save'); ?>",
                dataType: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'stock_group' : stock_group,
                    'product_type' : product_type,
                    'warranty_period' : warranty_period,
                    'capacity' : capacity,                    
                    'plate_pc' : plate_pc,
                    'volt' : volt,
                    'length' : length,
                    'width' : width,
                    'height_wp' : height_wp,
                    'height_op' : height_op,
                    'cca' : cca,
                    'rc' : rc,
                    'd_weight' : d_weight,
                    'w_weight' : w_weight,
                    'electrolyte' : electrolyte,
                    'cc_ips' : cc_ips,
                    'price' : price
                },
                success: function(response) {                    
                    if (response.length) {
                        toastr.success("Edit Successfully");
                        thiss.closest('tr').find('.pr_stock_group').text(response[0]['grp_name']);
                        thiss.closest('tr').find('.pr_product_type').text(response[0]['prd_name']);
                        thiss.closest('tr').find('.pr_warranty_period').text(response[0]['warranty_period']+' Months');
                        thiss.closest('tr').find('.pr_capacity').text(response[0]['capacity']+' Ah');                        
                        thiss.closest('tr').find('.pr_plate_pc').text(response[0]['plate_pc']+' Plate');
                        thiss.closest('tr').find('.pr_volt').text(response[0]['volt']+' V');
                        thiss.closest('tr').find('.pr_length').text(response[0]['length']+' mm');
                        thiss.closest('tr').find('.pr_width').text(response[0]['width']+' mm');
                        thiss.closest('tr').find('.pr_height_wp').text(response[0]['height_wp']+' mm');
                        thiss.closest('tr').find('.pr_height_op').text(response[0]['height_op']+' mm');
                        thiss.closest('tr').find('.pr_cca').text(response[0]['cca']);
                        thiss.closest('tr').find('.pr_rc').text(response[0]['rc']);
                        thiss.closest('tr').find('.pr_d_weight').text(response[0]['d_weight']+' Kg');
                        thiss.closest('tr').find('.pr_w_weight').text(response[0]['w_weight']+' Kg');
                        thiss.closest('tr').find('.pr_electrolyte').text(response[0]['electrolyte']+' Ltr');
                        thiss.closest('tr').find('.pr_cc_ips').text(response[0]['cc_ips']);
                        thiss.closest('tr').find('.pr_price').text(response[0]['price']+' Tk');
                        thiss.closest('tr').find('.pr_stock_group, .pr_warranty_period, .pr_product_type, .pr_d_weight, .pr_w_weight, .pr_electrolyte, .pr_capacity, .pr_plate_pc, .pr_volt, .pr_length, .pr_width, .pr_height_wp, .pr_height_op, .pr_cca, .pr_rc, .pr_cc_ips, .pr_price ,.edit, .delete').removeClass('d-none');
                        thiss.closest('tr').find('.prstock_group, .prwarranty_period, .prproduct_type, .prd_weight, .prw_weight, .prelectrolyte, .prcapacity, .prplate_pc, .prvolt, .prlength, .prwidth, .prheight_wp, .prheight_op, .prcca, .prrc, .prcc_ips, .prprice ,.back, .save').addClass('d-none');

                    } else {
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })

    })
</script>