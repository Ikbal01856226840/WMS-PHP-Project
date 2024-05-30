<style>
    th.hide_me,
    td.hide_me {
        display: none;
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
                            <div class="row align-items-end">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4> Offer Dealer List</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Zero config.table start -->
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="example" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Dealer/Company Name</th>
                                                            <th>Dealer Alise</th>
                                                            <th>Dealer Details</th>
                                                            <th>Area</th>
                                                            <th>Branch</th>
                                                            <th>Address</th>
                                                            <th class="hide_me">Thana</th>
                                                            <th>District</th>
                                                            <th class="hide_me">Email</th>
                                                            <th>Phone 1</th>
                                                            <th class="hide_me">Phone2</th>
                                                            <th class="hide_me">Fax</th>
                                                            <th class="d-print-none">Edit</th>
                                                            <th class="d-print-none">Delete</th>
                                                            

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($data)) {
                                                            $i = 1;
                                                            // dd($data);
                                                            foreach ($data as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>

                                                                    <td>
                                                                        <span class="dealer_name text-wrap" style="max-width:8%;">
                                                                            <?php if (!empty($row['name'])) echo $row['name']; ?>
                                                                        </span>
                                                                    </td>

                                                                    <td>
                                                                        <span class="dealer_alise">
                                                                            <?php if (!empty($row['dealeralise'])) echo $row['dealeralise']; ?>
                                                                        </span>
                                                                    </td>

                                                                    <td>
                                                                        <span class="dealer_details">
                                                                            <?php if (!empty($row['dealerdetails'])) echo $row['dealerdetails']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="area_1">
                                                                            <?php if (!empty($row['area'])) echo $row['area']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="branch_1">
                                                                            <?php if (!empty($row['branch_name'])) echo $row['branch_name']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="dealera_ddress text-wrap" style="max-width:8%;">
                                                                            <?php if (!empty($row['address'])) echo $row['address']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td class="hide_me">
                                                                        <span class="dealer_district">
                                                                            <?php if (!empty($row['thana'])) echo $row['thana']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="dealer_district">
                                                                            <?php if (!empty($row['district'])) echo $row['district']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td class="hide_me">
                                                                        <span class="dealer_district">
                                                                            <?php if (!empty($row['email'])) echo $row['email']; ?>
                                                                        </span>
                                                                    </td>

                                                                    <td>
                                                                        <span class="d_phone1">
                                                                            <?php if (!empty($row['phone1'])) echo $row['phone1']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td class="hide_me">
                                                                        <span class="d_phone2">
                                                                            <?php if (!empty($row['phone2'])) echo $row['phone2']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td class="hide_me">
                                                                        <span class="d_phone2">
                                                                            <?php if (!empty($row['fax'])) echo $row['fax']; ?>
                                                                        </span>
                                                                    </td>

                                                                    <td class="d-print-none">
                                                                        <button type="button" class="btn btn-sm btn-primary edit mr-5" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Edit</button>
                                                                        <button type="button" class="btn btn-sm btn-info back mr-5 d-none" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Back</button>
                                                                    </td>
                                                                    <td class="d-print-none">
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

<!-- Dealer Edit Modal -->

<div class="modal dealereditModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title text-center" id="exampleModalLabel1"><b>Editting Offer Dealer Information</b></h5>
            </div>
            <form action="">
            <div class="card">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6" >
                            <div class="card-block ">
                                <h6 class="m-t-0">Add Offer Dealer</h6>
                                <hr>
                                <div class="form-group my-2 row">
                                    <label class="col-md-3 col-form-label"> Dealer Name</label>
                                    <div class="col-md-8">
                                        <input name="DealerName" class="form-control DealerName" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group my-2 row">
                                    <label class="col-md-3 col-form-label">Dealer Alias</label>
                                    <div class="col-md-8">
                                        <input type="text" name="DealerAlias" class="form-control DealerAlias" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group my-2 row">
                                    <label class="col-md-3 col-form-label"> Dealer Details</label>
                                    <div class="col-md-8">
                                        <textarea name="DealerDetails" class="form-control DealerDetails" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group my-2 row">
                                    <label class="col-md-3 col-form-label"> Address</label>
                                    <div class="col-md-8">
                                        <textarea name="Address" class="form-control Address" placeholder="" ></textarea>
                                        
                                    </div>
                                </div>
                                <div class="form-group my-2 row">
                                    <label class="col-md-3 col-form-label">Branch</label>
                                    <div class="col-md-8">
                                        <select name="branch_id" class="form-control  branch_id"  required>
                                            <option value="0">Select</option>
                                            <?php
                                            if (!empty($branchs)) {
                                                foreach ($branchs as $branch) { ?>
                                                    <option value="<?php if (!empty($branch['id'])) echo $branch['id']; ?>"><?php if (!empty($branch['name'])) echo $branch['name']; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group my-2 row">
                                    <label class="col-md-3 col-form-label">Thana /Upzila</label>
                                    <div class="col-md-8">
                                        <input type="text" name="thana" class="form-control Thana" placeholder="" >
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
                                    <div class="form-group my-2 row">
                                        <label class="col-md-3 col-form-label">Area</label>
                                        <div class="col-md-8">
                                            <textarea name="area" class="form-control area" placeholder=""></textarea>
                                            
                                        </div>
                                    </div>
                                        <div class="form-group my-2 row">
                                            <label class="col-md-3 col-form-label">District</label>
                                            <div class="col-md-8">
                                                <input type="text" name="District" class="form-control District" placeholder="" >
                                            </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Email</label>
                                                <div class="col-md-8">
                                                    <input type="email" name="Email" class="form-control Email" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Phone1</label>
                                                <div class="col-md-8">
                                                    <input type="number" name="Phone1" class="form-control Phone1" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Phone2</label>
                                                <div class="col-md-8">
                                                    <input type="number" name="Phone2" class="form-control Phone2" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-3 col-form-label">Fax</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="Fax" class="form-control Fax" placeholder="">
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
                            <button type="submit" class="btn hor-grd btn-grd-primary btn-block submit dealerupdate" style="width:95% ; margin:2%" ><u>S</u>ave</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <a class=" btn hor-grd btn-grd-success btn-block " href="<?php echo route('dashboard') ?>" style="width:95%;margin:2%"><u>B</u>ack</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">

            </div> -->
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            paging: false,
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',

                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                },

                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                },
            ]
        });
    });
    $(document).ready(function() {
        $('.edit').click(function() {
            let id = $(this).closest('tr').find(this).val();
            console.log(id);
            $.ajax({
                url: 'edit',
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function(response) {
                    console.log(response);
                    // if (response == 1) {
                    $('.dealerupdate').val(response[0].id);
                    $('.DealerAlias').val(response[0].dealeralise);
                    $('.DealerName').val(response[0].name);
                    $('.DealerDetails').val(response[0].dealerdetails);
                    $('.Address').val(response[0].address);
                    $('.area').val(response[0].area);
                    $('.branch_id').val(response[0].branch_id);
                    $('.District').val(response[0].district);
                    $('.Thana').val(response[0].thana);
                    $('.Email').val(response[0].email);
                    $('.Phone1').val(response[0].phone1);
                    $('.Phone2').val(response[0].phone2);
                    $('.Fax').val(response[0].fax);
                }
            })
            $('.dealereditModal').show();

            $('.dealerupdate').click(function(event) {
                event.preventDefault();
                let thiss = $(this);
                let id = $(this).val();
                let dealeralise = $('.DealerAlias').val();
                let dealername = $('.DealerName').val();
                let dealerdetails = $('.DealerDetails').val();
                let address = $('.Address').val();
                let area=$('.area').val();
                let branch_id=$('.branch_id').val();
                let district = $('.District').val();
                let thana = $('.Thana').val();
                let email = $('.Email').val();
                let phone1 = $('.Phone1').val();
                let phone2 = $('.Phone2').val();
                let fax = $('.Fax').val();
                $.ajax({
                    url: "<?php echo route('offer/dealer/save'); ?>",
                    dataType: "JSON",
                    method: "POST",
                    data: {
                        'id': id,
                        'DealerName': dealername,
                        'DealerAlias': dealeralise,
                        'DealerDetails': dealerdetails,
                        'Address': address,
                        'area':area,
                        'branch_id':branch_id,
                        'thana': thana,
                        'District': district,
                        'Email': email,
                        'Phone1': phone1,
                        'Phone2': phone2,
                        'Fax': fax
                    },
                    success: function(response) {
                        console.log(response);

                        $('.dealereditModal').hide();
                        location.reload();

                    }
                })
            })
        })
    })
</script>