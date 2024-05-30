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

      <section class="message-details">
        <div class="container">
            <div class="card">
                <div class="card-title card-img-top p-4">
                    <h3 class="text-white text-center"><?php echo $message_details['offer_name'] ?></h3>
                </div>
                <div class="card-body">
                    <p><?php echo $message_details['offer_message'] ?></p>
                    <?php if (!empty($message_details['offer_file'])) { ?>
                      <?php if((substr($message_details['offer_file'], -3)) == 'pdf') { ?>                                              
                          <img src="<?php echo asset('libraries/pdf.png'); ?>" class="w-100 img-responsive" alt="..." />
                      <?php }else{ ?>                      
                          <img src="<?php echo asset($message_details['offer_file']); ?>" class="w-100 img-responsive" alt="..." />
                      <?php } ?>
                      <div class="text-end mt-5">
                        <a class="btn btn-md btn-info" href="<?php echo asset($message_details['offer_file']) ?>" download>download</a>
                      </div>
                    <?php } ?>
                </div>
            </div>
        </div>        
      </section>   

      <section class="services">

      </section>
 
<?php include('includes/footer.php') ?>