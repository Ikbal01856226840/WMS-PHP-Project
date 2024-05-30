<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Dealer</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('service-assets/css/bootstrap.min.css')?>">

<link rel="stylesheet" type="text/css" href="<?php echo asset('service-assets/css/font-awesome.css')?>">

<link rel="stylesheet" href="<?php echo asset('service-assets/css/templatemo-klassy-cafe-dealer.css')?>">

<link rel="stylesheet" href="<?php echo asset('service-assets/css/owl-carousel.css')?>">

<link rel="stylesheet" href="<?php echo asset('service-assets/css/lightbox.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo asset('libraries\bower_components\bootstrap\css\bootstrap5.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo asset('libraries\css\style.css')?>">
    <style>
        #scroll-container {

  overflow: hidden;
}

#scroll-text {
  height: 100%;
  text-align: center;
  
  /* animation properties */
  -moz-transform: translateY(100%);
  -webkit-transform: translateY(100%);
  transform: translateY(100%);
  
  -moz-animation: my-animation 10s linear infinite;
  -webkit-animation: my-animation 10s linear infinite;
  animation: my-animation 10s linear infinite;
}

/* for Firefox */
@-moz-keyframes my-animation {
  from { -moz-transform: translateY(100%); }
  to { -moz-transform: translateY(-100%); }
}

/* for Chrome */
@-webkit-keyframes my-animation {
  from { -webkit-transform: translateY(100%); }
  to { -webkit-transform: translateY(-100%); }
}

@keyframes my-animation {
  from {
    -moz-transform: translateY(100%);
    -webkit-transform: translateY(100%);
    transform: translateY(100%);
  }
  to {
    -moz-transform: translateY(-100%);
    -webkit-transform: translateY(-100%);
    transform: translateY(-100%);
  }
}
    </style>
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="<?php echo asset('service-assets/images/logo-10.png')?>" align="klassy cafe html template" width="100px" height="50px">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="search-con" style="text-align:center ;" >
                  <h2 style=" font-size: 36px;color:green;font-weight: 300;  margin: 0 0 15px;
                         padding-top: 20px;">WELCOME TO
                    <span style="color:red;">HAMKO</span>
                    <span style="color:green"> SERVICE DEPARTMENT</span>
                 
                  </h2>
                </div>
                
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- Item -->
                          <?php foreach($image as $im) {?>
                            <?php if(($im['image_active'])) {?>
                          <div class="item">
                            <div class="img-fill">
                                <img src="<?php echo asset($im['image']) ?>" alt="" style="max-width:100% ;">
                            </div>
                          </div>
                          <?php } }?>
                          <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content" style="border: 2px solid ;">
                        <div class="section-heading"  style="background-color:#ec1b23">
                            <h2 class="text-center">Article</h2>
                        </div>
                       
                        <div id="scroll-container">
                            <div id="scroll-text" style="height:400px; ;">
                                
                                <p style="font-weight: bold; font-size: large;">&#x27a3; ঈদ বন্ধকালীন সময়ে মূলযবান
                                    পয়নযর ননরাপত্তা এবং কাট আউট বা
                                    সানকিট ববকায়রর মাধ্যয়ম বদাকান
                                    অভ্যন্তয়র নবদযযৎ</p>
                                    <p style="font-weight: bold;font-size: large;">&#x27a3; ঈদ বন্ধকালীন সময়ে বে সকল
                                        বযাটারীর ওোয়রনি বেষ হয়ে োয়ব
                                        বস বযাটারীর বযাচ নাম্বার এবং
                                        নবক্রে তানরখ আপনার ননকটস্থ
                                        সানভ্িস বসিায়র SMS করুন।</p>
                                    <p style="font-weight: bold;font-size: large;">&#x27a3; ঈদ বন্ধকালীন সময়ে বে সকল
                                            বযাটারীর ওোয়রনি বেষ হয়ে োয়ব
                                            বস বযাটারীর বযাচ নাম্বার এবং
                                            নবক্রে তানরখ আপনার ননকটস্থ
                                            সানভ্িস বসিায়র SMS করুন।</p>
                                    <p style="font-weight: bold;font-size: large;">&#x27a3; ঈদ বন্ধকালীন সময়ে বে সকল
                                                
                                    </p>
                            <div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="content" style="border: 2px solid ;">
                        <div class="section-heading" style="background-color:#ec1b23">
                            <h2 class="text-center">Leaflet</h2>
                        </div>
                        <p style="font-weight: bold; font-size: large; margin: 10px;">&#x27a3; ঈদ বন্ধকালীন সময়ে মূলযবান
                            পয়নযর ননরাপত্তা এবং কাট আউট বা
                            সানকিট ববকায়রর মাধ্যয়ম বদাকান
                            অভ্যন্তয়র নবদযযৎ</p>
                            <p style="font-weight: bold;font-size: large; margin: 10px;">&#x27a3; ঈদ বন্ধকালীন সময়ে বে সকল
                                বযাটারীর ওোয়রনি বেষ হয়ে োয়ব
                                বস বযাটারীর বযাচ নাম্বার এবং
                                নবক্রে তানরখ আপনার ননকটস্থ
                                সানভ্িস বসিায়র SMS করুন।</p>
                            <p style="font-weight: bold;font-size: large; margin: 10px;">&#x27a3; ঈদ বন্ধকালীন সময়ে বে সকল
                                    বযাটারীর ওোয়রনি বেষ হয়ে োয়ব
                                    বস বযাটারীর বযাচ নাম্বার এবং
                                    নবক্রে তানরখ আপনার ননকটস্থ
                                    সানভ্িস বসিায়র SMS করুন।</p>
                            <p style="font-weight: bold;font-size: large; margin: 10px;">&#x27a3; ঈদ বন্ধকালীন সময়ে বে সকল
                                        বযাটারীর ওোয়রনি বেষ হয়ে োয়ব
                                        বস বযাটারীর বযাচ নাম্বার এবং
                                        নবক্রে তানরখ আপনার ননকটস্থ
                                        সানভ্িস বসিায়র SMS করুন।</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/hamkobattery.official"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://www.hamko.com.bd/index.php"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <span><b>Copyright &copy; 2014-2022 <a href="http://www.hamko-ict.com/">Hamko-ICT.</a> All rights reserved.</b></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo asset('service-assets/js/jquery-2.1.0.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo asset('service-assets/js/popper.js')?>"></script>
    <script src="<?php echo asset('service-assets/js/bootstrap.min.js')?>"></script>
    <!-- Plugins -->
    <script src="<?php echo asset('service-assets/js/owl-carousel.js')?>"></script>
    <script src="<?php echo asset('service-assets/js/accordions.js')?>"></script>
    <script src="<?php echo asset('service-assets/js/datepicker.js')?>"></script>
    <script src="<?php echo asset('service-assets/js/scrollreveal.min.js')?>"></script>
    <script src="<?php echo asset('service-assets/js/waypoints.min.js')?>"></script>
    <script src="<?php echo asset('service-assets/js/jquery.counterup.min.js')?>"></script>
    <script src="<?php echo asset('service-assets/js/imgfix.min.js')?>"></script> 
    <script src="<?php echo asset('service-assets/js/slick.js')?>"></script> 
    <script src="<?php echo asset('service-assets/js/lightbox.js')?>"></script> 
    <script src="<?php echo asset('service-assets/js/isotope.js')?>"></script> 
    
    <!-- Global Init -->
    <script src="<?php echo asset('service-assets/js/custom.js')?>"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>