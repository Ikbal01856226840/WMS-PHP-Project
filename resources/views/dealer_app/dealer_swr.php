<?php include('includes/navbar.php') ?>

  <!-- <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script> -->
  <script src="https://unpkg.com/html5-qrcode"></script>
  <!-- <script src="<?php echo asset('service-assets/js/barcode.js') ?>"></script> -->

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
                <h3>Warranty Card Search</h3>
              </div>
              <hr class="mx-3 my-0">
              <div class="card-body">
                <div class="row">
                  <form action="<?php echo route('dealerapp/swr'); ?>" method="GET">   
                    <div class="form-group row">
                        <div class="col-sm-3 py-2">
                          <label>Product Serial</label>
                        </div>                       
                        <div class="col-sm-6 py-2">
                          <input type="text" name="ProductSerial" class="form-control ProductSerial barcode mb-4" value="<?php if(!empty($ProductSerial)) { echo $ProductSerial; } ?>" required="" autofocus="">
                          <!-- <div id="qr-reader" style="width: 600px"></div> -->
                          <!-- <input type="file" accept="image/*" capture="camera" /> -->
                        </div>
                        <div class="col-sm-3 py-2 text-end">
                          <button type="submit" class="btn btn-primary cardSubmit">Search</button>
                        </div>
                    </div>
                  </form>            
                </div>                
              </div>
            </div>
            <?php if(!empty($swr)){?>
              <div class="card mt-5 py-5">
                <div class="row">
                  <h3 class="text-center mb-3"> Warranty Information</h3>
                  <div class="dt-responsive table-responsive  ">
                      <table id="simpletable" class="table table-striped table-bordered nowrap print-demo2 warrenty_card_data">
                      <thead>
                              <tr class="align-middle align-center">
                                  <th>SL</th>
                                  <th>Stock Group Name</th>
                                  <th>Battery Type</th>
                                  <th>Batch Number</th>
                                  <th>Warranty Card No</th>
                                  <!-- <th>Warrenty Create Date</th>-->
                                  <th>Sales Date</th>
                                  <th>Warranty Upto</th>
                                  <!--<th>Dealer Name</th>
                                  <th>Branch Name</th>
                                  <th>Branch Area </th>
                                  <th>Sales Person </th>
                                  <th>Customer Name</th>
                                  <th>Priority</th> -->                          
                              </tr>
                          </thead>                          
                          <tbody>
                              <?php foreach ($swr as $key=>$row) { ?>
                                  <tr class="align-middle">
                                      <td><?php echo $key+1 ?></td>
                                      <td><?php if (!empty($row['group_name'])) {echo $row['group_name'];} ?></td>
                                      <td><?php if (!empty($row['name'])) { echo $row['name'];} ?></td>
                                      <td><?php if (!empty($row['product_serial'])) { echo $row['product_serial']; } ?></td>                                      
                                      <td><?php if (!empty($row['card_no'])) { echo $row['card_no']; } ?></td>

                                      <!-- <td><?php if (!empty($row['create_date'])) { echo  date("d-m-Y", strtotime( $row['create_date'])); } ?></td> -->

                                      <td><?php if (!empty($row['sales_date'])) { echo  date("d-m-Y", strtotime( $row['sales_date'])); } ?></td>
                                      <td><?php if (!empty($row['card_end_date'])) { echo  date("d-m-Y", strtotime( $row['card_end_date'])); } ?></td>

                                      <!-- <td><?php if (!empty($row['dealerName'])) { echo $row['dealerName']; } ?></td>
                                      <td id="branch" data-toggle="modal" data-target="#AddBranchModal"><?php if (!empty($row['branchName'])) { echo $row['branchName']; } ?>
                                          <input class="branch_id" type="hidden" value="<?php if (!empty($row['branch_id'])) echo $row['branch_id']; ?>">
                                      </td>
                                      <td id="area" data-toggle="modal" data-target="#AddAreaModal" ><?php if (!empty($row['area_name'])) { echo $row['area_name']; } ?>
                                        <input class="area_id" type="hidden" value="<?php if (!empty($row['area_id'])) echo $row['area_id']; ?>">
                                      </td>
                                      <td><?php if (!empty($row['sales_person'])) { echo $row['sales_person']; } ?></td>
                                      <td><?php if (!empty($row['customer_name'])) { echo $row['customer_name']; } ?></td>
                                      <td><?php if (isset($row['priority'])) echo $row['priority']  == 1 ?'New' : 'Replacement'; ?></td> -->

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

        function onScanSuccess(decodedText, decodedResult) {

            console.log(`Code scanned = ${decodedText}`, decodedResult);
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
          "qr-reader", { 
            fps: 10,
            qrbox: {width:400,  height:200},
            // supportedScanTypes: [Html5QrcodeScanType.CODE_128],
           });
        html5QrcodeScanner.render(onScanSuccess);

        // function onScanSuccess(decodedText, decodedResult) {
        //     // Handle the scanned code as you like, for example:
        //     console.log(`Code matched = ${decodedText}`, decodedResult);
        //   }

        //   const formatsToSupport = [
        //     Html5QrcodeSupportedFormats.QR_CODE,
        //     Html5QrcodeSupportedFormats.UPC_A,
        //     Html5QrcodeSupportedFormats.UPC_E,
        //     Html5QrcodeSupportedFormats.UPC_EAN_EXTENSION,
        //   ];
        //   const html5QrcodeScanner = new Html5QrcodeScanner(
        //     "reader",
        //     {
        //       fps: 10,
        //       qrbox: { width: 250, height: 250 },
        //       formatsToSupport: formatsToSupport
        //     },
        //     /* verbose= */ false);
        //   html5QrcodeScanner.render(onScanSuccess);
       
      
      </script>
   

<?php include('includes/footer.php') ?>
