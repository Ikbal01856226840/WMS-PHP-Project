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
                                                            <th>Retailer Type Name</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($data)) {
                                                            $i = 1;
                                                            foreach ($data as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td>
                                                                        <span class="type_name">
                                                                            <?php if (!empty($row['typename'])) echo $row['typename']; ?>
                                                                        </span>
                                                                        <input type="text" name="typename" class="form-control d-none typename" value="<?php if (!empty($row['typename'])) echo $row['typename']; ?>" placeholder="">
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-primary edit mr-5" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                        <button type="button" class="btn btn-sm btn-info back mr-5 d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                    </td>
                                                                    <td>
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
            $(this).closest('tr').find('.type_name, .edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.typename, .back, .save').removeClass('d-none');

        })
        $('.back').click(function() {
            $(this).closest('tr').find('.type_name, .edit, .delete').removeClass('d-none');
            $(this).closest('tr').find('.typename, .back, .save').addClass('d-none');
        })
        $('.save').click(function() {
            let thiss = $(this);
            let id = $(this).closest('tr').find(this).val();
            let DealerType = $(this).closest('tr').find('.typename').val();
            $.ajax({
                url: "<?php echo route('dealer/type/save'); ?>",
                dataType: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'DealerType': DealerType,
                },
                success: function(response) {
                    if (response == 1) {
                        toastr.success("Edit Successfully");
                        thiss.closest('tr').find('.type_name').text(DealerType);
                        thiss.closest('tr').find('.type_name, .edit, .delete').removeClass('d-none');
                        thiss.closest('tr').find('.typename, .back, .save').addClass('d-none');
                    } else {
                        toastr.warning("Edit Error Try Again");
                    }
                }
            })

        })
    })
</script>