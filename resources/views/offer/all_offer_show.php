<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
                                <form action="<?php echo route('offer/index'); ?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <label>Message Type</label>                                                            
                                            <select name="offer_type" class="form-control js-example-basic-single">
                                                <option value="0">ALL</option>
                                                <option <?php echo $offer_type == 1 ? 'selected' : '' ;?> value="1">Product Info</option>
                                                <option <?php echo $offer_type == 2 ? 'selected' : '' ;?> value="2">Messages</option>
                                                <option <?php echo $offer_type == 3 ? 'selected' : '' ;?> value="3">Price List</option>
                                            </select>
                                        </div>                                                       
                                        <div class="col-md-3">
                                            <label></label>
                                                <div class="form-group">
                                                    <button type="submit" class="btn hor-grd btn-grd-primary btn-block submit" style="width:100%">Search</button> 
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> 
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
                                                            <th>Message Type</th>
                                                            <th>Title</th>
                                                            <th>Message</th>                                                            
                                                            <th>Create Date</th>
                                                            <th>Created By</th>
                                                            <th>Dealers</th>
                                                            <th>Image</th>
                                                            <th class="d-print-none">Edit</th>
                                                            <th class="d-print-none">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php if (!empty($offers)) {
                                                            $i = 1;
                                                            foreach ($offers as $row) { ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $i; ?></td>
                                                                    <td>
                                                                        <span class="prd_id">
                                                                            <?php if (isset($row['offer_type'])) echo $row['offer_type'] == 1 ? "Product Information" : ($row['offer_type'] == 2 ? "Message" : "Price List"); ?>
                                                                        </span>
                                                                    </td>

                                                                    <td>
                                                                        <span class="Prd_stockGroup">
                                                                            <?php if (!empty($row['offer_name'])) echo $row['offer_name']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="prd_id">
                                                                            <p></p>
                                                                            <?php echo wordwrap($row['offer_message'], 20, "<br>\n"); ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="Prd_name">
                                                                            <?php if (!empty($row['start_date'])) echo $row['start_date']; ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="Prd_name">
                                                                            <?php if (!empty($row['user_name'])) echo $row['user_name']; ?>
                                                                        </span>
                                                                    </td>                                                                    
                                                                    <td class="text-center">
                                                                        <button class="btn btn-sm btn-warning" id="offer_id" value="<?php if (!empty($row['id'])) echo $row['id']; ?>" data-toggle="modal" data-target="#dealerview" data-toggle="modal" data-target="#myModal"><i class="feather icon-eye"></i></button>                                                                        
                                                                    </td>                                                                    
                                                                    <td class="text-center">
                                                                         <?php if (!empty($row['file'])){?>
                                                                            <?php if((substr($row['file'], -3)) == 'pdf') { ?> 
                                                                                <img src="<?php echo asset('libraries/pdf.png'); ?>" width="50px" height="60px" class="img-responsive" alt="..." />
                                                                            <?php }else{ ?>   
                                                                                <img src=" <?php echo asset($row['file']) ?>" width="100px" height="50px" alt="Offer Image">
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class=" d-print-none">
                                                                        <a href="<?php echo route('offer/edit/' . $row['id']); ?>" class="edit"><i class="btn btn-sm btn-primary mr-5 edit">Edit</i></a>
                                                                    </td>
                                                                    <td class=" d-print-none">
                                                                        <button class="btn btn-sm btn-danger delete" value="<?php if (!empty($row['id'])) echo $row['id']; ?>">Delete</button>
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


<!-- Dealer Modal  -->
<div class="modal fade " id="dealerview"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog the-modal">
        <div class="modal-content the-modal__container">
            <div class="modal-header .the-modal__header ">
                <h5 class="modal-title" id="exampleModalLabel">Dealer Information </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="row m-b-30">
                    <div class="col-lg-12 col-xl-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs md-tabs areainfo" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home3" role="tab" aria-expanded="true">Home</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-expanded="false">Profile</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages3" role="tab" aria-expanded="false">Messages</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#settings3" role="tab" aria-expanded="false">Settings</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content card-block dealertable">
                            <div class="tab-pane" id="home3" role="tabpanel" aria-expanded="true">
                                <table  class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Branch Name</th>
                                            <th>Area Name</th>
                                            <th>Dealer Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php // foreach ($data as $key=>$row) { ?> -->
                                            <tr>
                                                <!-- <td><?php // echo $key+1 ?></td> -->
                                                <td>Branch Name</td>
                                                <td>Branch Name</td>
                                                <td>Branch Name</td>
                                                <td>Branch Name</td>    
                                            </tr>
                                        <!-- <?php // } ?> -->
                                    </tbody>
                                </table>                                
                            </div>
                            <div style="background-color: white !important;" class="tab-pane" id="profile3" role="tabpanel" aria-expanded="false">
                                <p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                            </div>
                            <div class="tab-pane" id="messages3" role="tabpanel" aria-expanded="false">
                                <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                            </div>
                            <div class="tab-pane" id="settings3" role="tabpanel" aria-expanded="true">
                                <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
 $(document).ready(function() {
    $(document).on('click', '#offer_id', function(e) {
         var offer_id = $(this).closest("#offer_id").val();
         $.ajax({
            url: "<?php echo route('regular/offerdealer'); ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                'id': offer_id
            },
            success: function(response) {                
            console.log(response);
            let dealerinfo = '' ; let prev_area_id = 0;

            // let tableheader = ``;
                                    
            // let dealertable =   `<tr>
            //                         <td>SL</td>
            //                         <td>Branch Name</td>
            //                         <td>Area Name</td>
            //                         <td>Dealer Name</td>    
            //                     </tr>`;


            // let tablefooter = `         </tbody>
            //                         </table>                                
            //                     </div>`                        
            
            let table = '';

            $.each(response, function(key,val){
                if(prev_area_id != val.area_id){
                    if(prev_area_id != 0){
                        table+=`         </tbody>
                                    </table>                                
                                </div>`

                    }

                    prev_area_id = val.area_id
                    table +=`<div style="background-color: white !important;" class="tab-pane" id="text${val.area_id}" role="tabpanel" aria-expanded="true">
                                <table class="table table-striped table-bordered nowrap">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Branch Name</th>
                                            <th>Area Name</th>
                                            <th>Dealer Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>`
                    dealerinfo +=`
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#text${val.area_id}" role="tab" aria-expanded="true">${val.area_name}</a>
                                <div class="slide"></div>
                            </li>`;

                }

                table+=`<tr>                           
                            <td class="text-center">${val.branch_name}</td>
                            <td class="text-center">${val.area_name}</td>
                            <td>${val.dealer_name}</td>
                        </tr>`
                
                })

                table+=`         </tbody>
                                    </table>                                
                                </div>`

            $('.areainfo').empty().append(dealerinfo);              
            $('.dealertable').empty().append(table);    
            console.log(table)          ;
                
            }
        })
    });
 });
 </script>