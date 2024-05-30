<style>
    .main-body .page-wrapper .page-header-title span {
        color: white;
        display: block;
        margin-top: 0%;
    }
</style>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <div class="page-header mt-4">
                            <div class="row align-items-center">
                                <div class="page-header-title">
                                    <!-- <div class="d-inline"> -->
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class=" card-header">
                                                <h4 class="card-title text-center">Replacement Battery List</h4>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label>Branch</label>
                                                        <select name="branch_id" class="form-control js-example-basic-single branch_id" id="branch_id">
                                                            <?php if ((session('user_lavel') == 2)||(session('user_lavel') == 8)) {
                                                                echo "<option value='" . $branchs[0]['id'] . "'>ALL</option>";                                                                
                                                            }else{ ?>
                                                            <option value="0">ALL</option>                                                            
                                                            <?php }?>
                                                            <?php if (!empty($branchs)) {
                                                                foreach ($branchs as $row) {
                                                                    if (!empty($row['id']) && !empty($row['name'])) {
                                                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                    }
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Area</label>
                                                        <select name="area_id" class="form-control js-example-basic-single  area_id " id="areaid" required>
                                                            <option value="0">ALL</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Dealer</label>
                                                        <select name="dealer_id" class="form-control js-example-basic-single  dealer_id" id="dealer_id" required>                                                            
                                                            <option value="0">ALL</option>
                                                            <?php if (!empty($dealers)) {                                                                
                                                                foreach ($dealers as $dlr) {
                                                                    if (!empty($dlr['id']) && !empty($dlr['name'])) {
                                                                        echo "<option value='" . $dlr['id'] . "'>" . $dlr['name'] . "</option>";
                                                                    }
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Stock Group</label>
                                                        <select name="stockgroup_id" class="form-control js-example-basic-single stockgroup_id">
                                                            <option value="0">ALL</option>
                                                            <!-- <?php // if ((session('user_lavel') != 2)||(session('user_lavel') != 3)) { ?>
                                                                <option value="All">ALL</option>
                                                            <?php // } ?> -->
                                                            <?php if (!empty($stockgroup)) {
                                                                foreach ($stockgroup as $stg) {
                                                                    if (!empty($stg['id']) && !empty($stg['name'])) {
                                                                        echo "<option value='" . $stg['id'] . "'>" . $stg['name'] . "</option>";
                                                                    }
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label>Battery Type</label>
                                                        <select name="batterytype_id" class="form-control js-example-basic-single batterytype_id">
                                                            <option value="0">ALL</option>
                                                            <!-- <? // php if ((session('user_lavel') != 2)||(session('user_lavel') != 3)) { ?>
                                                                <option value="All">ALL</option>
                                                            <?php // } ?> -->
                                                            <?php if (!empty($product)) {
                                                                foreach ($product as $prd) {
                                                                    if (!empty($prd['id']) && !empty($prd['name'])) {
                                                                        echo "<option value='" . $prd['id'] . "'>" . $prd['name'] . "</option>";
                                                                    }
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>                                                    
                                                    <div class="form-group col-md-1">
                                                        <label>From Date:</label>
                                                        <input type="date" name="CardNo" class="form-control FromDate my-2" value="<?php echo date("Y-m-d"); ?>" placeholder="" min="2023-04-01" required>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label>To Date:</label>
                                                        <input type="date" name="CardNo" class="form-control ToDate my-2" value="<?php echo date("Y-m-d"); ?>" placeholder="" required>
                                                    </div>
                                                    <div class="form-group col-md-1 mt-2">                                                        
                                                        <button type="button" class="btn btn-primary DealerSearch m-3">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-1"></div> -->
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body d-none">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Zero config.table start -->
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-block">
                                            <!-- <div class="text-center">
                                                <button type="button" id="printr" class="btn btn-primary btn-print-invoice m-b-5 btn-sm waves-effect waves-light m-r-20 print ">Print</button>
                                            </div> -->
                                            <div class="dt-responsive table-responsive warrenty_card_div">
                                                <table id="dealersearch" class="table table-striped table-bordered nowrap print-demo2">
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
                                                            <th>User</th>
                                                            <th>Edit</th>
                                                            <!-- <?php // if ((session('user_lavel') == 1)||(session('user_lavel') == 3)||(session('user_lavel') == 4) ||(session('user_lavel') == 7) ||(session('user_lavel') == 9)) { ?>     -->
                                                            <th>Delete</th>
                                                            <!-- <?php // } ?> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody class="warrenty_card_data">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="noData d-none">
                                                <h4>there is no data!</h4>
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


<script>
    $('#branch_id').on(' change', function() {
        var branch_id = $('#branch_id').val();
        $.ajax({
            url: "<?php echo route('dealer/area/get') ?>",
            type: "GET",
            data: {
                "branch_id": branch_id
            },
            dataType: "json",
            success: function(data) { 
                $('.area_id').html('<option value="0">ALL</option>');
                $.each(data, function(key, value) {
                    $(".area_id").append('<option value="' + value.id + '">' + value.area_name + '</option>');
                });
            }
        });
    });

    $('#areaid').on(' change', function() {
        var areaid = $('#areaid').val();
        $.ajax({
            url: "<?php echo route('warrantyCard/warrenty_search_dealer_name') ?>",
            type: "GET",
            data: {
                "areaid": areaid
            },
            dataType: "json",
            success: function(data) {  
                $('.dealer_id').html('<option value="0">ALL</option>');
                $.each(data, function(key, value) {
                    $(".dealer_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    });
</script>


<script type="text/javascript">
    $('.branch_id').on(' change', function() {
        var branch_id = $('.branch_id').val();
        var user_lavel = $('.user_lavel').val();
        $.ajax({
            url: "<?php echo route('warrantyCard/branch') ?>",
            type: "GET",
            data: {
                "branch_id": branch_id
            },
            dataType: "json",
            success: function(data) {

                if (user_lavel != 3) {
                    $('.user_id').html('<option value="All">ALL</option>');
                } else {
                    $('.user_id').html('<option value="0">Select Name</option>');
                }
                $.each(data, function(key, value) {
                    $(".user_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    });    
</script>

<script type="text/javascript">
    $(document).on('click', '.edit', function() {
        $('.editModal').show();
        let id = $(this).val();
        let url = "<?php echo route('warrantyCard/edit/') ?>" + id;
        $('.editApprove').click(function() {
            location.replace(url);
        })
    })

    $(document).ready(function() {
        $('.DealerSearch').click(function() {
            
            let branch_id = $('.branch_id').val();
            let area_id = $('.area_id').val();
            let dealer_id = $('.dealer_id').val();
            let stockgroup_id = $('.stockgroup_id').val();
            let batterytype_id = $('.batterytype_id').val();
            let FromDate = $('.FromDate').val();
            let ToDate = $('.ToDate').val();
            
            if (!dealer_id) {
                toastr.warning('Enter Dealer Name');
            }
            if (!FormData) {
                toastr.warning('Enter Form Date');
            }
            if (!ToDate) {
                toastr.warning('Enter To Date');
            }
            $('.warrenty_card_data').empty();
            // if (user_id && branch_id && FormDate && ToDate) {
            if (dealer_id && FromDate && ToDate) {
                $('.page-body').removeClass('d-none');
                let i=1;
                let user_level = "<?php echo session('user_lavel'); ?>";
                $('#dealersearch').DataTable({
                    "destroy": true,
                    ajax:{
                        url: "<?php echo route('warrantyCard/replacement/index'); ?>",
                        type: 'POST',
                        data: {
                            // 'user_id': user_id,
                            'branch_id': branch_id,
                            'area_id': area_id,
                            'dealer_id': dealer_id,
                            'stockgroup_id': stockgroup_id,
                            'batterytype_id': batterytype_id,
                            'FromDate': FromDate,
                            'ToDate': ToDate
                        }},
                        "columns": [
                            {
                                "render": () => i++
                            },
                            { "data": 'old_stock_group_name' },                                    
                            { "data": 'old_product_name' },
                            { "data": 'old_ProductSerial' },
                            { "data": 'group_name' },
                            { "data": 'name' },
                            { "data": 'product_serial' },
                            { "data": 'create_date' },
                            { "data": 'card_no' },
                            { "data": 'sales_date' },
                            { "data": 'card_end_date' },
                            { "data": 'dealerName' },
                            { "data": 'branchName' },
                            { "data": 'area_name' },                            
                            { "data": 'sales_person' },                            
                            { "data": 'customer_name' },                            
                            { "data": 'userName' },                            
                            { 
                                className: ()=>(user_level==8)? 'd-none':'',
                                "data": 'id',
                                "render": (data)=>(user_level==8)?'':(data)=> `<button type="button" class="btn btn-primary edit btn-sm" name="edit" value="${data}">Edit</button>`
                                
                            },    
                            { 
                                className: ()=>(user_level==2 || user_level==8)? 'd-none':'',
                                "data": 'id',
                                "render":(data)=>(user_level==2 || user_level==8)?'':`<button type="button" class="btn btn-danger delete btn-sm" name="delete" value="${data}">Delete</button>`
                            }                    
                        ],
                    "searching": true,
                    
                    // dom: 'Bfrtip',
                    dom: "<'row d-flex flex-row align-items-end'<'col-md-2'l><'col-md-6 text-center'B><'col-md-4 text-right'f>>trip",
                    buttons: [
                        'copyHtml5',
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4,6,7,8,9,10,11,12,13,14,15,16,17]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]
                            }
                        },
                    ]
                });
            } else {
                $('.page-body').addClass('d-none');
            }

        })
    })
</script>