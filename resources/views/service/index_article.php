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
                                        <h4>Article List</h4>
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
                                    <div id="print-demo2" class="card">
                                        <div class="card-header">
                                        
                                        </div>
                                        <div class="card-block">
                                            <div class="text-center">
                                                    <button type="button" id="printr" class="btn btn-primary btn-print-invoice m-b-5 btn-sm waves-effect waves-light m-r-20 print ">Print</button>
                                            </div>
                                            <div class="dt-responsive table-responsive">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap print-demo2">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>SL</th>
                                                            <th>Article </th>
                                                            <th>Status</th>
                                                            <th  class=" d-print-none">Edit</th>
                                                            <th  class=" d-print-none">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($data)) {
                                                            $i = 1;
                                                            foreach ($data as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                        <span class="article_details">
                                                                            <?php if (!empty($row['article_details'])) echo $row['article_details']; ?>
                                                                        </span>
                                                                        <input type="text" name="article_details" class="form-control d-none articleDetails" value="<?php if (!empty($row['article_details'])) echo wordwrap( $row['article_details'], 200, "<br>\n" ) ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                            <span class="status">
                                                                            <?php   if (isset($row['status'])) echo $row['status'] ? 'Active ' : 'Deactivate'; ?>
                                                                            </span>
                                                                            <select name="status" class="form-control d-none IsActive">
                                                                                <option <?php echo $row['status'] == 1 ? 'selected' : ' '; ?> value="1">Active</option>
                                                                                <option <?php echo $row['status'] == 0 ? 'selected' : ' '; ?> value="0">Deactivate</option>
                                                                            </select>
                                                                        </td>
                                                                    
                                                                    <td  class=" d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-primary edit mr-5" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                        <button type="button" class="btn btn-sm btn-info back mr-5 d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                    </td>
                                                                    <td  class=" d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-danger delete" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Delete</button>
                                                                        <button type="button" class="btn btn-sm btn-success save d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Save</button>
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
   
    $(document).ready(function() {
        $('.edit').click(function() {
            $(this).closest('tr').find('.article_details,.status,.edit,.delete').addClass('d-none');
            $(this).closest('tr').find('.articleDetails,.IsActive,.back,.save').removeClass('d-none');

        })
        $('.back').click(function() {
            $(this).closest('tr').find('.article_details,.status,.edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.articleDetails,.IsActive,.back, .save').addClass('d-none');
        })

        $('.save').click(function() {
            let thiss = $(this);
            let id = $(this).val();
            let articleDetails = $(this).closest('tr').find('.articleDetails').val();
            let status = $(this).closest('tr').find('.IsActive').val();

            
            $.ajax({
                url: "<?php echo route('service/article/save'); ?>",
                dataType: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'article_details':articleDetails,
                    'status':status
                },
                success: function(response) {
                    if (response.length) {
                        console.log(response);
                        thiss.closest('tr').find('.article_details').text(response[0]['article_details']);
                        thiss.closest('tr').find('.IsActive').text((response[0]['status'] == 1 ? 'Yes' : 'No'));
                        thiss.closest('tr').find('.article_details,.status,.edit,.delete').removeClass('d-none');
                        thiss.closest('tr').find('.articleDetails,.IsActive,.back,.save').addClass('d-none');
                        toastr.success("Edit Successfully");
                    } else {
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })
    })
</script>