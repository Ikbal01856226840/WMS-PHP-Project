<?php include('includes/navbar.php') ?>

  
      <section class="user-name">
        <div class="row mx-0">
          <!-- <div>
            <div class="row">
              <div class="col-6 text-start"><p class="text-start text-success py-2"><?php if(!empty(session('user_lavel'))) echo session('user_name'); ?> </p></div>
              <div class="col-6 text-end"> <a href="">Log-Out</a></div>
            </div>
          </div> -->
          <div><h3 class="py-2 text-center text-success">Welcome to <span class="text-danger">HAMKO</span> Service Department</h3></div>
        </div>
      </section>
      

      <!-- <section class="mobile-menu">
        <?php foreach($offers as $msg){ ?>
        <div class="container">
          <div class="card p-4">

            <div class="row">              
              <h1><?php echo $msg['offer_message']?></h1>
            </div>
          </div>
        </div>
        <?php } ?>
      </section> -->

      <section>
        <div class="container message">
          <div class="row">
            <div class="card p-4">
              <div class="card-title text-center">
                <h3>Collect New Phone Number</h3>
              </div>
              <hr class="mx-3 my-0">
              <div class="card-body">
                <div class="row">
                  <form action="<?php  echo route('dealerapp/number_store'); ?>" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><strong>Stock Group</strong></label>
                      <select name="stock_group_id" style="background-color: #01A9AC;" class="form-control js-example-basic-single stock_group_id" required>
                          <option value="">Select</option>
                          <?php foreach ($stocks as $stock) { ?>
                              <option value="<?php echo $stock['id']; ?>">
                                  <?php echo $stock['name']; ?>
                              </option>
                          <?php } ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="brand" class="form-label"><strong>Brand</strong> </label>
                      <div class="col-md-6 mt-2">
                          <input style="width: 20px; height:20px;" type="radio" name="brand_id" value="Hamko" required>
                          <label for="html" class="me-5">HAMKO</label>
                          <input style="width: 20px; height:20px;" type="radio" class="ms-4" id="css" name="brand_id" value="Others Brand">
                          <label for="css">Other Brand</label><br>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="pnut" class="form-label"><strong>Phone Number User Type</strong> </label>
                      <div class="col-md-6 mt-2">
                        <input style="width: 20px; height:20px;" type="radio" id="html" name="phone_type" value="Owner" required>
                        <label for="html"class="me-5">Owner</label>
                        <input style="width: 20px; height:20px;" type="radio" class="ms-5" id="css" name="phone_type" value="User/Driver">
                        <label for="css">User/Driver</label><br>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="pn" class="form-label"><strong>Phone Number</strong> </label>
                      <div class="mb-3">
                        <span id="user_name_span" class=""></span>
                        <!-- <span id="user_name_span" class="" style="font-size: small;"></span> -->
                        <input type="number" name="phone_number" id="phone_number" class="form-control CardNo duplicate_phone_number" placeholder="Phone Number" required>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="pn" class="form-label"><strong>Location</strong> </label>
                      <input type="text" name="location" class="form-control CardNo" placeholder="location" required >
                    </div>
                    <div class="mb-3">
                      <label for="pn" class="form-label"><strong>Customer Name</strong> </label>
                      <input type="text" name="customer_name" class="form-control" value="" placeholder="Customer Name" required>
                    </div>
                    <div class="mb-3">
                      <label for="pn" class="form-label"><strong>Date</strong> </label>
                      <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" placeholder="" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="pn" class="form-label"><strong>Note</strong> </label>
                      <input type="text" name="note" class="form-control DealerName" id='dealer' placeholder="Type for Suggestion" >
                    </div>
                    <div class="mb-3 text-end">
                      <button type="submit" class="btn btn-success"><strong>Store</strong></button>
                    </div>
                  </form>            
                </div>                
              </div>
            </div>
            <?php if(!empty($numbers)){?>
              <div class="card mt-5 py-5">
                <div class="row">
                  <h3 class="text-center mb-3 mx-0">Stored Numbers</h3>
                  <div class="dt-responsive table-responsive">
                      <table id="simpletable" class="table table-striped table-bordered nowrap print-demo2 warrenty_card_data">
                          <thead>
                              <tr class="align-middle fw-bolder align-center">
                                  <th class="text-center">SL</th>
                                  <th>Stock Group</th>
                                  <th>Brand</th>
                                  <th>User Type</th>
                                  <th>Phone Number</th>
                                  <th>Location</th>
                                  <th>Customer Name</th>                                                                                      
                              </tr>
                          </thead>                          
                          <tbody>
                              <?php foreach ($numbers as $key=>$row) { ?>
                                  <tr class="align-middle">
                                      <td class="text-center"><?php echo $key+1 ?></td>
                                      <td><?php if (!empty($row['stock_group_name'])) {echo $row['stock_group_name'];} ?></td>
                                      <td><?php if (!empty($row['brand'])) {echo $row['brand'];} ?></td>
                                      <td><?php if (!empty($row['phone_type'])) {echo $row['phone_type'];} ?></td>
                                      <td><?php if (!empty($row['phone_number'])) { echo $row['phone_number'];} ?></td>
                                      <td><?php if (!empty($row['location'])) { echo $row['location']; } ?></td>                                      
                                      <td><?php if (!empty($row['customer_name'])) { echo $row['customer_name']; } ?></td>  
                                  </tr>
                              <?php } ?>
                          </tbody>
                      </table>
                  </div>
                </div>                
              </div>
              <?php }else{?>
                <div class="card mt-5">
                  <div class="row">                    
                    <div class="py-3">
                        <h3 class="text-center mb-3">There is no data!!!</h3>
                    </div>
                  </div>  
                </div>
              <?php }?>
          </div>
        </div>
      </section>

      <section class="services">

      </section>
      <script>
        $('.duplicate_phone_number').on('keyup', function() {
        var phone = $('#phone_number').val();
        var stock_id = $('.stock_group_id').val();
        console.log(phone);
        console.log(stock_id);
        var user_exist = '';
        $.ajax({
            url: "<?php echo route('phoner_number/duplicate_number/check'); ?>",
            type: "GET",
            data: {
                "phone_number": phone,
                "stock_id": stock_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data == '0') {
                    $("#user_name_span").removeClass("badge rounded-pill bg-danger");
                    $("#user_name_span").text(' Phone ' + phone + " Available").addClass("badge rounded-pill bg-success");
                    $(":submit").removeAttr("disabled");
                } else {
                    $("#user_name_span").removeClass("badge badge-success");
                    $("#user_name_span").text(" Phone  And  Stock Group Name  Already Exists").addClass("badge rounded-pill bg-danger");
                    $(":submit").attr("disabled", true);
                }
            }
        });
    });
      </script>
   

<?php include('includes/footer.php') ?>
