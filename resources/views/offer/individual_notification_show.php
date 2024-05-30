<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body ">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <div class="page-header mt-4 ">
                            <div class="row align-items-end text-center">
                                <div class="col-md-12 ">
                                    <h4 class="text-center">Notification</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <!-- Basic Form Inputs card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <!-- <h5>Add Admin</h5> -->
                                        <div class="card-header-right">
                                            <i class="icofont icofont-spinner-alt-5"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="card user-card ">
                                            <div class="card-header" style="padding: 1px 20px;">
                                                <h4 style="font-weight: bold; margin-top:5px;"><?php echo $individual_offer['offer_name'] ?></h4>

                                            </div>

                                            <div class="card-block " style="padding-bottom:0px ;">
                                                <h4><?php echo date('d F, Y', strtotime($individual_offer['start_date'])) ?></h4>
                                                <div class="top-cap-text p1">
                                                    <p><?php echo $individual_offer['offer_message'] ?></p>
                                                </div>
                                                <div class="row center">
                                                    <?php $c = count($individual_offer_files);
                                                    $t = 0;
                                                    $keys = array_keys($individual_offer_files);
                                                    $last = end($keys);
                                                    $jpegs = glob("./*.jpg");
                                                    foreach ($individual_offer_files as $key => $individual_offer_file) { ?>
                                                        <?php $pdf = substr($individual_offer_file['offer_file'], -3);

                                                        if ($pdf == 'pdf') { ?>
                                                            <?php if ($c % 2 == 0) { ?>
                                                                <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6 col-s-4" style="padding: 1px 8px;">
                                                                    <div class="card prod-view" style="margin-bottom:10px ;">
                                                                        <div class="prod-item text-center">
                                                                            <div class="prod-img">
                                                                                <div class="thumbnail " style="margin-bottom:0px ;">
                                                                                    <div class="thumb">
                                                                                        <a href="<?php echo route('pdf/show/' . $individual_offer_file['offer_file_id']); ?>">
                                                                                            <img src="<?php echo asset('libraries/pdf.png'); ?>" alt="" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;" class="img-fluid img-thumbnail">
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php } elseif ($c % 2 != 0) {
                                                                if ($last == $key) { ?>
                                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-xl-12 col-s-13" style="padding: 1px 8px;">
                                                                        <div class="card prod-view" style="margin-bottom:10px ;">
                                                                            <div class="prod-item text-center">
                                                                                <div class="prod-img">
                                                                                    <div class="thumbnail  ">
                                                                                        <div class="thumb">
                                                                                            <a href="<?php echo route('pdf/show/' . $individual_offer_file['offer_file_id']); ?>">
                                                                                                <img src="<?php echo asset('libraries/pdf.png'); ?>" alt="" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;" class="img-fluid img-thumbnail">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6 col-s-4" style="padding: 1px 8px;">
                                                                        <div class="card prod-view" style="margin-bottom:10px ;">
                                                                            <div class="prod-item text-center">
                                                                                <div class="prod-img">
                                                                                    <div class="thumbnail " style="margin-bottom:0px ;">
                                                                                        <div class="thumb">
                                                                                            <a href="<?php echo route('pdf/show/' . $individual_offer_file['offer_file_id']); ?>">
                                                                                                <img src="<?php echo asset('libraries/pdf.png'); ?>" alt="" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;" class="img-fluid img-thumbnail">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            <?php }
                                                            }
                                                        } else {
                                                            ?>

                                                            <?php if ($c == 1) { ?>
                                                                <div class="col-xl-12 col-md-12 col-sm-12 col-xl-54  col-s-13" style="padding: 1px 8px;">
                                                                    <div class="card prod-view" style="margin-bottom:10px ;">
                                                                        <div class="prod-item text-center">
                                                                            <div class="prod-img">
                                                                                <div class="thumbnail " style="margin-bottom:0px ;">
                                                                                    <div class="thumb">
                                                                                        <a href="<?php echo asset($individual_offer_file['offer_file']); ?>" data-lightbox="1" data-title="My file 1">
                                                                                            <img src="<?php echo asset($individual_offer_file['offer_file']); ?>" alt="" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;" class="img-fluid img-thumbnail">
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } elseif ($c % 2 == 0) { ?>
                                                                <div class="col-xl-6 col-md-6 col-sm-6 col-xs-12 col-s-4" style="padding: 1px 8px;">
                                                                    <div class="card prod-view" style="margin-bottom:10px ;">
                                                                        <div class="prod-item text-center">
                                                                            <div class="prod-img">
                                                                                <div class="thumbnail " style="margin-bottom:0px ;">
                                                                                    <div class="thumb">
                                                                                        <a href="<?php echo asset($individual_offer_file['offer_file']); ?>" data-lightbox="1" data-title="My file 1">
                                                                                            <img src="<?php echo asset($individual_offer_file['offer_file']); ?>" alt="" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;" class="img-fluid img-thumbnail">
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php } elseif ($c % 2 != 0) {
                                                                if ($last == $key) { ?>

                                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-xl-54 col-s-13" style="padding: 1px 8px;">
                                                                        <div class="card prod-view" style="margin-bottom:10px ;">
                                                                            <div class="prod-item text-center">
                                                                                <div class="prod-img">
                                                                                    <div class="thumbnail  ">
                                                                                        <div class="thumb">
                                                                                            <a href="<?php echo asset($individual_offer_file['offer_file']); ?>" data-lightbox="1" data-title="My file 1">
                                                                                                <img src="<?php echo asset($individual_offer_file['offer_file']); ?>" alt="" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;" class="img-fluid img-thumbnail">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } else { ?>

                                                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-12 col-s-4" style="padding: 1px 8px;">
                                                                        <div class="card prod-view" style="margin-bottom:10px ;">
                                                                            <div class="prod-item text-center">
                                                                                <div class="prod-img">
                                                                                    <div class="thumbnail " style="margin-bottom:0px ;">
                                                                                        <div class="thumb">
                                                                                            <a href="<?php echo asset($individual_offer_file['offer_file']); ?>" data-lightbox="1" data-title="My file 1">
                                                                                                <img src="<?php echo asset($individual_offer_file['offer_file']); ?>" alt="" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;" class="img-fluid img-thumbnail">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                    <?php }
                                                            }
                                                        }
                                                    } ?>

                                                </div>

                                                <!-- 
                                                        <img class="img-fluid" src=" " alt="img-inverse">
                                                    -->
                                            </div>

                                        </div>

                                        <div class="col-md-12 text-center">
                                            <?php if (session('role_id') == 1) { ?>
                                                <a href="<?php echo route('regular/offer/index'); ?>" class="edit"><i class="btn btn-primary px-5 m-4">Back</i></a>
                                            <?php } else { ?>
                                                <a href="<?php echo route('individual/dealer/offer/index'); ?>" class="edit"><i class="btn btn-primary px-5 m-4  ">All Notication </i></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- Page-body end -->
                    </div>
                    <!-- Main-body end -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>