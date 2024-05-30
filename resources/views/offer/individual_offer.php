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
                             <div class="page-header m-0 p-0 ">
                               <form action="<?php echo route('individual/dealer/offer/index'); ?>" method="GET">
                                <div class="row ">
                                     <div class="col-md-4">
                                        <label>Date From</label>
                                        <div class="form-group ">
                                            <input
                                            type="date"
                                            name="from_date"
                                            value="<?php if (!empty($from_date)) {
                                                echo $from_date;
                                            } else {
                                                echo date('Y-m-d');
                                            } ?>"
                                            class="form-control"
                                            />
                                        </div>
                                      </div> 
                                      <div class="col-md-4">
                                            <label>Date To</label>
                                            <div class="form-group ">
                                            <input
                                            type="date"
                                            name="to_date"
                                            value="<?php if (!empty($to_date)) {
                                                    echo $to_date;
                                                } else {
                                                    echo date('Y-m-d');
                                                } ?>"
                                            class="form-control"
                                            
                                            />
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                                <label></label>
                                                <div class="form-group">
                                                <button type="submit" class="btn hor-grd btn-grd-primary  float-right submit" style="width:100%;display: block;float:right;">Search</button> 
                                        </div>
                                     </div>
                                   </div>
                                 </form>
                                <div class="col-sm-12">
                                    <!-- Zero config.table start -->
                                    <div class="card">
                                        <div class="card-header">


                                        </div>
                                        <div class="card-block">
                                            <div class="text-center">
                                                    <button type="button" id="printr" class="btn btn-primary btn-print-invoice m-b-5 btn-sm waves-effect waves-light m-r-20 print ">Print</button>
                                            </div>
                                            <div class="dt-responsive table-responsive gh">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap t1  print-demo2">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Offer Name</th>
                                                            <th>Offer Message</th>
                                                            <th>Offer Start Date</th>
                                                            <th>Offer End date</th>
                                                            <th class=" d-print-none">Show File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php if (!empty($individual_offer)) {
                                                            $i = 1;
                                                            foreach ($individual_offer as $row) { ?>
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
                                                                            <?php if (!empty($row['start_date']))   echo date('d F, Y', strtotime($row['start_date'])); ?>
                                                                        </span>

                                                                    </td>
                                                                    <td>
                                                                        <span class="Prd_batch_no">
                                                                            <?php if (!empty($row['end_date']))  echo date('d F, Y', strtotime($row['end_date'])); ?>
                                                                        </span>

                                                                    </td>

                                                                    <td class=" d-print-none">
                                                                        <a href="<?php echo route('individual/dealer/offer/notification/show/' . $row['id']); ?>" class="edit"><i class="btn btn-sm btn-primary mr-5 edit">Show Notification</i></a>

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
    // function individual_offer() {
    //     var path = <?php //echo asset() 
                        ?>;
    //     $.ajax({
    //         url: "  //<? php // echo route('individual/dealer/offer/allShow') 
                            ?>",
    //         type: "GET",
    //         dataType: "json",
    //         success: function(res) {
    //             console.log(res);
    //             var root = window.location.href;
    //             console.log(root);
    //             var data = '';
    //             $.each(res, function(key, val) {
    //                 var k = val.offer_file;
    //                 data = data + "<tr>";
    //                 data = data + "<td>" + val.offer_name + "</td>";
    //                 data = data + "<td>" + val.offer_message + "</td>";
    //                 data = data + "<td>" + val.start_date + "</td>";
    //                 data = data + "<td>" + val.end_date + "</td>";
    //                 data = data + "<td>"
    //                 data = data + "<td>" + val.end_date + "</td>";
    //                 data = data + "<td>"
    //                 data = data + '<img src="//localhost/hcl/25/public/assets/' + val.offer_file + '" alt="Italian Trulli" width="100%" height="100%">'
    //                 data = data + "</td>";
    //                 data = data + "<td class='text-left' >" + val.name + "</td>";
    //                 data = data + "<tr>";
    //             })
    //             $('tbody').html(data)

    //         }
    //     });
    // }
    // individual_offer();
</script>