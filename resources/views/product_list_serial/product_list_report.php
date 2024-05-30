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
                                        <h4>Product Serial List Report</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                          <div class="row">
                           <div class="page-header m-0 p-0 ">
                            <form action="<?php echo route('product/list/serial/report/data'); ?>" method="GET">
                                 <div class="row ">
                                        <div class="col-md-3">
                                            <label>Dealer</label>
                                            <select name="dealer_id" id="dealer_id" class="form-control js-example-basic-single" required>
                                                <option value="" >--Select--</option>
                                                <option value="0" <?php echo   ($dealer_id??0) ==0 ? 'selected': '';?>>--All--</option>
                                                <?php  foreach ($dealers as $dealer) { ?>
                                                    <option   value="<?php echo $dealer['id'];?>" <?php echo   ($dealer_id??0) == $dealer['id'] ? 'selected': '';?>>
                                                        <?php echo $dealer['name']; ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>   
                                        </div>
                                        <div class="col-md-3">
                                            <label>Battery Type</label>
                                            <select name="stock_item_id"  class="form-control js-example-basic-single" required>
                                                <option value="" >--Select--</option>
                                                <option value="0" <?php echo   ($stock_item_id??0) ==0 ? 'selected': '';?>>--All--</option>
                                                <?php  foreach ($stock_items as $stock_item) { ?>
                                                    <option   value="<?php echo $stock_item['id'];?>" <?php echo   ($stock_item_id??0) == $stock_item['id'] ? 'selected': '';?>>
                                                        <?php echo $stock_item['name']; ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>   
                                        </div>
                                        <div class="col-md-2">
                                            <label>Date From</label>
                                            <div class="form-group ">
                                                <input type="date" name="from_date" value="<?php if (!empty($from_date)) {echo $from_date; } else {echo date('Y-m-d');} ?>" class="form-control" min="2022-12-01" />                         
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Date To</label>
                                            <div class="form-group ">
                                                <input type="date" name="to_date" value="<?php if (!empty($to_date)) {  echo $to_date; } else {echo date('Y-m-d');} ?>" class="form-control" />                                            
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label></label>
                                                <div class="form-group">
                                                    <button type="submit" class="btn hor-grd btn-grd-primary btn-block submit" style="width:100%">Search</button> 
                                            </div>
                                        </div>
                                  </div>
                                </form>
                                <div class="col-md-12">
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
                                                            <th>Date</th>
                                                            <th>Invoice</th>
                                                            <th>Dealer Name</th>
                                                            <th>Stock Group Name</th>
                                                            <th>Battery Type</th>
                                                            <th>Product Serial</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($data)) {
                                                            $i = 1;
                                                            foreach ($data as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php if (!empty($row['invoice_date'])) echo date('d M, Y', strtotime($row['invoice_date']??'')); ?>  </td>
                                                                    <td><?php if (!empty($row['invoice']))  echo wordwrap( $row['invoice'], 20, "<br>\n"); ?>  </td>
                                                                    <td><?php if (!empty($row['name']))  echo wordwrap( $row['name'], 20, "<br>\n"); ?>  </td>
                                                                    <td><?php if (!empty($row['stock_group_name']))  echo wordwrap( $row['stock_group_name'], 20, "<br>\n"); ?>  </td>
                                                                    <td><?php if (!empty($row['product_name']))  echo wordwrap( $row['product_name'], 20, "<br>\n"); ?>  </td>
                                                                    <td><?php if (!empty($row['product_serial_id']))  echo wordwrap( $row['product_serial_id'], 20, "<br>\n"); ?>  </td>
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