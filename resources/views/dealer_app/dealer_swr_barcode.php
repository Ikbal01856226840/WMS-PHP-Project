<?php include('includes/navbar.php') ?>

  <script src="<?php echo asset('service-assets/js/html5-qrcode.min.js') ?>"></script>

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

      <section>
        <div class="container message">
          <div class="row">
            <div class="card pt-3 px-4">
              <div class="card-title text-center">
                <h3>Warranty Card Search</h3>
              </div>
              <hr class="mx-3 my-0">
              <div class="card-body m-0 p-0">
                <div class="row">
                  <form class="swrForm" action="<?php echo route('dealerapp/swr'); ?>" method="GET">   
                    <div class="form-group row">
                        <div class="d-flex flex-row align-self-center">
                          <div class="col-sm-6 input-group my-4">
                            <input type="text" name="ProductSerial" class="form-control form-control-md ProductSerial barcode" value="<?php if(!empty($ProductSerial)) { echo $ProductSerial; } ?>" placeholder="Enter Product Serial" required="" autofocus="">
                            <button type="button" class="btn btn-md btn-success cardSubmit"><i class="bi bi-search"></i></button>                            
                          </div>  
                          <button type="button" class="btn barcode ms-2"><i style="font-size: 45px;" class="text-success bi bi-upc-scan"></i></button>
                        </div>                  
                        <div class="col-sm-6 barscanner"></div>
                    </div>
                  </form>            
                </div>                
              </div>
            </div>

              <div class="card py-1">
                <div class="row swr_data">                  
                  <h3 class="text-center mb-3 mx-0">There is no data!!!</h3>  
                </div>                
              </div>              
          </div>
        </div>
      </section>

      <section class="services">
        
      </section>

      <script>   
        $(document).ready(function(){                   
          $(".barcode").on("click", function(){
            $('.ProductSerial').val('');
            $('.swr_data').empty();
            $(".barscanner").empty().append(`<div id="qr-reader" style="width: 320px;"></div>`);
              var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", { 
                  fps: 5,
                  qrbox: {width:220,  height:120},
                  videoConstraints: {facingMode: { exact: "environment" }, },                  
                  // videoConstraints: {deviceId: { exact: cameraId }, },                  
                  rememberLastUsedCamera: true,
                  supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],                               
                });     
              html5QrcodeScanner.render(onScanSuccess);               
              function onScanSuccess(decodedText, decodedResult)  {                
                $('.ProductSerial').val(decodedText)
                let ProductSerial = $('.ProductSerial').val() || decodedText;                 
                html5QrcodeScanner.clear();
                $.ajax({
                  url: "<?php echo route('dealerapp/swr'); ?>",
                  dataType: "JSON",
                  method: "POST",
                  data: {
                      'ProductSerial': ProductSerial,
                  },
                  success: function(response) {  
                    let data = '';    
                    if (response.length) { 
                      data +=`<h3 class="text-center mx-0 mb-3"> Warranty Information</h3>
                        <div class="dt-responsive table-responsive">
                          <table class="table table-hover">                    
                            <tbody>`                                   
                            $.map(response,function(val, i){
                            data +=`
                              <tr>
                                <th>Stock Group Name</th>
                                <td>${val.group_name}</td>
                              </tr> 
                              <tr>
                                <th>Battery Type</th>
                                <td>${val.name}</td>
                              </tr> 
                              <tr>
                                <th>Batch Number</th>
                                <td>${val.product_serial}</td>
                              </tr> 
                              <tr>
                                <th>Warranty Card No</th>
                                <td>${val.card_no}</td>
                              </tr> 
                              <tr>
                                <th>Sales Date</th>
                                <td>${val.sales_date}</td>
                              </tr> 
                              <tr>
                                <th>Warranty Upto</th>
                                <td>${val.card_end_date}</td>
                              </tr>
                              `
                              if(val.old_product_serial){
                              data +=`
                              <tr>
                                <th colspan="2"><h3 class="text-center mx-0 mb-3">Old Battery Information</h3></th>
                              </tr>
                              <tr>
                                <th>Batch Number</th>
                                <td>${val.old_product_serial}</td>
                              </tr>
                              <tr>
                                <th>Battery Type</th>
                                <td>${val.old_product_name}</td>
                              </tr>
                              <tr>
                                <th>Stock Group Name</th>
                                <td>${val.old_stock_group_name}</td>
                              </tr>`                      
                              }})
                          data+=                     
                            `</tbody>
                          </table>                      
                        </div>`
                    }else{
                      data += `<h3 class="text-center mb-3">There is no data!!!</h3>`
                    }
                    $('.swr_data').empty().append(data)
                  }
                })       
              }
          });

          $('.cardSubmit').on('click',function(){
            $(".barscanner").empty()
          let ProductSerial = $('.ProductSerial').val().toUpperCase();
            onScanSuccess(ProductSerial, ProductSerial)
          });
        })

        function onScanSuccess(decodedText, decodedResult)  {
          $('.ProductSerial').val(decodedText)
          let ProductSerial = $('.ProductSerial').val() || decodedText;   
          $.ajax({
            url: "<?php echo route('dealerapp/swr'); ?>",
            dataType: "JSON",
            method: "POST",
            data: {
                'ProductSerial': ProductSerial,
            },
            success: function(response) {  
              let data = '';    
              if (response.length) { 
                data +=`<h3 class="text-center mx-0 mb-3"> Warranty Information</h3>
                  <div class="dt-responsive table-responsive">
                    <table class="table table-hover">                    
                      <tbody>`                                   
                      $.map(response,function(val, i){
                      data +=`
                        <tr>
                          <th>Stock Group Name</th>
                          <td>${val.group_name}</td>
                        </tr> 
                        <tr>
                          <th>Battery Type</th>
                          <td>${val.name}</td>
                        </tr> 
                        <tr>
                          <th>Batch Number</th>
                          <td>${val.product_serial}</td>
                        </tr> 
                        <tr>
                          <th>Warranty Card No</th>
                          <td>${val.card_no}</td>
                        </tr> 
                        <tr>
                          <th>Sales Date</th>
                          <td>${val.sales_date}</td>
                        </tr>                         
                        <tr>
                          <th>Warranty Upto</th>
                          <td>${val.card_end_date}</td>
                        </tr>`
                        if(val.old_product_serial){           
                        data +=`
                        <tr>
                          <th colspan="2"><h3 class="text-center mx-0 mb-3">Old Battery Information</h3></th>
                        </tr>
                        <tr>
                          <th>Batch Number</th>
                          <td>${val.old_product_serial}</td>
                        </tr>
                        <tr>
                          <th>Battery Type</th>
                          <td>${val.old_product_name}</td>
                        </tr>
                        <tr>
                          <th>Stock Group Name</th>
                          <td>${val.old_stock_group_name}</td>
                        </tr>`                      
                        }})
                    data+=                     
                      `</tbody>
                    </table>                      
                  </div>`
              }else{
                data += `<h3 class="text-center mb-3">There is no data!!!</h3>`
              }
              $('.swr_data').empty().append(data)
            }
          })       
        }
      
      </script>

<?php include('includes/footer.php') ?>
