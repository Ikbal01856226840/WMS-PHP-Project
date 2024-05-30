<style>
    body {

        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }

    .table-responsive {
        margin: auto;
    }

    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        min-width: 100%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        border-radius: 5px;
        padding-bottom: 10px;
        background: #435d7d;
        color: #fff;
        padding: 10px 30px;
        min-width: 90%;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-title .btn-group {
        float: right;
    }

    .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 3px 3px;
        vertical-align: middle;
    }

    /* table.table tr th:first-child {
        width: 60px;
    } */

    /* table.table tr th:last-child {
        width: 100px;
    } */

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }

    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
        outline: none !important;
    }

    table.table td a:hover {
        color: #2196F3;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.delete {
        color: #F44336;
    }

    table.table td i {
        font-size: 19px;
    }

    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }

    .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }

    .pagination li a:hover {
        color: #666;
    }

    .pagination li.active a,
    .pagination li.active a.page-link {
        background: #03A9F4;
    }

    .pagination li.active a:hover {
        background: #0397d6;
    }

    .pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }

    /* Custom checkbox */
    .custom-checkbox {
        position: relative;
    }

    .custom-checkbox input[type="checkbox"] {
        opacity: 0;
        position: absolute;
        margin: 5px 0 0 3px;
        z-index: 9;
    }

    .custom-checkbox label:before {
        width: 18px;
        height: 18px;
    }

    .custom-checkbox label:before {
        content: '';
        margin-right: 10px;
        display: inline-block;
        vertical-align: text-top;
        background: white;
        border: 1px solid #bbb;
        border-radius: 2px;
        box-sizing: border-box;
        z-index: 2;
    }

    .custom-checkbox input[type="checkbox"]:checked+label:after {
        content: '';
        position: absolute;
        left: 6px;
        top: 3px;
        width: 6px;
        height: 11px;
        border: solid #000;
        border-width: 0 3px 3px 0;
        transform: inherit;
        z-index: 3;
        transform: rotateZ(45deg);
    }

    .custom-checkbox input[type="checkbox"]:checked+label:before {
        border-color: #03A9F4;
        background: #03A9F4;
    }

    .custom-checkbox input[type="checkbox"]:checked+label:after {
        border-color: #fff;
    }

    .custom-checkbox input[type="checkbox"]:disabled+label:before {
        color: #b8b8b8;
        cursor: auto;
        box-shadow: none;
        background: #ddd;
    }

    /* Modal styles */
    .modal .modal-dialog {
        max-width: 400px;
    }

    .modal .modal-header,
    .modal .modal-body,
    .modal .modal-footer {
        padding: 20px 30px;
    }

    .modal .modal-content {
        border-radius: 3px;
        font-size: 14px;
    }

    .modal .modal-footer {
        background: #ecf0f1;
        border-radius: 0 0 3px 3px;
    }

    .modal .modal-title {
        display: inline-block;
    }

    .modal .form-control {
        border-radius: 2px;
        box-shadow: none;
        border-color: #dddddd;
    }

    .modal textarea.form-control {
        resize: vertical;
    }

    .modal .btn {
        border-radius: 2px;
        min-width: 100px;
    }

    .modal form label {
        font-weight: normal;
    }
</style>
<style type="text/css">
    table td {
        border: none;
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
                        <div class="page-header mt-4 ">
                            <div class="row align-items-end text-center mt-5">
                                <div class="col-sm-12 ">
                                    <h4 class="text-center">Add New Message / Price List / Product Information</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <!-- Basic Form Inputs card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <!-- <h5>Add Admin</h5> -->
                                            <div class="card-header-right">
                                                <i class="icofont icofont-spinner-alt-5"></i>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <form action="<?php echo route('regular/offer/save'); ?>" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12 text-left">
                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label">Message Title</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="offer_name" class="form-control" placeholder="Enter Offer Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label">Message Create Date</label>
                                                            <div class="col-sm-10">
                                                                <input type="date" name="start_date" class="form-control" required value="<?php echo date('Y-m-d') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label">Message End Date</label>
                                                            <div class="col-sm-10">
                                                                <input type="date" name="end_date" class="form-control" required value="<?php echo date('Y-m-d') ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label">Message Type</label>
                                                            <div class="col-sm-10">
                                                                <select name="offer_type" class="form-control js-example-basic-single" required>
                                                                    <option value="1">Product Information</option>
                                                                    <option value="2">Messages</option>
                                                                    <option value="3">Price List</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label">Message</label>
                                                            <div class="col-sm-10">
                                                                <textarea name="offer_message" class="form-control"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label">Branch</label>
                                                            <div class="col-sm-10">
                                                                <select name="branch_id" class="form-control js-example-basic-single branch_id">
                                                                    <?php if ((session('user_lavel') == 2) || (session('user_lavel') == 4) || (session('user_lavel') == 8)) {
                                                                        echo "<option value='" . $branchs[0]['id'] . "'>ALL</option>";                                                                
                                                                    }else{ ?>
                                                                    <option value="All">ALL</option>                                                            
                                                                    <?php }?>
                                                                    <?php if (!empty($branchs)) {
                                                                        foreach ($branchs as $row) { ?>
                                                                            <option <?php if (!empty($branch_id)) { echo $branch_id == $row['id']  ? 'selected' : ''; } ?> value="<?php echo $row['id']; ?>">
                                                                                <?php echo $row['name']; ?>
                                                                            </option>
                                                                    <?php }
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label">Branch Area</label>
                                                            <div class="col-sm-10">
                                                                <select name="area_id[]" class="form-control js-example-basic-multiple area_id" multiple="multiple">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-10">
                                                                <div class="row">
                                                                    <div class="table-responsive">
                                                                        <div class="table-wrapper">
                                                                            <div class="table-title">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <h2><b>Dealer</b></h2>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <table class="table table-striped table-bordered nowrap tdd">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>
                                                                                            <span class="custom-checkbox">
                                                                                                <input type="checkbox" id="selectAll">
                                                                                                <label for="selectAll"></label>
                                                                                            </span>
                                                                                        </th>
                                                                                        <th>Dealer Name</th>
                                                                                        <!-- <th>Particulars</th> -->
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="dealer_id">
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-10">
                                                                <div class="row">
                                                                    <div class="table-responsive">
                                                                        <div class="table-wrapper">
                                                                            <div class="table-title">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <h2><b>Retrailer</b></h2>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group my-2 row">
                                                                                <div class="col-sm-12">
                                                                                    <select name="access_retrailer[]" id="access_retrailer_id" class="js-example-basic-multiple col-sm-12" multiple="multiple">
                                                                                        <option class="disable_value" value="0">ALL</option>
                                                                                        <?php
                                                                                        if (!empty($retrailer_offers)) {
                                                                                            foreach ($retrailer_offers as $retrailer_offer) { ?>
                                                                                                <option class="enable_value" value="<?php if (!empty($retrailer_offer['id'])) echo $retrailer_offer['id']; ?>">
                                                                                                    <?php if (!empty($retrailer_offer['name'])) echo $retrailer_offer['name']; ?>
                                                                                                </option>
                                                                                        <?php }
                                                                                        } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <table class="table table-striped table-bordered nowrap ">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>
                                                                                            <span class="custom-checkbox">
                                                                                                <input type="checkbox" id="checkretailer">
                                                                                                <label for="checkretailer"></label>
                                                                                            </span>
                                                                                        </th>
                                                                                        <th>Retailer Name</th>
                                                                                        <!-- <th>Particulars</th> -->
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="retrailer_id">
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label"></label>

                                                            <div class="col-sm-10">
                                                                <table class="table " id="dynamic_field">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">More File (Click Add For
                                                                            More File)</h3>
                                                                    </div>
                                                                    <tr>
                                                                        <td><input type="file" name="offer_file[]" class="form-control name_list" /></td>

                                                                    </tr>

                                                                </table>
                                                                <td class="m-0 p-0"><button type="button" name="add" id="add" class="btn btn-success m-1 p-2 ">Add</button>
                                                                </td>

                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <div class="col-sm-12 text-center">
                                                                <button type="submit" class="btn btn-primary px-5 mt-4">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2"></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.branch_id').on(' change', function() {
        var branch_id = $('.branch_id').val();
        $.ajax({
            url: "<?php echo route('dealer/area/get') ?>",
            type: "GET",
            data: {
                "branch_id": branch_id
            },
            dataType: "json",
            success: function(data) {
                $(".area_id").empty();
                $(".area_id").append('<option  value="0">ALL</option>');
                $.each(data, function(key, value) {
                    $(".area_id").append('<option class="d" value="' + value.id + '">' + value
                        .area_name + '</option>');
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {

        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added"><td><input type="file"  name="offer_file[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove m-0 p-2 " >X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#selectAll').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

    });
    $(document).ready(function() {

        $('#checkretailer').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

    });

    $('.branch_id, .area_id').on('keyup blur change', function() {
        var branch_id = $('.branch_id').val();
        var area_id = $('.area_id').val();

        if (area_id[0] == 0) {
            $(".d").attr('disabled', 'disabled');
        } else {
            $(".d").removeAttr('disabled');
        }
        // console.log(area_id);
        $.ajax({
            url: "user_id",
            type: "GET",
            data: {
                "branch_id": branch_id,
                'area_id': area_id
            },
            dataType: "json",
            success: function(res) {

                var data = '';
                if (res == null) {

                    $('#dealer_id').html('');
                } else {
                    $.each(res, function(key, value) {
                        $.each(value, function(key, val) {
                            data = data + "<tr>";
                            data = data + "<td>";
                            data = data + '<span class="custom-checkbox">'
                            data = data +
                                '<input type="checkbox" id="selectAll" name="dealer_id[]"   value="' +
                                val.id + '" checked> '
                            data = data + '<label for="selectAll"></label>'
                            data = data + '</span>'
                            data = data + "</td>";
                            data = data + "<td class='text-left' >" + val.name +
                                "</td>";
                            data = data + "<tr>";
                        });
                    });
                    $('#dealer_id').html(data);
                }
            }
        });
    });
    $('#access_retrailer_id').on('keyup blur change', function() {
        var access_retrailer_id = $('#access_retrailer_id').val();
        var acc_re = $(this).val();
        if (acc_re[0] == 0) {
            $(".enable_value").attr('disabled', 'disabled');
        } else {
            $(".enable_value").removeAttr('disabled');
        }

        $.ajax({
            url: "access_retrailer",
            type: "GET",
            data: {
                "access_retrailer_id": access_retrailer_id
            },
            dataType: "json",
            success: function(res) {
                console.log(res);
                var data = '';
                if (res == null) {

                    $('#retrailer_id').html('');
                } else {
                    $.each(res, function(key, value) {
                        // console.log(value);
                        $.each(value, function(key, val) {
                            data = data + "<tr>";
                            data = data + "<td>";
                            data = data + '<span class="custom-checkbox">'
                            data = data +
                                '<input type="checkbox" id="checkretailer" name="retrailer_id[]"   value="' +
                                val.id + '" checked> '
                            data = data + '<label for="checkretailer"></label>'
                            data = data + '</span>'
                            data = data + "</td>";
                            data = data + "<td class='text-left' >" + val.name +
                                "</td>";
                            data = data + "<tr>";
                        });
                    });
                    $('#retrailer_id').html(data);
                }
            }
        });
    });
</script>