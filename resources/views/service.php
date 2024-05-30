<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="<?php echo asset('service-assets/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="<?php echo asset('service-assets/css/custom.css')?>" />
</head>

<body>
    <div class="container-fluid p-0">
        <section class="header bg-success">
            <div class="row h-content">
                <div class="col-md-4 col-6 logo">
                    <a href="http://hamkoservice.com/index.html"><img
                            src="<?php echo asset('service-assets/img/logo-10.png')?>" alt="" /></a>
                </div>
                <div class="col-md-8 col-6">
                    <nav class="navbar navbar-expand-lg menu">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
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
                                        <a class="nav-link active" href="http://hamkoservice.com/search.html">Service
                                            Center</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="<?php echo route('service/customer/index'); ?>">Search</a>
                                    </li>
                                    <!-- <li class="dropdown">
                      <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" >DROP DOWN</a>
                      <ul class="dropdown-menu">
                        <li><a href="" class="dropdown-item">Gallery</a></li>
                      </ul>
                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="https://service.hamkoservice.com/439/dealer/Hamko_Service.apk">App
                                            Store</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </section>

        <!-- ======= Customer Section ======= -->
        <section class="search-show">
            <div class="container">
                <!-- Serching Data View Start -->
                <div class="row">
                    <div class="my-1 p-4">
                        <div class="container">
                            <div class="row">
                                <?php foreach($service_data as $data){ ?>
                                <div class="col-md-4 col-xs-6 text-center">
                                    <div class="row card mx-1 my-2 px-2 service-animate">
                                        <!-- <h4 class="my-2">Service Center</h4> -->
                                        <h5 class="my-3 text-success">
                                            <?php if (!empty($data['service_center_name'])) {echo $data['service_center_name']; } ?>
                                        </h5>
                                        <p class="text-center">
                                            <?php if (!empty($data['address'])) {echo $data['address']; } ?></p>
                                        <p class="text-center"><a
                                                href="tel:<?php if (!empty($data['Phone1'])) {echo $data['Phone1']; } ?>"><?php if (!empty($data['Phone1'])) {echo $data['Phone1']; } ?></a>
                                            <?php if (!empty($data['Phone2'])){ ?>, &nbsp; <a
                                                href="tel:<?php {echo $data['Phone2']; } ?>"><?php {echo $data['Phone2']; } ?></a>
                                            <?php }?></p>
                                    </div>
                                </div>
                                <?php } ?>
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
                                    <a href="https://www.facebook.com/hamkobattery.official"><i
                                            class="fs-2 text-white bi bi-facebook"></i></a>
                                </div>
                                <div class="mx-2">
                                    <a href="http://hamko.com.bd/"><i class="fs-2 text-white bi bi-globe2"></i></a>
                                </div>
                                <div class="mx-2">
                                    <a href="https://www.youtube.com/@hamkobatteryofficial"><i
                                            class="fs-2 text-white bi bi-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xs-12">
                        <div class="foot-text">
                            <span class="text-white">Copyright &copy; 2014-2022 <a
                                    href="http://www.hamko-ict.com/">HAMKO-ICT.</a> All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="<?php echo asset('service-assets/js/bootstrap.bundle.js') ?>"></script>
</body>

</html>