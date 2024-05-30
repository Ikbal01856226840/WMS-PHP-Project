<!DOCTYPE html>
<html lang="en">

<head>
<title><?php echo $title ?? '';?>WMS</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo asset('libraries\images\favicon.ico')?>" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('libraries\bower_components\bootstrap\css\bootstrap5.css')?>">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('libraries\icon\themify-icons\themify-icons.css')?>">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('libraries\icon\icofont\css\icofont.css')?>">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('libraries\css\style.css')?>">
</head>
<style>
    .hd {
  display: none;
}
</style>
<body class="fix-menu">
    <!-- Pre-loader start -->

    <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
            <div class="page-body">
            <div class="col-sm-12">
                <div class="container"> 
                <div class="row justify-content-center">              
                        <div class="col-sm-4 ">
                            <!-- Search result 2 card start -->
                            <div class="card">
                                <div class="card-block" style="text-align: center;">
                                    
                                    <div class="row ">
                                        <div class="col-sm-2  "></div>
                                        <div class="col-sm-8  col-xs-12 text-center " style="text-align: center;">
                                            <div class=" input-group-button input-group-primary text-center " style="text-align: center;">
                                            <h6> Searching For Service Center & Dealer Location</h6>
                                                <input type="text" class="form-control text-center service_id" placeholder="Search here..." style="text-align: center;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Search result 2 card end -->
                            <!-- <h4 class="m-b-20">Search Results Found</h4> -->
                            
                        <div class="card card-main hd">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12 sh_id">
                                            <div class="branch_service">
                                                </div>
                                                    
                                                    
                                        </div>  
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>   
                    <!-- Authentication card start -->
                    
                        <form class="md-float-material form-material"action="<?php echo route('auth/login_check')?>" method="post" >
                            <div class="text-center">
                                <!-- <img src="<?php echo asset('libraries\assets\images\logo.png')?>" alt="logo.png"> -->
                                <h4>WMS</h4>
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Sign In</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="user_name" class="form-control" required="" placeholder="User Name">
                                        <?php if(isset($errors['user_name'])):?>
                                        <span class="text-danger"><?php echo $errors['user_name'][0]; ?></span>
                                     <?php endif;?>
                                    </div>
                                    <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <?php if(isset($errors['password'])):?>
                                        <span class="text-danger"><?php echo $errors['password'][0]; ?></span>
                                     <?php endif;?>
                                    </div>
                                    
                                    <div class="row m-t-30">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Thank you.</p>
                                            <p class="text-inverse text-left"><a href="index-1.htm"><b class="f-w-600"></b></a></p>
                                        </div>
                                        <div class="col-md-2">
                                            <!-- <img src="<?php echo asset('libraries\images\auth\Logo-small-bottom.png')?>" alt="small-logo.png"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
   
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?php echo asset('libraries\bower_components\jquery\js\jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo asset('libraries\bower_components\jquery-ui\js\jquery-ui.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo asset('libraries\bower_components\popper.js\js\popper.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo asset('libraries\bower_components\bootstrap\js\bootstrap5.min.js')?>"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo asset('libraries\bower_components\jquery-slimscroll\js\jquery.slimscroll.js')?>"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo asset('libraries\bower_components\modernizr\js\modernizr.js')?>"></script>
    <script type="text/javascript" src="<?php echo asset('libraries\bower_components\modernizr\js\css-scrollbars.js')?>"></script>
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(document).ready(function(){
    $('.service_id').on('keyup',function(){
        
     var service_id=$('.service_id').val();
     $.ajax({
        url:"service/branch/show",
        dataType:"JSON",
        type:"GET",
        data : {'service_id':service_id},
        success:function(res){
           
            var data = '';
            if(res==null){
                $(".branch_service").html(""); 
                $('.hd').hide();
               
            }else if(res.service==''){
                $(".branch_service").html("<h4 style='text-align: center;'>No matching records found</h4>");
                $('.hd').show();
               
            }
            else if(res.service){
               
                
                for (i = 0; i < res.service.length; i++) {
                   
                    data =data+' <div class="container col-md-12 show_id" style="text-align: center;">';
                    data =data+'<div class="card   col-md-12" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">';
                    data =data+ '<div class="search-content  col-md-12">';    
                    data =data+'<div class="card-block  col-md-12">';
                    data =data+'<h5 style="text-align: center;">Service center</h5>';
                    data =data+'<h5 class="card-title">'+res.service[i].service_center_name+'</h5>';
                    data =data+'<p class="p-0 m-0">'+res.service[i].address+'</p>';
                    data =data+'<p class="p-0 m-0">'+res.service[i].Phone1+'</p>';
                    // data =data+'<p class="card-text"><small class="text-muted">Last updated 12 mins ago</small></p>';
                    data =data+'</div>'
                    data =data+'</div>'
                    data =data+'</div>'
                    data =data+'</div>'
                };
              
                //$(".branch_service").empty();
               
                
            }if(res.dealer.length==0){
                $(".branch_service").html("<h4 style='text-align: center;'>No matching records found</h4>");
                $('.hd').show();
               
            }else if(res.dealer ==''){
                $(".branch_service").html(""); 
                $('.hd').hide();
            }
            else if(res.dealer){
                for (i = 0; i < res.dealer.length; i++) {
                   data =data+' <div class="container col-md-12 show_id" style="text-align: center;">';
                   data =data+'<div class="card   col-md-12" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">';
                   data =data+ '<div class="search-content  col-md-12">';    
                   data =data+'<div class="card-block  col-md-12">';
                   data =data+'<h5 style="text-align: center;">Dealer</h5>';
                   data =data+'<h5 class="card-title">'+res.dealer[i].name+'</h5>';
                   data =data+'<p class="p-0 m-0">'+res.dealer[i].address+'</p>';
                   data =data+'<p class="p-0 m-0">'+res.dealer[i].phone1+'</p>';
                   // data =data+'<p class="card-text"><small class="text-muted">Last updated 12 mins ago</small></p>';
                   data =data+'</div>'
                   data =data+'</div>'
                   data =data+'</div>'
                   data =data+'</div>'
               };
            }
            if(res.retailer.length==0){
                $(".branch_service").html("<h4 style='text-align: center;'>No matching records found</h4>");
                $('.hd').show();
               
            }else if(res.retailer==''){
                $(".branch_service").html(""); 
                $('.hd').hide();
            }
            else if(res.retailer){
                for (i = 0; i < res.retailer.length; i++) {
                   
                   data =data+' <div class="container col-md-12 show_id" style="text-align: center;">';
                   data =data+'<div class="card   col-md-12" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">';
                   data =data+ '<div class="search-content  col-md-12">';    
                   data =data+'<div class="card-block  col-md-12">';
                   data =data+'<h5 style="text-align: center;">Retailer</h5>';
                   data =data+'<h5 class="card-title">'+res.retailer[i].name+'</h5>';
                   data =data+'<p class="p-0 m-0">'+res.retailer[i].address+'</p>';
                   data =data+'<p class="p-0 m-0">'+res.retailer[i].phone1+'</p>';
                   // data =data+'<p class="card-text"><small class="text-muted">Last updated 12 mins ago</small></p>';
                   data =data+'</div>'
                   data =data+'</div>'
                   data =data+'</div>'
                   data =data+'</div>'
               };
            }
            $(".branch_service").html(data);
            $('.hd').show();
               

        }
        



     });

    });
  })
</script>
</body>

</html>