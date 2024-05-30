<div id="pcoded" class="pcoded">
    <div class="pcoded-container">
        <!-- Menu header start -->
        <nav class="navbar header-navbar pcoded-header" header-theme="theme6" pcoded-header-position="relative">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a style="text-decoration: none" href="<?php echo route('dashboard'); ?>">
                        <!-- <img class="img-fluid" src="<?php //echo asset('libraries\images\logo.png'); 
                                                            ?>" alt="Theme-Logo"> -->
                        <h5 style="text-decoration: none">WMS</h5>
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification user-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                    <span class="badge bg-c-pink notification_count"></span>
                                </div>
                                <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <div class="notification_show">

                                    </div>

                                </ul>
                            </div>
                        </li>
                        <li class="user-profile header-notification">

                            <div class="dropdown-primary dropdown user-popup">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- <img src="<? php // echo asset('libraries\images\avatar-4.jpg'); 
                                                    ?>" class="img-radius" > -->
                                    <span><?php if (!empty(session('user_name'))) echo session('user_name') . '-' . session('branch_name'); ?></span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                    <li>
                                        <a href="user-profile.htm">
                                            <i class="feather icon-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo route("auth/logout"); ?>">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Menu header end -->