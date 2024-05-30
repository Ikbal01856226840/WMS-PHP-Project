
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .warrenty_color{
        background-color: #0ac282 !important;
        color: white;
    }
  </style>
 <!-- Dealer   -->
 <div class="modal fade " id="AddDealerModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog the-modal">
        <div class="modal-content the-modal__container">
            <div class="modal-header .the-modal__header ">
                <h5 class="modal-title" id="exampleModalLabel">Dealer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Dealer Name</label>
                                <input type="text"  class="form-control dealer_name " readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Dealer Code :</label>
                            <input type="text" name="comp_alias" class="form-control code" readonly >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Dealer Phone </label>
                            <input type="text" name="comp_alias" class="form-control phone" readonly >
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Dealer Address </label>
                            <textarea name="notes" class="form-control address"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>
 <!--Branch  -->
 <div class="modal fade " id="AddBranchModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog the-modal">
        <div class="modal-content the-modal__container">
            <div class="modal-header .the-modal__header ">
                <h5 class="modal-title" id="exampleModalLabel">Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Branch Name</label>
                                <input type="text"  class="form-control branch_name " readonly>
                              
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Dealer Phone </label>
                            <input type="text" name="comp_alias" class="form-control phone" readonly >
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Branch Address </label>
                            <textarea  class="form-control address " readonly> </textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>
<!--Area-->
<div class="modal fade " id="AddAreaModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog the-modal">
        <div class="modal-content the-modal__container">
            <div class="modal-header .the-modal__header ">
                <h5 class="modal-title" id="exampleModalLabel">Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Area Name :</label>
                            <input type="text" name="comp_alias" class="form-control area_name" readonly >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Dealer Name</label>
                                <input type="text"  class="form-control dealer_name " readonly>
                                <span id='error_comp_name_name' class=" text-danger"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Sales Parson</label>
                            <input type="text" name="comp_alias" class="form-control sales_parson" readonly >
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <label  for="exampleInputEmail1">Area Phone Number</label>
                            <textarea name="notes" class="form-control phone" readonly></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body mt-5">
                        <h4>Warrenty Card List</h4>
                            <div class="row">
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-md-12">
                                    <!-- Zero config.table start -->
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-block">
                                            <?php if (!empty($data)) { ?>
                                                <div class="dt-responsive table-responsive">
                                                   <table id="simpletable" class="table table-striped table-bordered nowrap print-demo2">
                                                        <thead>
                                                            <tr>
                                                                <th>SL</th>
                                                                <th>Stock Group Name</th>
                                                                <th>Battery Type</th>
                                                                <th>Product Serial</th>
                                                                <th>Warrenty Card No</th>
                                                                <th>Create Date</th>
                                                                <th>Sales Date</th>
                                                                <th>Warranty Upto</th>
                                                                <th>Dealer Name</th>
                                                                <th>Branch Name</th>
                                                                <th>Branch Area </th>
                                                                <th>Sales Person </th>
                                                                <th>Customer Name</th>
                                                                <th>User</th>
                                                                <th>Edit</th>
                                                                <?php if(session('user_lavel')==1||session('user_lavel')==2) {?>
                                                                <th>Delete</th>
                                                                <?php }?>
                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($data as $key=>$row) { ?>
                                                                <tr>
                                                                    <td><?php echo $key+1 ?></td>
                                                                    <td><?php if (!empty($row['group_name'])) {
                                                                            echo $row['group_name'];
                                                                        } ?></td>
                                                                    <td><?php if (!empty($row['name'])) {
                                                                            echo $row['name'];
                                                                        } ?></td>
                                                                    <td><?php if (!empty($row['product_serial'])) {
                                                                            echo $row['product_serial'];
                                                                        } ?></td>
                                                                    <td><?php if (!empty($row['card_no'])) {
                                                                            echo $row['card_no'];
                                                                        } ?></td>
                                                                    <td><?php if (!empty($row['create_date'])) {
                                                                        echo  date("d-m-Y", strtotime( $row['create_date']));
                                                                    } ?></td>
                                                                       
                                                                    <td><?php if (!empty($row['sales_date'])) {
                                                                            echo  date("d-m-Y", strtotime( $row['sales_date']));
                                                                        } ?></td>
                                                                    <td><?php if (!empty($row['card_end_date'])) {
                                                                             echo  date("d-m-Y", strtotime( $row['card_end_date']));
                                                                        } ?></td>
                                                                     <td id="dealer" data-toggle="modal" data-target="#AddDealerModal" >
                                                                       <input class="dealer_id" type="hidden" value="<?php if (!empty($row['dealer_id'])) echo $row['dealer_id']; ?>">
                                                                        <?php if (!empty($row['dealerName'])) {
                                                                            echo $row['dealerName'];
                                                                        } ?></td>
                                                                        <td id="branch" data-toggle="modal" data-target="#AddBranchModal"><?php if (!empty($row['branchName'])) {
                                                                            echo $row['branchName'];
                                                                        } ?>
                                                                         <input class="branch_id" type="hidden" value="<?php if (!empty($row['branch_id'])) echo $row['branch_id']; ?>">
                                                                        </td>
                                                                        <td id="area" data-toggle="modal" data-target="#AddAreaModal" ><?php if (!empty($row['area_name'])) {
                                                                            echo $row['area_name'];
                                                                        } ?>
                                                                        <input class="area_id" type="hidden" value="<?php if (!empty($row['area_id'])) echo $row['area_id']; ?>">
                                                                        </td>
                                                                        <td id="area" data-toggle="modal" data-target="#AddAreaModal" ><?php if (!empty($row['sales_person'])) {
                                                                            echo $row['sales_person'];
                                                                        } ?>
                                                                        <input class="area_id" type="hidden" value="<?php if (!empty($row['area_id'])) echo $row['area_id']; ?>">
                                                                        </td>
                                                                    <td><?php if (!empty($row['customer_name'])) {
                                                                            echo $row['customer_name'];
                                                                        } ?></td>
                                                                    <td><?php if (!empty($row['userName'])) {
                                                                            echo $row['userName'];
                                                                        } ?></td>
                                                                     
                                                                        <td><button type="button" class="btn btn-primary edit btn-sm" name="edit" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button></td>
                                                                        <?php if(session('user_lavel')==1||session('user_lavel')==2) {?>
                                                                        <td><button type="button" class="btn btn-danger btn-sm delete" name="delete" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Delete</button></td>
                                                                    <?php }?>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php } else { ?>
                                                <div class="noData">
                                                    <h4>there is no data!</h4>
                                                </div>
                                            <?php } ?>
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


<script>
 $(document).ready(function() {
        $('#warrenty_id').DataTable({
            paging: false,
            dom: 'Bfrtip',
            
            buttons: [
                'copyHtml5',

                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4,6,7,8,9,10 ]
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4,5,6,7,8,9,10 ]
                    }
                },

                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4,5,6,7,8,9,10 ]
                    }
                },
            ]
        });
    });
    $('#warrenty_id tbody tr td').click(function(){
            $('.warrenty_color').removeClass('warrenty_color');
            $(this).addClass('warrenty_color');
    })
    $('.edit').click(function() {
      $('.editModal').show();
        let id = $(this).val();
        let url="<?php echo route('warrantyCard/edit/')?>"+id;
        $('.editApprove').click(function() {
          location.replace(url);
        })

    })
    $('.deleteApprove').click(function() {
        $('.deleteModal').hide();
        $.ajax({
            url: 'delete',
            type: 'POST',
            dataType: 'json',
            data: {
                'id': id
            },
            success: function(response) {
                if (response == 1) {
                    // thisBtn.delete();
                    toastr.success("Delect Success");
                }
            }
        })
    })

  
        $(document).on('click', '#dealer', function(e) {
         var dealer_id= $(this).find(".dealer_id").val();
         $.ajax({
            url: "<?php echo route('dealer/name'); ?>",
            type: 'GET',
            dataType: 'json',
            data: {
                'id': dealer_id
            },
            success: function(response) {
               $('.dealer_name').val(response.name);
               $('.code').val(response.dealercode);
               $('.phone').val(response.phone1);
               $('.address').val(response.address);
               
            }
        })
    });
    
    $(document).on('click', '#branch', function(e) {
         var branch_id= $(this).find(".branch_id").val();
         $.ajax({
            url: "<?php echo route('branch/name'); ?>",
            type: 'GET',
            dataType: 'json',
            data: {
                'id':branch_id
            },
            success: function(response) {
               $('.branch_name').val(response.name);
               $('.phone').val(response.phone_number_one);
               $('.address').val(response.address);
            }
        })
    });
    $(document).on('click', '#area', function(e) {
         var area_id= $(this).find(".area_id").val();
         $.ajax({
            url: "<?php echo route('area/name'); ?>",
            type: 'GET',
            dataType: 'json',
            data: {
                'id':area_id
            },
            success: function(response) {
              $('.area_name').val(response.area_name);
              $('.dealer_name').val(response.name);
              $('.sales_parson').val(response.sales_parson);
              $('.phone').val(response.phone_number); 
                
            }
        })
    });
</script>