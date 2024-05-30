<div class="pcoded-main-container">
    <div class="pcoded-content  ">
        <div class="pcoded-inner-content  " >
               <br>
                <!-- Main-body start -->
            <div class="main-body ">
                <div class="page-wrapper m-t-0 m-l-2 m-r-2 p-12">
                <!-- Page-header start -->
                    <div class="page-header m-0 p-0">
                        <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                            <div class="d-inline ">
                                <h4 class="text-center mx-auto">Guarantee/Warranty Edit</h4>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <!-- Page body start -->
                    <div class="page-body">
                            <!-- Basic Form Inputs card start -->
                        <form action="<?php echo route('warrantyCard/save'); ?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="card-block ">
                                            <h6 class="m-t-0">Guarantee/Warranty Edit</h6>
                                            <hr>
                                            <div class="form-group my-2 my-2 my-1  row">
                                                <label class="col-md-3 col-form-label">Product Serial</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="ProductSerial" class="form-control ProductSerial ProductSerial_id barcode" value="<?php if (!empty($data[0]['product_serial'])) echo $data[0]['product_serial']; ?>" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1  row ">
                                                <label class="col-md-3 col-form-label">Stock Group</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control " id="stock_group" value="<?php if (!empty($data[0]['group_name'])) echo $data[0]['group_name']; ?>" required readonly>
                                                    <input type="hidden" name="stock_group_id" class="form-control  stock_group_id" id="stock_group_id" value="<?php if (!empty($data[0]['stock_group_id'])) echo $data[0]['stock_group_id']; ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1  row ">
                                                <label class="col-md-3 col-form-label">Battery Type</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="name" class="form-control name pName" id="name" value="<?php if (!empty($data[0]['name'])) echo $data[0]['name']; ?>" placeholder="Type for Suggestion" required readonly>
                                                    <input type="hidden" name="product_id" class="form-control name product_id" id="product_id" placeholder="Type for Suggestion" value="<?php if (!empty($data[0]['product_id'])) echo $data[0]['product_id']; ?>"  required>
                                                    <input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
                                                 </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Card No</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="CardNo" class="form-control CardNo" value="<?php if (!empty($data[0]['card_no'])) echo $data[0]['card_no']; ?>" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Sales Date</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="SalesDate" class="form-control SalesDate" id="datepicker" d="datepicker"  value="<?php echo date("d-m-Y", strtotime( $data[0]['sales_date'])) ?>"  required>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Guarantee/Warranty End Date</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="CardEndDate" class="form-control CardEndDate" value="<?php if (!empty($data[0]['card_end_date'])) echo date("d-m-Y", strtotime( $data[0]['card_end_date'])) ; ?>" placeholder="" required readonly>
                                                    <input class="month" type="hidden" value="<?php  echo $month ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Dealer Name</label>
                                                <div class="col-md-8">
                                                <input  id="my_ajax"  type="text" name="dealer_name" class="form-control " placeholder="Type for Suggestion" value="<?php if(!empty($data[0]['dealerName'])) echo $data[0]['dealerName'] ?>" required autocomplete="off" >
                                                <input  id="dealer_id"  type="hidden" name="dealer_id" class="form-control "  value="<?php if(!empty($data[0]['dealer_id'])) echo $data[0]['dealer_id'] ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Branch Name</label>
                                                <div class="col-md-8">
                                                 <input  id="branch_name" style="background-color: #e9ecef;" type="text" name="branch_name" class="form-control " placeholder="Type for Suggestion"  value="<?php if(!empty($data[0]['branchName'])) echo $data[0]['branchName'] ?>" required autocomplete="off" onkeypress="return false;">
                                                 <input  id="branch_id"  type="hidden" name="branch_id" class="form-control " value="<?php if(!empty($data[0]['branch_id'])) echo $data[0]['branch_id'] ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                <label class="col-md-3 col-form-label">Branch Area</label>
                                                <div class="col-md-8">
                                                    <input id="area_name" type="text" name="area_name" class="form-control " value="<?php if(!empty($data[0]['area_name'])) echo $data[0]['area_name'] ?>" readonly>
                                                    <input id="area_id" type="hidden" name="area_id" value="<?php if(!empty($data[0]['area_id'])) echo $data[0]['area_id'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group my-2 my-2 my-1 row">
                                                    <label class="col-md-3 col-form-label">Sales Person</label>
                                                    <div class="col-md-8">
                                                        <input id="SalesPerson" type="text" name="SalesPerson" class="form-control" value="<?php if(!empty($data[0]['sales_parson'])) echo $data[0]['sales_parson'] ?>" readonly>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6 "  >
                                        <div class="card-block  " > 
                                            <h6 class="">Basic Inputs</h6>
                                            <hr>
                                            <div class=" b-l-default m-t-0 " style="margin-left:-36px;">
                                                <div style="margin-left: 36px;">
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Customer Name</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="CustomerName" class="form-control CustomerName" value="<?php if (!empty($data[0]['customer_name'])) echo $data[0]['customer_name']; ?>" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Customer Address</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="CustomerAddress" class="form-control CustomerAddress" value="<?php if (!empty($data[0]['customer_address'])) echo $data[0]['customer_address']; ?>" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Customer Phone</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="CustomerPhone" class="form-control CustomerPhone" value="<?php if (!empty($data[0]['customer_phone'])) echo $data[0]['customer_phone']; ?>" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Reference</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Reference" class="form-control Reference" value="<?php if (!empty($data[0]['reference'])) echo $data[0]['reference']; ?>" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 my-2 my-1 row">
                                                        <label class="col-md-3 col-form-label">Priority</label>
                                                        <div class="col-md-8">
                                                            <select name="Priority" class="form-control Priority" >
                                                                <option <?php echo $data[0]['priority'] == 1 ? 'selected' : ''; ?> value="1">New</option>
                                                                <option <?php echo $data[0]['priority'] == 2 ? 'selected' : ''; ?> value="2">Replacement</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <button type="submit" class="btn hor-grd btn-grd-primary btn-block submit create" style="width:100%" ><u>S</u>ave</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <a class=" btn hor-grd btn-grd-success btn-block " href="<?php echo route('dashboard') ?>" style="width:100%"><u>B</u>ack</a>
                                    </div>
                                </div>
                            </div>
                                <!-- Input Alignment card end -->
                        </form>
                    </div>  
                </div>   
           </div>  
       </div>
   </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> 
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
        $("#datepicker" ).datepicker({
             dateFormat:"dd-mm-yy",
             changeMonth: true,
             changeYear: true
        });
     });
     (function ($) {
  $(document).ready(function () {
      $('#my_ajax').autocomplete({
        // minChars: 1,
        source: function(request, response) {
          $.ajax({
            type: 'GET',
            dataType: 'json',
            url:"<?php echo route('dealer/data'); ?>", 
            data: {
                    name: request.term
                },
            success: function(data) {
              response( $.map( data, function( item ) {
                var object = new Object();
                  object.label = item.name;
                  object.value = item.name;
                  object.id = item.id;
                  object.branch_name = item.branch_name;
                  object.branch_id= item.branch_id;
                  object.area_id= item.area_id;
                  object.area_name= item.area_name;
                  object.sales_parson= item.sales_parson;
                  return object
              }));
        
            }
          });
        },
        select: function (event, ui) {
          $("#my_ajax").val(ui.item.value);
          $('#dealer_id').val(ui.item.id);
          $('#branch_name').val(ui.item.branch_name);
          $('#branch_id').val(ui.item.branch_id);
          $('#area_name').val(ui.item.area_name);
          $('#area_id').val(ui.item.area_id);
          $('#SalesPerson').val(ui.item.sales_parson);
         }
      });

  });

 })(jQuery);
     $(document).ready(function(){
       
       $('.ProductSerial_id').on('keyup keypress blur change click keydown',function(){
          let serial_id=$('.ProductSerial_id').val().toUpperCase();  
          
          $.ajax({
           url:"<?php echo route('warrantyCard/serial'); ?>",
           type:"GET",
           data:{
              'serial_id':serial_id
           },
           dataType: "JSON",
           success:function(res){
              console.log( res.date);
              if(res.interger){
                $('.pName').val(res.interger.name);
                $('.product_id').val(res.interger.id);
              }
             if(res.stock_group){
                $('#stock_group').val(res.stock_group.name);
                $('#stock_group_id').val(res.stock_group.id);
             }
              if(res.date==null){
                  $('.CardEndDate').val('<?php echo date('Y-m-d'); ?>');
              }else{
                  $('.CardEndDate').val(res.date);
              }
              if(res.month){
                $('.month').val(res.month);
                // dateCalculate(parseInt(res.month));
            }
               
           }
  
          });
       });
     
  
      });
    $(document).ready(function() {
        let productArr = [];
        let dealerArr = [];
        productdata();
        dealerdata();

        function productdata(id = null) {
            $.ajax({
                url: "<?php echo route('product/data'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {},
                success: function(response) {
                    if (response.length) {
                        for (i = 0; i < response.length; i++) {
                            productArr[i] = response[i]['id'] + '-' + response[i]['name'];
                        }
                    }
                }
            })
        }
        $("#name").autocomplete({
            source: productArr
        });

        function dealerdata() {
            $.ajax({
                url: "<?php echo route('dealer/data'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {},
                success: function(response) {
                    if (response.length) {
                        for (i = 0; i < response.length; i++) {
                            dealerArr[i] = response[i]['id'] + '-' + response[i]['name'];
                        }
                    }
                }
            })
        }
        $("#dealer").autocomplete({
            source: dealerArr
        });

        function productdataId(id = null) {
            $.ajax({
                url: "<?php echo route('product/data'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    'id': id
                },
                success: function(response) {
                    if (response[0]['warranty']) {
                        dateCalculate(response[0]['warranty']);
                    } else {
                        dateCalculate(12);
                    }
                }
            })
        }

        // $('.name').change(function() {
        //     let name = $('.name').val();
        //     if (name) {
        //         let id = name.split("-");
        //         productdataId(id[0]);
        //     }
        // })

        $('.SalesDate').on('change',function() {
            dateCalculate(parseInt($('.month').val()));

        })
    })
    function dateCalculate($month) {
        let month = 0;
        let year = 0;
        let SalesDate = $('.SalesDate').val();
        console.log(SalesDate);
        let startDate = SalesDate.split('-');
        console.log(startDate);
        if ((parseInt(startDate[1]) + parseInt($month)) > 12) {
            month = parseInt(startDate[1]) + parseInt($month);
            year = $month / 12;
            if(((parseInt(startDate[1]) + parseInt($month)) - (parseInt(year) * 12))>12){
                year=parseInt(year)+1; 
            }
            startDate[1] = (parseInt(startDate[1]) + parseInt($month)) - (parseInt(year) * 12);
            startDate[2] = parseInt(startDate[2]) + parseInt(year);
        } else {
            startDate[1] = (parseInt(startDate[1]) + parseInt($month));
        }
        let warrentyEndDate = startDate[0] + '-' + startDate[1] + '-' + startDate[2];
        if (parseInt(startDate[1]) < 10) {
            warrentyEndDate = startDate[0] + '-0' + startDate[1] + '-' + startDate[2];
        }
        
        $('.CardEndDate').val(warrentyEndDate);
    }
</script>