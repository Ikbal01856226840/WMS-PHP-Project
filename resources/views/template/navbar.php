    <style>
.active {
    background-color: #0f9;
}
    </style>
    <nav class="pcoded-navbar">
        <div class="pcoded-inner-navbar">
            <ul class="pcoded-item pcoded-left-item main_menu">

                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                        <span class="pcoded-mtext">User</span>
                    </a>

                    <ul class="pcoded-submenu">
                        <?php if(session('user_lavel')==1){ ?>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.form-components.main">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">Create User</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="<?php echo route("user/create"); ?>"
                                        data-i18n="nav.form-components.form-components">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Add User</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="<?php echo route('user/index'); ?>"
                                        data-i18n="nav.form-components.form-elements-add-on">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">User General View </span>
                                    </a>

                                </li>
                                <li class=" ">
                                    <a href="<?php echo route('user/dealer-index'); ?>"
                                        data-i18n="nav.form-components.form-elements-add-on">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">User Dealer View </span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="#" data-i18n="nav.form-components.form-elements-add-on">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">User Retailer View </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li class="pcoded-hasmenu">
                            <a href="<?php echo route('auth/change/password'); ?>" data-i18n="nav.data-table.main">
                                <span class="pcoded-micon">
                                    <i class="ti-widgetized"></i>
                                </span>
                                <span class="pcoded-mtext">Change Password</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <!-- <li class=" ">
                            <a href="form_select.php" data-i18n="nav.form-select.main">
                                <span class="pcoded-micon"><i class="ti-shortcode"></i></span>
                                <span class="pcoded-mtext">Form Select</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <?php if(session('user_lavel')==1 || session('user_lavel')== 2 || session('user_lavel')==7 ||session('user_lavel')==8){ ?>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>
                        <span class="pcoded-mtext">Product</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <?php if(session('user_lavel')==1||session('user_lavel')==7){ ?>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table.main">
                                <span class="pcoded-micon"><i class="ti-widgetized"></i></span>
                                <span class="pcoded-mtext">Stock Group</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="<?php echo route('stockGroup/create'); ?>"
                                        data-i18n="nav.data-table.basic-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Add Stock Group</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="<?php echo route('stockGroup/index'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">View Stock Group</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-micon"><i class="ti-loop"></i></span>
                                <span class="pcoded-mtext">Stock Item</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?php echo route('product/create'); ?>">
                                        <span class="pcoded-mtext">Add Stock Item</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo route('product/index'); ?>">
                                        <span class="pcoded-mtext">View Stock Item</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php } ?>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-micon"><i class="ti-loop"></i></span>
                                <span class="pcoded-mtext">Price List</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <?php if(session('user_lavel')==1||session('user_lavel')==7){ ?>
                                <li class="">
                                    <a href="<?php echo route('pricelist/create'); ?>">
                                        <span class="pcoded-mtext">Add Price</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if(session('user_lavel')==1|| session('user_lavel')== 2 ||session('user_lavel')==7 ||session('user_lavel')==8){ ?>
                                <li class="">
                                    <a href="<?php echo route('pricelist/index'); ?>">
                                        <span class="pcoded-mtext">View Pricelist</span>
                                    </a>
                                </li>                                
                                <?php } ?>                                
                            </ul>
                        </li>
                        <li class="">
                            <a href="<?php echo route('warrantyCard/mfdate'); ?>">
                                <span class="pcoded-mtext">Manufacture Date</span>
                            </a>
                        </li>
                        
                        <!-- <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-micon"><i class="ti-loop"></i></span>
                                <span class="pcoded-mtext">Warranty Period</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?php echo route('product/warranty/period_create'); ?>">
                                        <span class="pcoded-mtext">Warranty Period Create</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo route('product/warranty/period'); ?>">
                                        <span class="pcoded-mtext">Warranty Period</span>
                                    </a>
                                </li>

                            </ul>
                        </li> -->
                    </ul>
                </li>
                <?php } ?>
                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7||session('user_lavel')==8||session('user_lavel')==9){ ?>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="feather icon-file-minus"></i></span>
                        <span class="pcoded-mtext">Settings</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table.main">
                                <span class="pcoded-micon"><i class="ti-widgetized"></i></span>
                                <span class="pcoded-mtext"> Dealer</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <?php if(session('user_lavel')==1||session('user_lavel')==7||session('user_lavel')==8||session('user_lavel')==9){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('dealer/create'); ?>"
                                        data-i18n="nav.data-table.basic-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Add Dealer</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7||session('user_lavel')==8||session('user_lavel')==9){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('dealer/index'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">View Dealer</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php if(session('user_lavel')==1||session('user_lavel')==7){ ?>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-micon"><i class="ti-loop"></i></span>
                                <span class="pcoded-mtext">Dealer Type</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?php echo route('dealer/type/create'); ?>">
                                        <span class="pcoded-mtext">Add Dealer Type</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo route('dealer/type/index'); ?>">
                                        <span class="pcoded-mtext">View Dealer Type</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                            <span class="pcoded-mtext">Retailer</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="<?php echo route('retailer/create'); ?>"
                                    data-i18n="nav.data-table.basic-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Add Retailer </span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?php echo route('retailer/index'); ?>"
                                    data-i18n="nav.data-table.advance-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">View  Retailer</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                        <?php } ?>
                        <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7 ||session('user_lavel')==8){ ?>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-micon"><i class="ti-loop"></i></span>
                                <span class="pcoded-mtext">Branch</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <?php if(session('user_lavel')==1||session('user_lavel')==7){ ?>
                                <li class="">
                                    <a href="<?php echo route('branch/create'); ?>">
                                        <span class="pcoded-mtext">Add Branch</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7 ||session('user_lavel')==8){ ?>
                                <li class="">
                                    <a href="<?php echo route('branch/index'); ?>">
                                        <span class="pcoded-mtext">View Branch</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7||session('user_lavel')==8){ ?>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-micon"><i class="ti-loop"></i></span>
                                <span class="pcoded-mtext">Branch Area</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <?php if(session('user_lavel')==1||session('user_lavel')==7){ ?>
                                <li class="">
                                    <a href="<?php echo route('area/create'); ?>">
                                        <span class="pcoded-mtext">Add Area</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7||session('user_lavel')==8){ ?>
                                <li class="">
                                    <a href="<?php echo route('area/index'); ?>">
                                        <span class="pcoded-mtext">View Area </span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==3||session('user_lavel')==7||session('user_lavel')==8){ ?>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                        <span class="pcoded-mtext">Warranty Registration</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-mtext">Card Entry</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==3||session('user_lavel')==7){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('warrantyCard/create'); ?>"
                                        data-i18n="nav.data-table.basic-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Add Card Entry</span>
                                    </a>
                                </li>                                
                                <?php } ?>
                                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==3||session('user_lavel')==7 ||session('user_lavel')==8){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('warrantyCard/warrenty_card_search'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Search By Warrenty Card</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if(session('user_lavel')==1||session('user_lavel')==3||session('user_lavel')==7||session('user_lavel')==8){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('warrantyCard/warrenty_search_date'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Search Date Wise</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="<?php echo route('warrantyCard/warrenty_search_dealer'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Search Dealer Wise</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if(session('user_lavel')==1||session('user_lavel')==7){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('warrantyCard/index'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">View Card Entry</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>

                    </ul>
                </li>
                <?php } ?>
                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7 ||session('user_lavel')==8){ ?>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                        <span class="pcoded-mtext">Battery Replacement</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-mtext"> Replacement Entry</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('replacement/create'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Add Replacement Battery</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7 ||session('user_lavel')==8){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('warrantyCard/replacement/index'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">View Replacement Battery</span>
                                    </a>
                                </li>
                                <?php } ?>                                
                                <?php if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('warrantyCard/replacement_search'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Search By Replacement Battery</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if(session('user_lavel')==1||session('user_lavel')==4||session('user_lavel')==8){ ?>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                        <span class="pcoded-mtext">Task</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-mtext">Collect Phone Number</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <?php if(session('user_lavel')==1||session('user_lavel')==4){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('phoner_number/create'); ?>"
                                        data-i18n="nav.data-table.basic-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Add Collect Phone Number</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if(session('user_lavel')==1||session('user_lavel')==4||session('user_lavel')==8){ ?>
                                <li class=" ">
                                    <a href="<?php echo route('phoner_number/view'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">View Collect Phone Number</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php if(session('user_lavel')==1) {?>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-micon"><i class="ti-loop"></i></span>
                                <span class="pcoded-mtext">Number Stock Group</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">

                                <li class=" ">
                                    <a href="<?php echo route('phone_number/stock/create'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Add Number Stock Group</span>
                                    </a>

                                </li>

                                <li class=" ">
                                    <a href="<?php echo route('phone_number/stock/index'); ?>"
                                        data-i18n="nav.data-table.advance-initialization">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">View Number Stock Group</span>
                                    </a>

                                </li>

                            </ul>

                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                                <span class="pcoded-micon"><i class="ti-loop"></i></span>
                                <span class="pcoded-mtext">Product List Serial</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?php echo route('product/list/serial/create'); ?>">
                                        <span class="pcoded-mtext">Add List Serial </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo route('product/list/serial/index'); ?>">
                                        <span class="pcoded-mtext">View List Serial</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo route('product/list/serial/report/show'); ?>">
                                        <span class="pcoded-mtext">Report</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                </li>
            </ul>
            </li>
            <?php } ?>
            <?php if(session('user_lavel')==1 || session('user_lavel')==2 || session('user_lavel')==8){ ?>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                    <span class="pcoded-mtext">Message Setup</span>
                </a>
                <ul class="pcoded-submenu">
                    <?php if(session('user_lavel')==1 || session('user_lavel')==2 || session('user_lavel')==8){ ?>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" data-i18n="nav.data-table-extensions.main">
                            <span class="pcoded-mtext">Regular </span>
                        </a>
                        <ul class="pcoded-submenu">
                            <?php if(session('user_lavel')==1 || session('user_lavel')==2 || session('user_lavel')==8){ ?>
                            <li class=" ">
                                <a href="<?php echo route('regular/offer/create'); ?>"
                                    data-i18n="nav.data-table.basic-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Add New Message</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?php echo route('offer/index'); ?>"
                                    data-i18n="nav.data-table.advance-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Message View </span>
                                </a>
                            </li>
                            <!-- <li class=" ">
                                <a href="<?php echo route('regular/offer/index'); ?>"
                                    data-i18n="nav.data-table.advance-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Dealer Message View </span>
                                </a>
                            </li> -->
                            <?php } ?>                            
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            
            <?php if(session('user_lavel')==1){ ?>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                    <span class="pcoded-mtext">Service Center</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" data-i18n="nav.data-table.main">
                            <span class="pcoded-micon"><i class="ti-widgetized"></i></span>
                            <span class="pcoded-mtext">Branch</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="<?php echo route('service/branch/create'); ?>"
                                    data-i18n="nav.data-table.basic-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Add Branch</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?php echo route('service/branch/index'); ?>"
                                    data-i18n="nav.data-table.advance-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">View Branch</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?php echo route('service/center/image/create'); ?>"
                                    data-i18n="nav.data-table.basic-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Add Service Center Image</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?php echo route('service/center/image/index'); ?>"
                                    data-i18n="nav.data-table.basic-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">View Service Center Image</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?php echo route('service/article/index'); ?>"
                                    data-i18n="nav.data-table.basic-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">View Article</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?php echo route('service/article/create'); ?>"
                                    data-i18n="nav.data-table.basic-initialization">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Add Article</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>
            <?php } ?>
        </div>
    </nav>