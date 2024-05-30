<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WMS</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="stylesheet" href="<?php echo asset('service-assets/css/bootstrap.css') ?>" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <link rel="stylesheet" href="<?php echo asset('service-assets/css/custom.css') ?>" />
</head>

<body>
  <div class="container-fluid p-0">
    <section class="header">
      <div class="row h-content align-items-center">
        <div class="col-md-4 col-6 logo">
          <a href="http://hamkoservice.com/index.html"><img src="<?php echo asset('service-assets/img/logo-10.png') ?>" alt="" /></a>
        </div>
        <div class="col-md-8 col-6">

          <?php if (session('user_lavel') == 5) {  ?>
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
                      <a class="nav-link" href="http://202.53.169.89:1656/439/delear/Hamko_Dealer_Service.apk">App
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
      </div>
    </section>


    <h1 class="text-center text-success py-2">Welcome to <span class="text-danger">HAMKO</span> Service Department
    </h1>

    <!-- Login Form -->
    <?php if (session('user_lavel') != 5) {  ?>
      <div class="row ms-2 me-5 my-2 justify-content-center align-items-center log-mb-form">
        <div class="col-sm-9">
          <form action="<?php echo route('auth/login_check') ?>" method="post">
            <div class="row">
              <div class="col-5">
                <input type="hidden" class="form-control" name="user_type" value="dealer">
                <input type="text" class="form-control" name="user_name" placeholder="User Name">
                <?php if (isset($errors['user_name'])) : ?>
                  <span class="text-danger"><?php echo $errors['user_name'][0]; ?></span>
                <?php endif; ?>
              </div>
              <div class="col-5">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <?php if (isset($errors['password'])) : ?>
                  <span class="text-danger"><?php echo $errors['password'][0]; ?></span>
                <?php endif; ?>
              </div>
              <div class="col-2">
                <button type="submit" class="btn btn-danger">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php } ?>


    <!-- Slider Start -->
    <section class="slider">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php foreach ($image as $img) {
            if (($img['image_active'])) ?>
            <div class="carousel-item active">
              <img src="<?php echo asset($img['image']) ?>" class="w-100 img-responsive" alt="..." />
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




    <!-- ======= Services Section ======= -->
    <section id="services" class="services mt-5">
      <div class="container" data-aos="fade-up">
        <div class="row gy-5">
          <div class="col-xl-12 col-md-12">
            <div class="service-item">
              <div class="img">
                <img src="<?php echo asset('service-assets/img/obj4.jpg') ?>" class="img-fluid" alt="" />
              </div>
              <style>
                .dealerul>a {
                  text-decoration: none;
                }

                .dealer_info>ul {
                  text-align: justify;
                }
              </style>
              <div class="details position-relative dealer_info dealerul">
                <div class="icon">
                  <i class="bi bi-command"></i>
                </div>
                <h5 class="card-title ct my-4">ব্যাটারী বিক্রয় পূর্ব ও পরবর্তী ব্যবস্থাপনা বিষয়ে
                  পরামর্শঃ</h5>
                <h5 class="text-success fw-bold">ব্যাটারী বিক্রয় পূর্ববর্তী দিক নির্দেশনাঃ</h5>
                <ul class="lh-lg ps-1">
                  <li>হ্যামকো ব্যাটারী বিক্রয়ের সময় ব্যাটারীর গায়ে প্রদত্ত ব্যাচ নাম্বারের সাথে
                    ওয়ারেন্টি কার্ডে প্রদত্ত ব্যাচ নাম্বার মিল আছে কিনা মিলিয়ে দেখুন এ ক্ষেত্রে কোন
                    অসঙ্গতি থাকলে হ্যামকো সার্ভিস বিভাগের সাথে যোগাযোগ করুন।</li>
                </ul>
                <div class="collapse dealer_info" id="examp1">
                  <ul class="lh-lg ps-1">
                    <li>গাড়ী, জেনারেটর,আইপিএস, ইজিবাইক, অটোরিক্সা ও সোলার সিস্টেম এ ব্যবহারের জন্য
                      হ্যামকো ব্র্যান্ডের নির্দিষ্ট সেগমেন্ট ও টাইপ এর ব্যাটারী নির্বাচন ও বিক্রয়
                      করুন।</li>
                    <li>গাড়ী বা জেনারেটরের ইঞ্জিন স্টার্টের জন্য হ্যামকো Premium ও PCV সেগমেন্ট এর
                      ব্যাটারী এবং আইপিএস এর লোড ওয়াট এর সাথে সামঞ্জস্য রেখে কাঙ্ক্ষিত ব্যাকআপ
                      টাইমের জন্য সঠিক ক্যাপাসিটির হ্যামকো HPD ব্যাটারী নির্বাচন করুন। আন্ডার রেট
                      বা আন্ডার সাইজ ব্যাটারী নির্বাচন অথবা বিক্রয় থেকে বিরত থাকুন।</li>
                    <li>হ্যামকো ব্রান্ডের অধীনে সকল ইঞ্জিন স্টার্টিং ব্যাটারী (Premium ও PCV Popular
                      টাইপ) এর ওয়ারেন্টি কার্ডের সকল অংশে গাড়ীর রেজিস্ট্রেশন নাম্বার ও গাড়ীর
                      ইঞ্জিন ক্যাপাসিটি (CC) এবং ক্রেতার ফোন নাম্বার যথা স্থানে লিপিবদ্ধ করুন। IPS
                      এর জন্য HPD ব্যাটারী এর ওয়ারেন্টি কার্ডের সকল অংশে IPS এর লোড ওয়াট ও ক্রেতার
                      মোবাইল নাম্বার এবং সোলার ব্যাটারীর ওয়ারেন্টি কার্ডের সকল অংশে সোলার সিস্টেম
                      ওয়াট ও ক্রেতার মোবাইল নাম্বার লিপিবদ্ধ করুন। </li>
                    <li>হ্যামকো Premium টাইপ ও PCV টাইপ এবং সোলার ব্যাটারী IPS এ নির্বাচন ও বিক্রয়
                      থেকে বিরত থাকুন। হ্যামকো HPD টাইপ এবং সোলার ব্যাটারী যানবাহন অথবা জেনারেটর এ
                      নির্বাচন ও বিক্রয় থেকে বিরত থাকুন।</li>
                    <li>আপনার বিক্রয় প্রতিষ্ঠানে আগে উত্তোলিত ব্যাটারী আগে এবং পরে উত্তোলিত ব্যাটারী
                      পরে বিক্রয় করুন অর্থ্যাৎ ফাস্ট ইন ফাস্ট আউট (FIFO) পদ্ধতি অবলম্বন করুন।</li>
                    <li>ড্রাই চার্জ ব্যাটারী উত্তোলনের ০৪ (চার) মাস এবং ফ্যাক্টোরী কতৃক চার্জকৃত Wet
                      Charged ব্যাটারী ১৫ দিন থেকে ০১ (এক) মাসের মধ্যে বিক্রয়ের ব্যবস্থা করুন।
                    </li>
                    <li>ফ্যাক্টোরী কতৃক চার্জকৃত বা Wet Charged ব্যাটারী উত্তোলনের ক্ষেত্রে আপনার
                      প্রতিষ্ঠানের বিক্রয় চাহিদার সমান সংখ্যক ব্যাটারী উত্তোলন করুন। Wet Charged
                      ব্যাটারী ০১ (এক) মাসের অধিক সময় যেন অবিক্রিত অবস্থায় না থাকে সেদিকে খেয়াল
                      রাখুন।</li>
                    <li>ব্যাটারীতে সব সময় বিশুদ্ধ ও পরিস্কার ইলেক্ট্রোলাইট প্রয়োগ করুন ইলেক্ট্রোলাইট
                      প্রয়োগের পুর্বে ইলেক্ট্রোলাইট রাখার পাত্র ও জ্বারকে ভালোভাবে ঝাকিয়ে নিন।
                    </li>
                    <li>ব্যাটারীতে ইলেক্ট্রোলাইট এর লেভেল আপার লেভেলে অথবা সেপারেটর এর উপরে ০১
                      সেঃমিঃ পর্যন্ত রাখুন। ব্যাটারীতে কখনো পুনরায় এসিড দেয়া বা এসিড চার্জড করা
                      থেকে বিরত থাকুন।</li>
                    <li>ব্যাটারী ব্যবহার পরবর্তি রক্ষনাবেক্ষন ও পরিচর্যা এবং ব্যাটারীর ওয়ারেন্টি
                      শর্তাবলী বিষয়ে গ্রাহক কে অবহিত করুন। </li>
                  </ul>
                </div>
                <div class="text-end mb-3">
                  <a class="btn btn-sm btn-success text-end" onclick="if(this.innerHTML =='বিস্তারিত..'){this.innerHTML = 'ফেরৎ..'}else{this.innerHTML = 'বিস্তারিত..'}" data-bs-toggle="collapse" href="#examp1" role="button" aria-expanded="false" aria-controls="examp1">বিস্তারিত..</a>
                </div>
                <h5 class="text-success fw-bold">ব্যাটারী বিক্রয় পরবর্তী দিক নির্দেশনাঃ</h5>
                <ul class="lh-lg text-start ps-1">
                  <li>ব্যাটারীকে গাড়ী, জেনারেটর,আইপিএস এবং অটোরিক্সা-ইজিবাইক ও সোলার সিস্টেমে সংযোগের
                    পূর্বে ব্যাটারীর পোস্টের পোলারিটি ঠিক আছে কিনা নিশ্চিত হোন।</li>
                </ul>
                <div class="collapse dealer_info" id="examp2">
                  <ul class="lh-lg text-start ps-1">

                    <li>বিক্রয় পরবর্তী ব্যাটারী সরবরাহের পূর্বে ব্যাটারীকে ক্যাপাসিটির ৫% হারে
                      প্রাথমিক চার্জ করে সরবরাহ করুন। ড্রাই চার্জ ব্যাটারীকে ইলেক্ট্রোলাইট করার পর
                      ব্যাটারী ঠান্ডা হওয়া পর্যন্ত অপেক্ষা করুন এবং পরবর্তিতে প্রাথমিক চার্জ করে
                      সরবরাহ করুন। </li>
                    <li>ব্যাটারী বিক্রয়ের ০৭ (সাত) দিনের মধ্যে ওয়ারেন্টি কার্ড এর তৃতীয় অংশ যথাযথ
                      ভাবে পুরন করে Warrenty card 3rd copy received form এর মাধ্যমে কোম্পানীর
                      ওয়ারেন্টি কার্ড রেজিস্ট্রেশন বিভাগে প্রেরন করুন। </li>
                    <li>গাড়ী থেকে ব্যাটারী খোলার সময় আগে নেগেটিভ টার্মিনাল ও পরে পজেটিভ টার্মিনাল
                      খুলুন এবং গাড়ীতে ব্যাটারী সংযোগের সময় আগে পজেটিভ টার্মিনাল ও পরে নেগেটিভ
                      টার্মিনাল সংযোগ করুন।</li>
                    <li>গাড়ী, জেনারেটর,আইপিএস এবং অটোরিক্সা-ইজিবাইক ও সোলার সিস্টেম এ ব্যাটারী
                      সংযোগের সময় সংযোগ ক্যাবল ও ক্ল্যাম্পে এ আঘাত করা থেকে বিরত থাকুন এবং
                      ব্যাটারী সংযোগের সময় ব্যাটারীর টার্মিনাল পোস্ট এর লেডে অতিরিক্ত চাপ প্রয়োগ ও
                      ক্যাবল ক্ল্যাম্প অতিরিক্ত টাইট করা থেকে বিরত থাকুন। </li>
                    <li>ব্যাটারীর টার্মিনাল পোস্ট এর সংযোগ স্থলে ভালোভাবে পেট্রোলিয়াম জেলি বা গ্রীজ
                      লাগিয়ে দিন, যেন ব্যাটারীর পোস্ট এবং ক্ল্যাম্প সালফার ও মরিচা প্রতিরোধি হয়।
                    </li>
                    <li>ব্যাটারী সংযোগের পূর্বে গাড়ী, জেনারেটর, আইপিএস, সোলার সিস্টেম এবং
                      অটোরিক্সা-ইজিবাইক ও মোটর সাইকেল এর চার্জ সিস্টেম, চার্জ ভোল্ট, এম্পিয়ার,
                      চার্জ হাইকাটআপ ভোল্ট, ডায়নামো, অল্টারনেটর, চার্জ রেগুলেটর, ফিউজ এবং ফ্যান
                      বেল্ট এর টেনশন ইত্যাদি ঠিক আছে কিনা পরীক্ষা করুন।</li>
                    <li>ব্যাটারীর পোস্ট মোটা ও নতুন করে তৈরী করা থেকে বিরত থাকুন। কখনো মোটা তার বা
                      রড দিয়ে ব্যাটারীর পজেটিভ ও নেগেটিভ পোস্ট সংযোগে সর্ট সার্কিট করে চার্জ
                      পরীক্ষা করা থেকে বিরত থাকুন। </li>
                    <li>প্রতি মাসে ব্যাটারী পরীক্ষার সময় বিশুদ্ধ ডি-মিনারেলাইজড ওয়াটার (ব্যাটারীর
                      পানি) ব্যবহার করুন। কখনো খাবার পানি, টিউবয়েলের পানি, পুকুর, নদী, খালবিল ও
                      সাপ্লাই এর পানি অথবা এসিড মিশ্রিত পানি ব্যবহার করবেন না।</li>
                    <li>ব্যাটারীর উপরিভাগ কখনো রাবার শীট দিয়ে ঢেকে রাখবেন না। ব্যাটারীর উপরিভাগ ও
                      পার্শ্ব দেয়াল সর্বদা শুষ্ক ও পরিস্কার রাখুন। ব্যাটারী পরিস্কারের সময় শুষ্ক ও
                      পরিস্কার কাপড় ব্যবহার করুন।</li>
                    <li>ব্যাটারী চার্জের সময় ইলেক্ট্রোলাইটের গ্র্যাভিটি ১.২৫০ আসা পর্যন্ত এবং
                      ব্যাটারীর চার্জ ভোল্টেজ ১৬ ভোল্ট এ আসা পর্যন্ত চার্জ করুন। চার্জের সময় এক
                      ব্যাটারী থেকে অন্য ব্যাটারীর মধ্যবর্তি স্থানের দূরত্ব ০১ থেকে ১.৫ ইঞ্চি
                      পর্যন্ত রাখুন।</li>
                    <li>ব্যাটারী পর্যবেক্ষনের সময় টর্চ লাইট ব্যাবহার করুন। ব্যাটারীকে সব সময় খোলা
                      ল্যাম্প, হ্যারিকেন, মোমবাতি, দাহ্য পদার্থ এবং আগুনের স্ফুলিঙ্গ ও অগ্নিশিখা
                      থেকে নিরাপদ দূরত্বে রাখুন।</li>
                    <li>চার্জ ডাউন ব্যাটারীকে লোড টেস্টার মিটার প্রয়োগে পরীক্ষা করা থেকে বিরত থাকুন।
                    </li>
                    <li>নিয়মিত সার্ভিস ও তৈরী জনিত ত্রুটি ১০০% নিশ্চিত হওয়ার পর কোম্পানীর সার্ভিস
                      বিভাগ কে অবহিত করে গ্রাহক কে আপনার মজুদ থেকে একই ব্র্যান্ডে ও একই টাইপের
                      নতুন ব্যাটারী সরবরাহ করতে পারবেন। এ ক্ষেত্রে ত্রুটি যুক্ত ব্যাটারীর
                      ওয়ারেন্টি কার্ডের সাথে পরিবর্তনকৃত ব্যাটারীর ওয়ারেন্টি কার্ডের দ্বিতীয় ও
                      তৃতীয় অংশে প্রথম বিক্রয় তারিখ এবং পরিবর্তনের তারিখ উল্লেখ করে ত্রুটি যুক্ত
                      ব্যাটারী সাথে কোম্পানীতে পাঠাতে হবে। পরিবর্তনকৃত ব্যাটারীর ওয়ারেন্টি কার্ডে
                      প্রথম বিক্রয় তারিখ ও পরিবর্তনের তারিখ উল্লেখ করতে হবে।</li>
                    <li>জাতীয় দিবস ও ঈদ বন্ধ কালিন সময়ে ত্রুটিযুক্ত যে ব্যাটারীর ওয়ারেন্টি শেষ হয়ে
                      যাবে সে ব্যাটারীর ব্যাচ নাম্বার ও বিক্রয় তারিখ মেসেজ এর মাধ্যমে আপনার এরিয়া
                      সংশ্লিষ্ট হ্যামকো সেবা কেন্দ্রকে অবহিত করুন।</li>
                  </ul>
                </div>
                <div class="text-end mb-3">
                  <a class="btn btn-sm btn-success text-end" onclick="if(this.innerHTML =='বিস্তারিত..'){this.innerHTML = 'ফেরৎ..'}else{this.innerHTML = 'বিস্তারিত..'}" data-bs-toggle="collapse" href="#examp2" role="button" aria-expanded="false" aria-controls="examp1">বিস্তারিত..</a>
                </div>
                <h5 class="text-success fw-bold">ব্যাটারী এর বিস্ফোরণ এড়িয়ে চলুনঃ</h5>
                <ul class="lh-lg text-start ps-1">
                  <li>সর্বদা চোখ, মুখ এবং হাতের সুরক্ষা সামগ্রী ব্যবহার করুন।</li>
                </ul>
                <div class="collapse dealer_info" id="examp3">
                  <ul class="lh-lg text-start ps-1">
                    <li>সর্বদা বৈদ্যুতিক স্পার্ক, আগ্নি শীখা, এবং বিড়ি/সিগারেট স্পুলিং থেকে
                      ব্যাটারীকে নিরাপদ দূরত্বে রাখুন।</li>
                    <li>ভেন্ট প্লাগ বিহীন অথবা মেইন্টেনেন্স ফ্রী ব্যাটারী খোলা থেকে বিরত থাকুন।</li>
                    <li>ব্যাটারী চার্জ করার পূর্বে অথবা ব্যাটারী সার্ভিস করার পুর্বে ব্যাটারীর টাইট
                      ভেন্ট প্লাগ লুস করে দিন এবং ইলেক্ট্রোলাইটের লেভেল আপার লেভেল পর্যন্ত রাখুন।
                    </li>
                    <li>আপনার কাজের যায়গায় পর্যাপ্ত আলো বাতাস যাতায়াতের ব্যাবস্থা আছে কিনা নিশ্চিত
                      হোন।</li>
                    <li>ব্যাটারী সার্ভিস এবং ইলেক্ট্রোলাইট প্রয়োগ ও চার্জের সময় ব্যাটারী কাত করা
                      থেকে বিরত থাকা।</li>
                  </ul>
                </div>
                <div class="text-end mb-3">
                  <a class="btn btn-sm btn-success text-end" onclick="if(this.innerHTML =='বিস্তারিত..'){this.innerHTML = 'ফেরৎ..'}else{this.innerHTML = 'বিস্তারিত..'}" data-bs-toggle="collapse" href="#examp3" role="button" aria-expanded="false" aria-controls="examp1">বিস্তারিত..</a>
                </div>
                <h5 class="text-success fw-bold">নিরাপদ চার্জ ব্যাবস্থাপনাঃ</h5>
                <ul class="lh-lg text-start ps-1">
                  <li>সর্বদা চোখ, মুখ এবং হাতের সুরক্ষা সামগ্রী ব্যবহার করুন।</li>
                </ul>
                <div class="collapse dealer_info" id="examp4">
                  <ul class="lh-lg text-start ps-1">
                    <li>পর্যাপ্ত আলো বাতাস যাতায়াত করে এমন যায়গায় ব্যাটারী চার্জ করুন।</li>
                    <li>ব্যাটারী চার্জ করার পূর্বে ব্যাটারীর টাইট ভেন্ট প্লাগ লুস করে দিন এবং
                      ইলেক্ট্রোলাইটের লেভেল আপার লেভেল বরাবরে রাখুন।</li>
                    <li>ব্যাটারী এর সাথে চার্জারের লিড সংযোগের পূর্বে চার্জার বন্ধ করে নিন এবং
                      ক্ষতিকারক বৈদ্যুতিক স্পার্ক পরিহার করুন।</li>
                    <li>দৃশ্যমান ক্ষতিগ্রস্থ বা হিমায়িত ব্যাটারী চার্জের চেষ্টা করা থেকে বিরত থাকা।
                    </li>
                    <li>চার্জারের পজেটিভ বা লাল ইলেক্ট্রোড ব্যাটারীর পজেটিভ টারমিনালের সাথে এবং
                      চার্জারের নেগেটিভ বা কালো ইলেক্ট্রোড ব্যাটারীর নেগেটিভ টারমিনালের সর্বোদাই
                      সংযোগ করা।</li>
                    <li>ব্যাটারী চার্জ করার পূর্বে নিশিত হোন যেন ব্যাটারীর সাথে সংযুক্ত চার্জারের
                      ইলেক্ট্রোড সমূহ ভাংগা, ক্ষয়প্রাপ্ত এবং লুজ না থাকে।</li>
                    <li>চার্জারের চার্জিং ভোল্টেজ এবং ব্যাটারী এর মোট ভোল্টেজের মধ্যে সমন্বয় আছে
                      কিনা নিশ্চিত হোন।</li>
                    <li>সর্বদা চার্জারের চার্জিং ভোল্ট, ব্যাটারীর ফুল চার্জ ভোল্ট থেকে ২৮% বেশী হতে
                      হবে।</li>
                    <li>চার্জারের চার্জিং কারেন্ট এবং চার্জিং টাইম ধীরে ধীরে বৃদ্ধি করুন।</li>
                    <li>যদি কোন কারনে ব্যাটারী অত্যধিক গরম হয় অথবা ব্যাটারী থেকে অধিক পরিমানে গ্যাস
                      নির্গত হয়, তখন চার্জিং কারেন্ট কমিয়ে দিন অথবা কিছু সময়ের জন্য চার্জার বন্ধ
                      রাখুন।</li>
                    <li>ব্যাটারী চার্জ শেষে চার্জার থেকে ব্যটারী খোলার পুর্বে চার্জার বন্ধ করুন এবং
                      ক্ষতি কারক বৈদ্যুতিক স্পার্ক পরিহার করুন।</li>
                  </ul>
                </div>
                <div class="text-end mb-3">
                  <a class="btn btn-sm btn-success text-end" onclick="if(this.innerHTML =='বিস্তারিত..'){this.innerHTML = 'ফেরৎ..'}else{this.innerHTML = 'বিস্তারিত..'}" data-bs-toggle="collapse" href="#examp4" role="button" aria-expanded="false" aria-controls="examp1">বিস্তারিত..</a>
                </div>

                <h5 class="text-success fw-bold">ব্যাটারীতে এসিড এর ব্যবহারের ক্ষেত্রে সাবধানতা।</h5>
                <ul class="lh-lg text-start ps-1">
                  <li>সর্বদা চোখ, মুখ এবং হাতের সুরক্ষা সামগ্রী ব্যবহার করুন।</li>
                </ul>

                <div class="collapse dealer_info" id="examp5">
                  <ul class="lh-lg text-start ps-1">
                    <li>ব্যাটারীতে ইলেক্ট্রোলাইট প্রয়োগের পূর্বে ইলেক্ট্রোলাইট ভালো ভাবে নেড়ে নিন।
                      অথবা ইলেক্ট্রোলাইট রাখার পাত্র অথবা জ্বারকে ভাল ভাবে নেড়েছেড়ে নিন।</li>
                    <li>এসিড একটি দ্ধাহ্য দ্রবন তাই সাবধানে এটি নাড়াছাড়া করুন।</li>
                    <li>কোন কারনে ইলেক্ট্রোলাইট চোখে প্রবেশ করলে সাথে সাথে চোখ খোলা রাখুন এবং অন্তত
                      ১৫ (পনের) মিনিট পর্যন্ত পরিস্কার পানি দ্ধারা চোখ ধৌত করুন।</li>
                    <li>কোন কারনে ইলেক্ট্রোলাইট শরীরের অভ্যন্তরে প্রবেশ করলে অধিক পরিমানে পানি অথবা
                      দুধ পান করুন এবং শীগ্রই ডাক্তারের সরনাপন্য হোন।</li>
                    <li>কখনো এসিডের সাথে পানির মেশাবেন না, বরং পানির সাথে ধীরে ধীরে এসিড মেশান এবং
                      ধীরে ধীরে নাড়তে থাকুন কোন কারনে দ্রবনের তাপমাত্রা স্বাভাবিকের থেকে বৃদ্ধি
                      পেলে তাপমাত্রা স্বাভাবিকে আসা পর্যন্ত সাময়িক সময়ের জন্য পানিতে এসিড মেশানো
                      বন্ধ রাখুন।</li>
                  </ul>
                </div>
                <div class="text-end mb-3">
                  <a class="btn btn-sm btn-success text-end" onclick="if(this.innerHTML =='বিস্তারিত..'){this.innerHTML = 'ফেরৎ..'}else{this.innerHTML = 'বিস্তারিত..'}" data-bs-toggle="collapse" href="#examp5" role="button" aria-expanded="false" aria-controls="examp1">বিস্তারিত..</a>
                </div>
                <!-- <a href="#" class="stretched-link"></a> -->
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <!-- <div class="col-xl-6 col-md-6">
              <div class="service-item">
                <div class="img">
                  <img src="<?php echo asset('service-assets/img/services-6.jpg') ?>" class="img-fluid" alt="" />
                </div>
                <div class="details position-relative">
                  <div class="icon">
                    <i class="bi bi-card-checklist"></i>
                  </div>
                  <h5 class="card-title ct my-4">Product Information</h5>
                   <?php foreach ($pdfs as $pdf) {  ?>
                    <div class="row align-items-center">
                      <div class="col-1">&#x27a3;</div>
                      <div class="col-9"><p><?php echo ($pdf['image_name']) ?></p></div>
                      <div class="col-1"><a href="<?php echo asset($pdf['image']) ?>"> <i class="text-success fs-2 bi bi-file-earmark-arrow-down"></i> </a></div>
                    </div>
                  <?php } ?>
                  <a href="#" class="stretched-link"></a>
                </div>
              </div>
            </div> -->
          <!-- End Service Item -->
        </div>
      </div>
    </section>
    <!-- End Services Section -->


    <?php include('includes/footer.php') ?>
    <!-- <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-xs-12">
              <div class="align-items-center">
                <div class="d-flex justify-content-center py-3">
                  <div class="mx-2">
                    <i class="fs-4 text-white bi bi-facebook"></i>
                  </div>
                  <div class="mx-2">
                    <i class="fs-4 text-white bi bi-twitter"></i>
                  </div>
                  <div class="mx-2">
                    <i class="fs-4 text-white bi bi-linkedin"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-xs-12">
              <div class="foot-text">
                <span class="text-light">Copyright &copy; 2014-2022 <a href="http://www.hamko-ict.com/">Hamko-ICT.</a> All rights reserved.</span>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="<?php echo asset('service-assets/js/bootstrap.bundle.js') ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
  </body>
</html> -->