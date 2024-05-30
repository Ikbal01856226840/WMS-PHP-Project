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
                                    <div>
                                      <h4 class="text-center">Service Center Slider Image</h4>
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
                                                            <th>Name</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Status</th>
                                                            <!-- <th>Type</th> -->
                                                            <th>Slider Image</th>
                                                            <th>Description</th>
                                                            <th class=" d-print-none">Edit</th>
                                                            <th class=" d-print-none">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php if (!empty($images)) {
                                                            $i = 1;
                                                            foreach ($images as $row) { ?>
                                                                   <tr>
                                                                      <td><?php echo $i; ?></td>
                                                                        <td>
                                                                            <span class="image_name">
                                                                                <?php if (!empty($row['image_name'])) echo $row['image_name']; ?>
                                                                            </span>
                                                                            <input type="text" name="image_name" class="form-control d-none imageName" value="<?php if (!empty($row['image_name'])) echo $row['image_name']; ?>" >
                                                                            <input type="hidden" name="id" class="id" value="<?php if (!empty($row['id'])) echo $row['id']; ?>" >
                                                                        </td>
                                                                        <td>
                                                                            <span class="start_date">
                                                                                <?php if (!empty($row['start_date'])) echo $row['start_date']; ?>
                                                                            </span>
                                                                            <input type="date" name="start_date" class="form-control d-none startDate" value="<?php if (!empty($row['start_date'])) echo date($row['start_date']); ?>" >
                                                                        </td>
                                                                        <td>
                                                                            <span class="end_date">
                                                                                <?php if (!empty($row['end_date'])) echo $row['end_date']; ?>
                                                                            </span>
                                                                            <input type="date" name="end_date" class="form-control d-none endDate" value="<?php if (!empty($row['end_date'])) echo date($row['end_date']); ?>" >
                                                                        </td>

                                                                        <td>
                                                                            <span class="image_active">
                                                                            <?php   if (isset($row['image_active'])) echo $row['image_active'] ? 'Active ' : 'Deactivate'; ?>
                                                                            </span>
                                                                            <select name="image_active" class="form-control d-none imageActive">
                                                                                <option <?php echo $row['image_active'] == 1 ? 'selected' : ' '; ?> value="1">Active</option>
                                                                                <option <?php echo $row['image_active'] == 0 ? 'selected' : ' '; ?> value="0">Deactivate</option>
                                                                            </select>
                                                                        </td>
                                                                        <!-- <td>
                                                                            <span class="image_type">
                                                                                <?php if (isset($row['image_type'])) {
                                                                                   echo ($row['image_type'] == 1) ? 'App Banner':(  
                                                                                            ($row['image_type'] == 2) ? 'App Leaflet' : 'Search Banner' );
                                                                                } ?>
                                                                            </span>
                                                                            <select name="iimage_type" class="form-control d-none imageType">
                                                                                <option <?php echo $row['image_type'] == 0 ? 'selected' : ' '; ?> value="0">Search Banner</option>
                                                                                <option <?php echo $row['image_type'] == 1 ? 'selected' : ' '; ?> value="1">App Banner</option>
                                                                                <option <?php echo $row['image_type'] == 2 ? 'selected' : ' '; ?> value="2">App Leaflet</option>
                                                                            </select>
                                                                        </td> -->
                                                                        <td>
                                                                            <span class="image">
                                                                            <img src="<?php echo asset($row['image']) ?>" alt="Italian Trulli" width="100px" height="100px">
                                                                            </span>
                                                                            <input type="file" name="image" class="form-control d-none Image"  >
                                                                        </td>
                                                                        <td>
                                                                            <span class="description">
                                                                            <?php   if (isset($row['description'])) echo $row['description']  ?>
                                                                            </span>
                                                                            <input type="text" name="description" class="form-control d-none Description" value="<?php if (!empty($row['description'])) echo $row['description']; ?>" >
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
        $('.edit').click(function(e){
            e.preventDefault();
            $(this).closest('tr').find('.image_name, .start_date,  .end_date, .image_active,.image,.description,.image_type, .edit, .delete').addClass('d-none');
            $(this).closest('tr').find('.imageName, .startDate, .endDate, .imageActive,.Image,.Description,.imageType, .back, .save').removeClass('d-none');  
        })
        $('.back').click(function(e){
            e.preventDefault();
            $(this).closest('tr').find(' .image_name, .start_date,  .end_date, .image_active,.image,.description,.image_type, .edit, .delete').removeClass('d-none');
            $(this).closest('tr').find(' .imageName, .startDate, .endDate, .imageActive,.Image,.Description,.imageType, .back, .save').addClass('d-none');
        })
        $('.save').click(function(){
            let thiss=$(this);
            let id =$(this).val();

            let image_name=$(this).closest('tr').find('.imageName').val();
            let start_date=$(this).closest('tr').find('.startDate').val();
            let end_date=$(this).closest('tr').find('.endDate').val();
            let imageActive=$(this).closest('tr').find('.imageActive').val();
            let description=$(this).closest('tr').find('.Description').val();
            let image_type=$(this).closest('tr').find('.imageType').val();
            $.ajax({
                url: "<?php echo route('service/center/image/save');?>",
                dataType:"JSON",
                method:"POST",
                data: {
                    'id':id,
                    'image_name':image_name,
                    'start_date':start_date,
                    'end_date':end_date,
                    'image_active':imageActive,
                    //'image_type':image_type,
                    'description':description
                },
                success: function(response){
                    location.reload();
                    
                }
            })

        })

    })
</script>