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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-sm-10">
                                    <!-- Zero config.table start -->
                                    <div class="card">
                                        <div class="card-header">


                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Offer Name</th>
                                                            <th>Offer Message</th>
                                                            <th>Offer Start Date</th>
                                                            <th>Offer End date</th>
                                                            <th>Retrailer name</th>
                                                            <th>Show File</th>
                                                            <!-- <th>Edit</th> -->
                                                            <!-- <th>Delete</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php if (!empty($relailers)) {
                                                            $i = 1;
                                                            foreach ($relailers as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                        <span class="Prd_stockGroup">
                                                                            <?php if (!empty($row['offer_name'])) echo $row['offer_name']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="prd_id">
                                                                            <?php if (!empty($row['offer_message'])) echo wordwrap($row['offer_message'], 20, "<br>\n"); ?>
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="Prd_name">
                                                                            <?php if (!empty($row['start_date'])) echo $row['start_date']; ?>
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="Prd_batch_no">
                                                                            <?php if (!empty($row['end_date'])) echo $row['end_date']; ?>
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="Prd_unit">
                                                                            <?php if (!empty($row['name'])) echo $row['name']; ?>
                                                                        </span>

                                                                    </td>
                                                                    <td>
                                                                        <a href="<?php echo route('individual/retrailer/offer/show/' . $row['id']); ?>" class="edit"><i class="btn btn-sm btn-primary mr-5 edit">Show Notification</i></a>

                                                                    </td>
                                                                    <!-- <td>
                                                                        <button class="btn btn-sm btn-primary mr-5 edit" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>

                                                                    </td> -->
                                                                    <!-- <td>
                                                                        <button class="btn btn-sm btn-danger delete" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Delete</button>

                                                                    </td> -->
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