<style>
    .main-body .page-wrapper .page-header-title span {
        color: white;
        display: block;
        margin-top: 0%;
    }
</style>

<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> -->
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
                                                <h4 class="card-title text-center"> Date Wise Warranty Search</h4>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="form-group col-md-3 ">
                                                        <label>Branch</label>
                                                        <select name="branch_id" class="form-control js-example-basic-single branch_id">
                                                            <option value="0">Select</option>
                                                            <?php if ((session('user_lavel') != 2)||(session('user_lavel') != 3)) { ?>
                                                                <option value="All">ALL</option>
                                                            <?php } ?>
                                                            <?php if (!empty($branchs)) {
                                                                foreach ($branchs as $row) {
                                                                    if (!empty($row['id']) && !empty($row['name'])) {
                                                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                    }
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 ">
                                                        <input type="hidden" name="user_lavel" class="form-control user_lavel" value="<?php echo session('user_lavel'); ?>" placeholder="" required>
                                                        <label>User</label>
                                                        <select name="user_id" class="form-control js-example-basic-single user_id">
                                                            <option value="0">Select</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2  ">
                                                        <label>From Date:</label>
                                                        <input type="date" name="CardNo" class="form-control FormDate" value="<?php echo date("Y-m-d"); ?>" placeholder="" min="2023-04-01" required>
                                                    </div>
                                                    <div class="form-group col-md-2 ">
                                                        <label>To Date:</label>
                                                        <input type="date" name="CardNo" class="form-control ToDate" value="<?php echo date("Y-m-d"); ?>" placeholder="" required>
                                                    </div>
                                                    <div class="form-group col-md-2 text-center p-2">
                                                        <label></label>
                                                        <button type="button" class="btn btn-primary WarrentySubmit">Submit</button>
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
                                            <div class="text-center">
                                                <button type="button" id="printr" class="btn btn-primary btn-print-invoice m-b-5 btn-sm waves-effect waves-light m-r-20 print ">Print</button>
                                            </div>
                                            <div class="dt-responsive table-responsive warrenty_card_div d-none">
                                                <table id="example" class="table table-striped table-bordered nowrap print-demo2">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Stock Group Name</th>
                                                            <th>Battery Type</th>
                                                            <th>Product Serial</th>
                                                            <th>Warrenty Card No</th>
                                                            <th>Sales Date</th>
                                                            <th>Warranty Upto</th>
                                                            <th>Dealer Name</th>
                                                            <th>Branch Name</th>
                                                            <th>Branch Area </th>
                                                            <th>Sales Person </th>
                                                            <th>Customer Name</th>
                                                            <th>User</th>
                                                            <th>Edit</th>                                                            
                                                            <?php if(session('user_lavel')==1 || session('user_lavel')==3 || session('user_lavel')==4 ||  session('user_lavel')==5 || session('user_lavel')==6 ||session('user_lavel')==7){ ?>                                                        
                                                            <th>Delete</th> 
                                                            <?php } ?> 
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
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->

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

        $('.WarrentySubmit').click(function() {
            let user_id = $('.user_id').val();
            let branch_id = $('.branch_id').val();
            let FormDate = $('.FormDate').val();
            let ToDate = $('.ToDate').val();
            if (!user_id) {
                toastr.warning('Enter Product Serial');
            }
            if (!branch_id) {
                toastr.warning('Enter Product Serial');
            }
            if (!FormDate) {
                toastr.warning('Enter Form Date');
            }
            if (!ToDate) {
                toastr.warning('Enter To Date');
            }
            $('.warrenty_card_data').empty();
            if (user_id && branch_id && FormDate && ToDate) {
                $.ajax({
                    url: "<?php echo route('warrantyCard/warrenty_search_date'); ?>",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'user_id': user_id,
                        'branch_id': branch_id,
                        'FormDate': FormDate,
                        'ToDate': ToDate
                    },
                    success: function(response) {
                        $(".page-body").removeClass('d-none');
                        let data = ''; let user_level = "<?php echo session('user_lavel'); ?>";
                        console.log(user_level);
                        if (response.length && response != 0) {
                            //response.map(function(i)
                            for (i = 0; i < response.length; i++) {
                                data += `<tr>
                                            <td>${ i + 1 } </td>
                                            <td>${response[i]['group_name']}</td>
                                            <td>${response[i]['name'] }</td>
                                            <td>${response[i]['product_serial'] }</td>
                                            <td>${response[i]['card_no'] }</td>
                                            <td>${response[i]['sales_date'] }</td>
                                            <td>${response[i]['card_end_date'] }</td>
                                            <td>${response[i]['dealerName'] }</td>
                                            <td>${response[i]['branchName'] }</td>
                                            <td>${response[i]['area_name'] }</td>
                                            <td>${response[i]['sales_person'] }</td>
                                            <td>${response[i]['customer_name'] }</td>
                                            <td>${response[i]['userName'] }</td>
                                            <td> <button type="button" class="btn btn-primary edit btn-sm" name="edit" value="${response[i]['id']}">Edit</button></td>
                                            ${(user_level == 1 || user_level == 3 || user_level == 4 ||  user_level == 5 || user_level == 6 || user_level == 7)?                                           
                                                `<td><button type="button" class="btn btn-danger delete btn-sm" name="delete" value="${response[i]['id']}">Delete</button></td>` : ''
                                            }
                                        </tr>`;
                            }
                            $('.warrenty_card_data').append(data);
                            $('.noData').addClass('d-none');
                            $('.warrenty_card_div').removeClass('d-none');
                        } else {
                            $('.noData').removeClass('d-none');
                            $('.warrenty_card_div').addClass('d-none');
                        }
                        $('#example').DataTable({
                            "searching": true,
                            scrollCollapse: false,
                            paging: true,
                            // dom: 'Bfrtip',
                            lengthMenu: [
                                [10, 25, 50, 100, 500, 1000, -1],
                                [10, 25, 50, 100, 500, 1000, 'All']
                            ],
                            
                        });
                    }
                })
            } else {
                $('.page-body').addClass('d-none');
            }

        })
    })
</script>