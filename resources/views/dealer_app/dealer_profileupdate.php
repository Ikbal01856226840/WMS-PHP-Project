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
                <h3>Profile Update</h3>
              </div>
              <hr class="mx-3 my-0">
              <div class="card-body">
                <div class="row">
                  <form action="<?php echo route('auth/update/profile')?>" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Old User ID</label>
                      <div class="col-md-6 mt-2">
                        <input  type="text" name="user_name" class="form-control form-bg-primary" />
                        <?php if(isset($errors['user_name'])):?>
                            <span class="text-danger"><?php echo $errors['user_name'][0]; ?></span>
                        <?php endif;?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">New User ID</label>
                      <input  type="text" name="new_user_name" class="form-control form-bg-primary" />                        
                    </div>                    
                    <div class="mb-3">
                      <label for="pn" class="form-label">Old Password</label>
                      <div class="col-md-6 mt-2">
                        <input  type="password" name="old_password" class="form-control" placeholder=" Old Password input"/>
                        <?php if(isset($errors['old_password'])):?>
                            <span class="text-danger"><?php echo $errors['old_password'][0]; ?></span>
                        <?php endif;?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="pn" class="form-label">New Password</label>
                      <input  type="password" name="new_password" id="new_password" class="form-control"placeholder=" New Password input" />
                    </div>
                    <div class="mb-3">
                      <label for="pn" class="form-label">Re-Type New Password</label>
                      <div class="col-md-6">
                        <span id="passwordbadge" class=""></span>                        
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control"placeholder=" Re-type New Password input" />
                      </div>
                    </div>
                    <div class="mb-3 text-end">
                      <button type="submit" class="btn btn-success" disabled>Update Profile</button>
                    </div>
                  </form>            
                </div>                
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="services">

      </section>

      <script>
        $('#confirm_password').on('keyup', function () {
            var password = $("#new_password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password == confirmPassword)
                {
                  $("#passwordbadge").removeClass("badge rounded-pill bg-danger");
                  $("#passwordbadge").text("Password Matched").addClass("badge rounded-pill bg-success");
                  $(":submit").removeAttr("disabled");
                } else {
                  $("#passwordbadge").removeClass("badge badge-success");
                  $("#passwordbadge").text("Password didn't matched").addClass("badge rounded-pill bg-danger");
                  $(":submit").attr("disabled", true);                    
                }
        });
      </script>
   

<?php include('includes/footer.php') ?>
