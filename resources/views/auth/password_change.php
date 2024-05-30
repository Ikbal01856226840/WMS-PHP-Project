
<div class="pcoded-main-container">
    <div class="pcoded-content  ">
        <div class="pcoded-inner-content  " >
               <br>
                <!-- Main-body start -->
            <div class="main-body ">
                <div class="page-wrapper m-t-0 m-l-2 m-r-2 p-12">
                <!-- Page-header start -->
                    <div class="page-header m-0 p-0">
                        <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                            <div class="d-inline ">
                                <h4 class="text-center mx-auto">Change Password</h4>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <!-- Page body start -->
                    <div class="page-body">
                            <!-- Basic Form Inputs card start -->
                        <form action="<?php echo route('auth/change/password')?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="card-block ">
                                            <h6 class="m-t-0">Change Password</h6>
                                            <hr>
                                            <div class="form-group my-2 row">
                                                <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">User Name</label>
                                                <div class="col-xl-10 col-md-10 col-sm-10 col-xs-10">
                                                <input  type="text" name="user_name" class="form-control form-bg-primary" />
                                                  <?php if(isset($errors['user_name'])):?>
                                                      <span class="text-danger"><?php echo $errors['user_name'][0]; ?></span>
                                                  <?php endif;?>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">  Old  Password</label>
                                                <div class="col-xl-10 col-md-10 col-sm-10 col-xs-10">
                                                <input  type="password" name="old_password" class="form-control" placeholder=" Old Password input"/>
                                                <?php if(isset($errors['old_password'])):?>
                                                    <span class="text-danger"><?php echo $errors['old_password'][0]; ?></span>
                                                <?php endif;?>
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
                                                        <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">New  Password</label>
                                                        <div class="col-xl-10 col-md-10 col-sm-10">
                                                          <input  type="password" name="new_password" id="new_password" class="form-control"placeholder=" New Password input" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-xl-2 col-md-2 col-sm-2 col-form-label">Re-type New Password</label>
                                                        <div class="col-xl-10 col-md-10 col-sm-10">
                                                           <input type="password" name="confirm_password"class="form-control"placeholder=" Re-type New Password input" />
                                                        </div>
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
                                        <button type="submit" class="btn hor-grd btn-grd-primary btn-block submit" style="width:100%" ><u>S</u>ave</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <a class=" btn hor-grd btn-grd-success btn-block " href="<?php echo route('dashboard') ?>" style="width:100%"><u>B</u>ack</a>
                                    </div>
                                </div>
                            </div>
                                <!-- Input Alignment card end -->
                        </form>
                    </div>  
                </div>   
           </div>  
       </div>
   </div>
</div>
<script>
                             
  $(function()
{
  //Initialize the tooltips
  $('#change_password :input').each(function()
  {
      var tipelement = getTipContainer(this);

      $(tipelement).tooltipster({
         trigger: 'custom', 
         onlyOne: false, 
         position: 'bottom',
         multiple:false,
         autoClose:false});

  });
  
  //Setup the validator
  $('#change_password').validate(
      {
        rules:
        {
          full_name:{required:true },
          old_password:{required:true, rangelength: [8, 20] },
          new_password:{required:true ,rangelength: [8, 20]},
          confirm_password:{ required:true,rangelength: [8, 20],equalTo: "#new_password"},
        },
        messages:
        {
          'full_name':
          {
            required:"Please enter Name "
                                                             
          },
          'old_password':{
            required:"Please enter old password "
          },
          'new_password':{
            required:"Please enter new password "
          },
          'confirm_password':{
            required:"Please enter  confirm password ",
            equalTo:"confirm password does not match",
          },
         
        },
        errorPlacement: function(error, element) 
        {
          var $element = $(element),
              tipelement=element,
              errtxt=$(error).text(),
              last_error='';
          
            tipelement = getTipContainer(element);
          
            last_error = $(tipelement).data('last_error');
            $(tipelement).data('last_error',errtxt);
            if(errtxt !=='' && errtxt != last_error)
              {
                $(tipelement).tooltipster('content', errtxt);
                $(tipelement).tooltipster('show');
              }
        },
        success: function (label, element) 
        {
            var tipelement = getTipContainer(element);
            $(tipelement).tooltipster('hide');
        }
      });
  
  //this function selects a container for 'group' elements like 
  //check box /radio groups
  function getTipContainer(element)
  {
    var tipelement = element;
    if ( $(element).is(":checkbox") || $(element).is(":radio") )
    {
       tipelement = $(element).parents('.container').get(0);
    }
    return tipelement;
  }
});

</script>

