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
                                        <h4> Product Serial  List</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                            <div class="page-header m-0 p-0 ">
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
                                                            <th class="d-print-none">Edit</th>
                                                            <th class="d-print-none">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($data)) {
                                                            $i = 1;
                                                            foreach ($data as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                       <?php  echo date('d M, Y', strtotime($row['invoice_date']));?> 
                                                                    </td>
                                                                       <td><?php if (!empty($row['invoice'])) echo $row['invoice']; ?></td>
                                                                    <td>
                                                                       <?php if (!empty($row['name'])) echo wordwrap( $row['name'], 15, "<br>\n"); ?>
                                                                    </td>
                                                                    <td class=" d-print-none">
                                                                        <a href="<?php  echo route('product/list/serial/edit/'. $row['id']); ?>" class="edit"><i class="btn btn-sm btn-primary" >Edit</i></a>
                                                                    </td>
                                                                    <td>
                                                                    <button class="btn btn-sm btn-danger delete" value="<?php if(!empty($row['id'])) echo $row['id']; ?>">Delete</button>
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