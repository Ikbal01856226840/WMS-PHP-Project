<?php include('includes/navbar.php') ?>

      <section class="user-name">
        <div class="row mx-0">
          <div><h3 class="py-2 text-center text-success">Welcome to <span class="text-danger">HAMKO</span> Service Department</h3></div>
        </div>
      </section>
      

      <section>
        <div class="container message">
          <div class="row">
            <?php foreach($pricelist as $msg){ ?>
              <div class="col-md-6 my-2">
                <div class="card p-4">
                  <div class="card-title">
                    <h3><?php echo $msg['offer_name'] ?></h3>
                  </div>
                  <hr class="mx-3 my-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <p><?php echo substr_replace($msg['offer_message'], '...', 100) ?></p>
                      </div>
                      <div class="col-6">
                        <?php if (!empty($msg['offer_file'])) { ?>
                          <?php if((substr($msg['offer_file'], -3)) == 'pdf') { ?>                      
                              <img src="<?php echo asset('libraries/pdf.png'); ?>" class="w-100 img-responsive" alt="..." />
                          <?php }else{ ?>                      
                              <img src="<?php echo asset($msg['offer_file']); ?>" class="w-100 img-responsive" alt="..." />
                          <?php } ?>                          
                        <?php } ?>
                      </div>
                    </div>
                    <div class="row mt-2 flex justify-content-center">
                      <div class="col-6">
                        <?php if (!empty($msg['sender_name'])) { ?>
                          <span style="color: #05bfdb; font-size:smaller;">Sent By: <br> </span> <span style="font-size:smaller;"><?php echo $msg['sender_name'] ?></span>
                        <?php } ?>
                      </div>
                      <div class="col-6 text-end">
                        <a href="<?php  echo route('dealerapp/pricelist_details/'. $msg['id']); ?>" class="btn btn-sm btn-info">See Details</a>
                      </div>
                    </div>                    
                  </div>
                </div>                
              </div>
            <?php } ?>
          </div>
        </div>
      </section>

      <section class="services">

      </section>
   

<?php include('includes/footer.php') ?>
