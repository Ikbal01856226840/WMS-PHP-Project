<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="<?php echo asset('service-assets/css/bootstrap.css') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="<?php echo asset('service-assets/css/custom.css') ?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    .barcode {
        text-transform: uppercase;
    }
    </style>
</head>


<body>
    <div class="container-fluid p-0">
        <section class="header">
            <div class="row h-content align-items-center">
                <div class="col-md-4 col-3 logo">
                    <a href="<?php echo route('dealerpage'); ?>"><img
                            src="<?php echo asset('service-assets/img/logo-10.png') ?>" alt="" /></a>
                </div>
                <div class="col-md-6 col-7 px-0">
                    <?php if (session('user_lavel') == 5 || session('user_lavel') == 4) {  ?>
                    <div class="row text-end">
                        <div class="dropdown px-0">
                            <button class="btn dropdown-toggle pe-0" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <h5 class="text-end text-white py-2">
                                    <?php if (!empty(session('user_lavel'))) echo session('user_name'); ?></h5>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo route('auth/logout'); ?>">Logout</a></li>
                                <li><a class="dropdown-item"
                                        href="<?php echo route('dealerapp/profileupdate'); ?>">Profile Update</a></li>
                            </ul>
                        </div>
                        <!-- <h5 class="px-0 text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php if (!empty(session('user_lavel'))) echo session('user_name'); ?></h5>              -->
                    </div>


                    <nav class="navbar navbar-expand-lg menu d-none">
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
                                        <a class="nav-link" href="<?php echo route('dealerapp/message'); ?>">Message</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo route('dealerapp/offers'); ?>">Offers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo route('dealerapp/pricelist'); ?>">Price
                                            List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo route('dealerapp/swr'); ?>">Search
                                            Warranty</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="http://202.53.169.89:1656/439/delear/Hamko_Dealer_Service.apk">App
                                            Store</a>
                                    </li>
                                    <li class="dropdown">
                                        <!-- <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php if (!empty(session('user_name'))) {
                                                                                                    echo session('user_name');
                                                                                                  } ?></a>
                      <ul class="dropdown-menu">
                        <li> -->
                                        <a class="nav-link" href="<?php echo route('auth/logout'); ?>"> Logout</a>
                                        <!-- </li>
                      </ul> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <?php } else { ?>

                    <div class="login_form d-flex justify-content-end align-items-center">
                        <form action="<?php echo route('auth/login_check') ?>" method="post">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" class="form-control" name="user_type" value="dealer">
                                    <input type="text" class="form-control" name="user_name" placeholder="User Name">
                                    <?php if (isset($errors['user_name'])) : ?>
                                    <span class="text-danger"><?php echo $errors['user_name'][0]; ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="col">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <?php if (isset($errors['password'])) : ?>
                                    <span class="text-danger"><?php echo $errors['password'][0]; ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-danger">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php  } ?>
                </div>

                <div class="col-md-2 col-2 text-end pe-4">
                    <div class="dropdown">
                        <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="fs-3 text-warning bi bi-bell-fill">
                                <span class="position-absolute text-warning top-5 start-98 translate-middle badge">
                                    <?php if (!empty($notification)) echo $notification['notification']; ?>
                                </span></i>
                        </span>
                        <ul class="dropdown-menu notify">
                            <?php foreach ($notification_data as $data) { ?>
                            <?php if ($data['offer_type'] == 1) { ?>
                            <a href="<?php echo route('dealerapp/offer_details/' . $data['id']); ?>">
                                <div class="bg-info my-2">
                                    <div class="pt-2 ps-2 mb-0">
                                        <p class="m-0">Product Info</p>
                                    </div>
                                    <hr class="m-0">
                                    <div class="card-body pb-2">
                                        <p class="f-13 m-2">
                                            <?php echo substr_replace($data['offer_message'], '...', 50) ?></p>
                                    </div>
                                </div>
                            </a>
                            <?php } elseif ($data['offer_type'] == 2) { ?>
                            <a href="<?php echo route('dealerapp/message_details/' . $data['id']); ?>">
                                <div class="bg-warning my-2">
                                    <div class="pt-2 ps-2 mb-0">
                                        <p class="m-0">Message</p>
                                    </div>
                                    <hr class="m-0">
                                    <div class="card-body pb-2">
                                        <p class="f-13 m-2">
                                            <?php echo substr_replace($data['offer_message'], '...', 50) ?></p>
                                    </div>
                                </div>
                            </a>
                            <?php } elseif ($data['offer_type'] == 3) { ?>
                            <a href="<?php echo route('dealerapp/message_details/' . $data['id']); ?>">
                                <div class="bg-success my-2">
                                    <div class="pt-2 ps-2 mb-0">
                                        <p class="m-0">Pricelist</p>
                                    </div>
                                    <hr class="m-0">
                                    <div class="card-body pb-2">
                                        <p class="f-13 m-2">
                                            <?php echo substr_replace($data['offer_message'], '...', 50) ?></p>
                                    </div>
                                </div>
                            </a>
                            <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>