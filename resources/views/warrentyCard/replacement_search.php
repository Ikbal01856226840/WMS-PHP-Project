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
                                            <form>
                                                <div class="card-header py-3">
                                                    <h4 class="card-title text-center m-0">Replacement Battery Search</h4>
                                                </div>
                                                <div class="card-body row p-2">
                                                    <div class="col-md-5">
                                                        <div class="form-group row me-3">
                                                            <label class="col-sm-4 col-form-label text-enter">Product Serial</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="ProductSerial" class="form-control ProductSerial" placeholder="" required autofocus>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group row me-3">
                                                            <label class="col-sm-4 col-form-label text-enter">Warrenty Card No</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="CardNo" class="form-control CardNo" placeholder="" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-primary cardSubmit ">Submit</button>
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
                        <div class="page-body d-none">
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
                                            <div class="dt-responsive table-responsive warrenty_card_div d-none">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap print-demo2">
                                                    <thead>
                                                        <tr>
                                                        <th>SL</th>
                                                                <th>Warrenty <br> Stock Group Name</th>
                                                                <th>Warrenty <br> Battery Type</th>
                                                                <th>Warrenty <br> Product Serial</th>
                                                                <th>Replacement <br> Stock Group Name</th>
                                                                <th>Replacement <br>Warrenty Battery Type</th>
                                                                <th>Replacement <br> Warrenty Product Serial</th>
                                                                <th>Replacement <br> Date</th>
                                                                <th>Warrenty <br> Card No</th>
                                                                <th>Sales Date</th>
                                                                <th>Warranty  Upto</th>
                                                                <th>Dealer Name</th>
                                                                <th>Branch Name</th>
                                                                <th>Branch Area </th>
                                                                <th>Sales Person </th>
                                                                <th>Customer Name</th>
                                                                <th>priority</th>
                                                    
                                                        </tr>
                                                    </thead>
                                                    <tbody class="warrenty_card_data">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="noData">
                                                <h4>there is no data!</h4>
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


<script type="text/javascript">
    $(document).ready(function(){
        $('.cardSubmit').click(function(){
            let ProductSerial=$('.ProductSerial').val();
            let CardNo=$('.CardNo').val();
             CardNo? CardNo:0
            
            // if(!ProductSerial){
            //     toastr.warning('Enter Product Serial');
            // }
            // if(!CardNo){
            //     toastr.warning('Enter Card Number');
            // }
            $('.warrenty_card_data').empty();
                $.ajax({
                    url: "<?php echo route('warrantyCard/replacement_search');?>",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'ProductSerial':ProductSerial,
                        'CardNo' :CardNo 
                    },
                    success:function(response){
                        $(".page-body").removeClass('d-none');                        
                        let data='';
                        if(response.length && response!=0){
                           
                            
                            for(i=0;i<response.length;i++){
                                data+="<tr>"+
                                "<td>"+(i+1)+
                                "<td>"+response[i]['old_stock_group_name']+"</td> <td>"+response[i]['old_product_name']+"</td>"+
                                "<td>"+response[i]['old_product_serial']+
                                "<td>"+response[i]['group_name']+"</td> <td>"+response[i]['name']+"</td>"+
                                "<td>"+response[i]['product_serial']+
                                "<td>"+response[i]['create_date']+
                                "<td>"+response[i]['card_no']+"</td> <td>"+response[i]['sales_date']+"</td>"+
                                "<td>"+response[i]['card_end_date']+"</td> <td>"+response[i]['dealerName']+"</td>"+
                                "<td>"+response[i]['branchName']+"</td> <td>"+response[i]['area_name']+"</td>"+
                                "<td>"+response[i]['sales_person']+"</td><td>"+response[i]['customer_name']+"</td>"+
                                "<td>"+(response[i]['priority']== 1 ? 'NEW' : 'Replacement')+"</td>"+
                                "</tr>";
                            }
                            $('.warrenty_card_data').html(data);
                            $('.noData').addClass('d-none');
                            $('.warrenty_card_div').removeClass('d-none');
                        }else{
                            $('.noData').removeClass('d-none');
                            $('.warrenty_card_div').addClass('d-none');
                        }
                        $('.warrrnty_edit').click(function() {
                            let id=$(this).val();
                            $('.deleteModal').show();
                            $('.deleteApprove').click(function(){
                                $('.deleteModal').hide();
                                $.ajax({
                                    url:'delete',
                                    type:'POST',dataType:'json',
                                    data:{'id':id},
                                    success:function(response){
                                        console.log(response);
                                    if(response==1){
                                        
                                        location.reload();
                                    
                                        toastr.success("Delect Success");
                                    } 
                                    }
                                })
                            })
                        })

                    }
                    
                })
            

        })
    })

</script>


