<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="<?php echo asset('service-assets/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="<?php echo asset('service-assets/css/custom.css')?>" />
  </head>
  <body>
    <div class="container-fluid p-0">
      <section class="header bg-success">
        <div class="row h-content">
          <div class="col-md-4 col-6 logo">
            <a href="http://hamkoservice.com/index.html"><img src="<?php echo asset('service-assets/img/logo-10.png')?>" alt="" /></a>
          </div>
          <div class="col-md-8 col-6">
            <nav class="navbar navbar-expand-lg menu">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="http://hamkoservice.com/">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="http://hamkoservice.com/objective.html">Objective</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href=" <?php echo route('service/show'); ?>">Service Center</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo route('service/customer/index'); ?>">Search</a>
                    </li>
                    <!-- <li class="dropdown">
                      <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" >DROP DOWN</a>
                      <ul class="dropdown-menu">
                        <li><a href="" class="dropdown-item">Gallery</a></li>
                      </ul>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link" href="https://service.hamkoservice.com/439/dealer/Hamko_Service.apk">App Store</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </section>

      <!-- Slider Start -->
      <section class="slider">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-inner">
            <?php foreach($image as $img){ 
              if(($img['image_active']))?>
            <div class="carousel-item active">
              <img src="<?php echo asset($img['image']) ?>" class="w-100 img-fluid" alt="..." />
            </div>
            <?php } ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>
      
      <!-- Slider End -->

      <!-- ======= Customer Section ======= -->
      <section class="search-show">
        <div class="container">          
          <div class="row justify-content-md-center">
            <div class="card my-3 p-4 col-md-12">
              <div class="row d-flex align-items-center customer">
                <div class="col-md-6">
                  <h5>নিকটস্থ “হ্যামকো” সেবা কেন্দ্র ও ডিলারের অবস্থান খুজে পেতে, আপনার অবস্থানরত স্থান / থানা / জেলা এর নাম নিচে টাইপ করুন।</h5> 
                </div>
                <div class="col-md-6">
                  <input type="text" id="search" class="form-control form-control-lg service_id" placeholder="Search here...">
                </div>
              </div>
            </div>
          </div>
          <!-- Serching Data View Start -->
          <div class="row">
            <div class="my-1 p-4">
              <div class="container">
                <div class="row  branch_service">
                </div>
              </div>
            </div>
          </div>
          <!-- Serching Data View End -->
        </div>
      </section>
      <!-- End Customer Section -->

      <footer class="footer bg-success">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-xs-12">
            <div class="align-items-center">
              <div class="d-flex justify-content-center mt-2">
                <div class="mx-2">
                  <a href="https://www.facebook.com/hamkobattery.official"><i class="fs-2 text-white bi bi-facebook"></i></a>
                </div>
                <div class="mx-2">
                  <a href="http://hamko.com.bd/"><i class="fs-2 text-white bi bi-globe2"></i></a>
                </div>
                <div class="mx-2">
                  <a href="https://www.youtube.com/@hamkobatteryofficial"><i class="fs-2 text-white bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-xs-12">
            <div class="foot-text">
              <span class="text-white">Copyright &copy; 2014-2022 <a href="http://www.hamko-ict.com/">HAMKO-ICT.</a> All rights reserved.</span>
            </div>
          </div>
        </div>
      </div>
    </footer>
    </div>
    <script src="<?php echo asset('service-assets/js/bootstrap.bundle.js') ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
          var search = document.getElementById("search");
          $('.service_id').on('keyup',function(){
          var service_id=$('.service_id').val();
          $.ajax({
              url:"<?php echo route('service/center/show'); ?>",
              dataType:"JSON",
              type:"GET",
              data : {'service_id':service_id},
              success:function(res){                       
                  if(res!=null){
                      search.scrollIntoView();
                      // $("html").scrollTop(350);                    
                  }
                  let data = '';
                  if(res==null){
                      $(".branch_service").html(""); 
                      $('.hd').hide();
                      $("html").scrollTop(0);
                  
                  }else if(res.service.length==0){
                      console.log(res.service.length);
                      $(".branch_service").html("<h4 style='text-align: center;'>No matching records found</h4>");
                      $('.hd').show();
                  }
                  else if(res.service){
                      for (i = 0; i < res.service.length; i++) {
                        data+=`<div class="col-md-4 col-xs-6 text-center">
                                <div class="row card mx-1 my-2 px-4">
                                  <h4 class="my-2">Service Center</h4>
                                  <h5 class="my-1 text-success">${res.service[i].service_center_name}</h5>
                                  <p class="text-center">${res.service[i].address},<br> <a href="tel:${res.service[i].Phone1}">${res.service[i].Phone1}</a> </p>
                                </div>
                              </div>`;
                      };                    
                  }
                  if(res.dealer.length==0){
                      $(".branch_service").html("<h4 style='text-align: center;'>No matching records found</h4>");
                      $('.hd').show();
                  
                  }else if(res.dealer ==''){
                      $(".branch_service").html(""); 
                      $('.hd').hide();
                  }
                  else if(res.dealer){
                      for (i = 0; i < res.dealer.length; i++) {
                          data +=`<div class="col-md-4 col-xs-6 text-center">
                                  <div class="row card mx-1 my-2 px-4">
                                    <h4 class="my-2">Dealer</h4>
                                    <h5 class="my-1 text-success">${res.dealer[i].name}</h5>
                                    <p class="text-center">${res.dealer[i].address},<br> <a href="tel:${res.dealer[i].phone1}">${res.dealer[i].phone1} </a></p>
                                  </div>
                                </div>`;
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
                          data +=`<div class="col-md-4 col-xs-6 text-center">
                                  <div class="row card mx-1 my-2 px-4">
                                    <h4 class="my-2">Retailer</h4>
                                    <h5 class="my-1 text-success">${res.retailer[i].name}</h5>
                                    <p class="text-center">${res.retailer[i].address},<br> <a href="tel:${res.retailer[i].phone1}">${res.retailer[i].phone1} </a></p>
                                  </div>
                                </div>`;
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
