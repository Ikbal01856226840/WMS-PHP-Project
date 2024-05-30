<?php include('includes/navbar.php') ?>

      <section class="user-name">
        <div name="notification" id="notification" class="collapse">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
        
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
      

      <section class="mobile-menu">
        <div class="container">
          <div class="card p-4">
            <div class="row"> 
              <?php if(session('user_lavel')==5){  ?>             
                <div class="col-6 my-2">
                  <a href="<?php echo route("dealerapp/message"); ?>">
                    <div class="card card-bg text-center">
                        <p>Message</p>
                        <div class="menu-item">                      
                          <div class="pb-3">
                            <div class="icon">
                              <i class="bi bi-envelope-paper-fill"></i>
                            </div>                        
                          </div>
                        </div>
                    </div>
                  </a>                  
                </div>
                <div class="col-6 my-2">
                  <a href="<?php echo route("dealerapp/offers"); ?>">
                    <div class="card card-bg text-center">
                        <p class="text-center mt-3">Product Info</p>
                        <div class="menu-item">                      
                          <div class="pb-3">
                            <div class="icon">
                              <i class="bi bi-megaphone-fill"></i>
                            </div>                        
                          </div>
                        </div>
                    </div>
                  </a>
                </div>
                <div class="col-6 my-2">
                  <a href="<?php echo route("dealerapp/pricelist"); ?>">
                  <div class="card card-bg text-center">
                      <p class="text-center mt-3">Price List</p>
                      <div class="menu-item">                      
                        <div class="pb-3">
                          <div class="icon">
                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                          </div>                        
                        </div>
                      </div>
                  </div>
                  </a>
                </div>
              <?php }elseif(session('user_lavel')==4){  ?>
                <div class="col-6 my-2">
                  <a href="<?php echo route("dealerapp/number"); ?>">
                  <div class="card card-bg text-center">
                      <p class="text-center my-0">Collect Number</p>
                      <div class="menu-item">                      
                        <div class="pb-3">
                          <div class="icon">
                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                          </div>                        
                        </div>
                      </div>
                  </div>
                  </a>
                </div>
              <?php }  ?>
              <div class="col-6 my-2">
                <a href="<?php echo route("dealerapp/swr"); ?>">
                <div class="card card-bg text-center">
                    <p class="text-center my-0">Search Warranty</p>
                    <div class="menu-item">                      
                      <div class="pb-3">
                        <div class="icon">
                          <i class="bi bi-upc-scan"></i>
                        </div>                        
                      </div>
                    </div>
                 </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="services">


      </section>
   


<?php include('includes/footer.php') ?>