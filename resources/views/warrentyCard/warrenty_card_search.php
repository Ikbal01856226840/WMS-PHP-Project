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
                        <div class="page-header mt-3">
                            <div class="row align-items-center">
                                <div class="page-header-title m-0">
                                    <!-- <div class="d-inline"> -->
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8 card m-3">
                                            <form action="<?php echo route('warrantyCard/warrenty_card_search'); ?>" method="POST">
                                                <div class="card-header py-3">
                                                    <h4 class="card-title text-center m-0">Warrenty Card Search</h4>
                                                </div>
                                                <div class="card-body row p-2">
                                                    <div class="col-md-5">
                                                        <div class="form-group row me-3">
                                                            <label class="col-sm-4 col-form-label text-enter">Product Serial</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="ProductSerial" class="form-control ProductSerial barcode" <?php if(!empty($ProductSerial))  {?> value="<?php echo $ProductSerial ?>" <?php }?> required autofocus>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group row me-3">
                                                            <label class="col-sm-4 col-form-label text-enter">Warrenty Card No</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="CardNo" class="form-control CardNo"  <?php if(!empty($CardNo))  {?> value="<?php echo $CardNo ?>" <?php }?>placeholder="" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-primary cardSubmit ">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-2"></div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body ">
                            <div class="row">
                               
                                <div class="col-sm-12">
                                    <!-- Zero config.table start -->
                                    <div class="card">
                                        <div class="card-header">

                                        </div>
                                        <div class="card-block">
                                        <div class="text-center">
                                                    <button type="button" id="printr" class="btn btn-primary btn-print-invoice m-b-5 btn-sm waves-effect waves-light m-r-20 print ">Print</button>
                                            </div>
                                            <?php if (!empty($data)) { ?>
                                            <?php if(!empty($data[0]['old_product_serial'])){?> 
                                            <div class="text-center m-1"> 
                                                <h4>Replacement Battery Information</h4>
                                            </div>
                                            <div class="dt-responsive table-responsive warrenty_card_div">
                                                <table class="table table-striped table-bordered nowrap warrenty_card_data ">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Stock Group Name</th>
                                                            <th>Battery Type</th>
                                                            <th>Batch Number</th>
                                                            <th>Card No</th>
                                                            <th>Date</th>
                                                            <th>User Name</th>
                                                            <th>Priority</th>
                                                        </tr>
                                                        </thead>
                                                    <tbody >
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
                                                                <td><?php if (!empty($row['userName'])) {
                                                                   echo $row['userName'];
                                                                  } ?></td>
                                                                    
                                                                <td>
                                                                        <?php   if (isset($row['priority'])) echo $row['priority']  == 2 ?'Replacement' : 'NEW'; ?>   
                                                                </td>
                                                                
                                                            </tr>
                                                          
                                                            <table class="table table-striped table-bordered nowrap warrenty_card_data ">
                                                                <div class="text-center m-1"> 
                                                                    <h4>Old Battery Information</h4>
                                                                </div>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Stock Group Name</th>
                                                                        <th>Battery Type</th>
                                                                        <th>Batch Number</th>
                                                                        <th>Card No</th>
                                                                        <th>Sales Date</th>
                                                                        <th>Warranty  Upto</th>
                                                                        <th>Dealer Name</th>
                                                                        <th>Branch Name</th>
                                                                        <th>Branch Area </th>
                                                                        <th>Sales Person </th>
                                                                        <th>Customer Name</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php if (!empty($row['old_stock_group_name'])) {
                                                                                echo $row['old_stock_group_name'];
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['old_product_name'])) {
                                                                                echo $row['old_product_name'];
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['old_product_serial'])) {
                                                                                echo $row['old_product_serial'];
                                                                            } ?></td>
                                                                        
                                                                        <td><?php if (!empty($row['old_card_no'])) {
                                                                                echo $row['old_card_no'];
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['sales_date'])) {
                                                                                echo  date("d-m-Y", strtotime( $row['sales_date']));
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['card_end_date'])) {
                                                                             echo  date("d-m-Y", strtotime( $row['card_end_date'])); 
                                                                            } ?></td>
                                                                        <td id="dealer" data-toggle="modal" data-target="#AddDealerModal" class="color" >
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
                                                                        <td><?php if (!empty($row['sales_person'])) {
                                                                                echo $row['sales_person'];
                                                                            } ?></td>
                                                                        <td><?php if (!empty($row['customer_name'])) {
                                                                                echo $row['customer_name'];
                                                                        } ?></td>
                                                                
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>    
                                             <?php } else{?>
                                            <div class="dt-responsive table-responsive  ">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap print-demo2 warrenty_card_data ">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Stock Group Name</th>
                                                            <th>Battery Type</th>
                                                            <th>Batch Number</th>
                                                            <th>Warrenty Card No</th>
                                                            <th>Warrenty Create Date</th>
                                                            <th>Sales Date</th>
                                                            <th>Warranty Upto</th>
                                                            <th>Dealer Name</th>
                                                            <th>Branch Name</th>
                                                            <th>Branch Area </th>
                                                            <th>Sales Person </th>
                                                            <th>Customer Name</th>
                                                            <th>Priority</th>
                                                    
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody >
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
                                                                <td id="dealer" data-toggle="modal" data-target="#AddDealerModal" class="color" >
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

                                                                <td><?php if (!empty($row['sales_person'])) {
                                                                    echo $row['sales_person'];
                                                                } ?></td>

                                                                <td><?php if (!empty($row['customer_name'])) {
                                                                        echo $row['customer_name'];
                                                                } ?></td>
                                                                <td>
                                                                    <?php  if (isset($row['priority'])) echo $row['priority']  == 1 ?'New' : 'Replacement'; ?>   
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } }else {?>
                                            <div class="noData">
                                                <h4>there is no data!</h4>
                                            </div>
                                            <?php }?>
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
      
        $('.warrenty_card_data tbody tr td').click(function(){
            $('.warrenty_color').removeClass('warrenty_color');
            $(this).addClass('warrenty_color');
        })
    });

    $('.edit').click(function() {
      $('.editModal').show();
        let id = $(this).val();
        let url="<?php echo route('warrantyCard/replacement/edit/')?>"+id;
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
                console.log(response)
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
                console.log(response)
              $('.area_name').val(response.area_name);
              $('.dealer_name').val(response.name);
              $('.sales_parson').val(response.sales_parson);
              $('.phone').val(response.phone_number);
                
            }
        })
    });
    $(document).on('click', '#close', function(e) {
         console.log('ok');
    });
   
</script>



