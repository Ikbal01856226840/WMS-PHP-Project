<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <div class="page-header mt-1 ">
                            <div class="row align-items-end text-center mt-3">
                                <div class="col-md-12 ">
                                    <h4 class="text-center">Offer File Show</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-2"></div>
                                <div class="col-lg-6 col-md-8">
                                    <!-- Basic Form Inputs card start -->
                                    <div class="card">

                                        <div class="card-block">

                                            <div class="row">
                                                <div class="col-md-12 text-left">

                                                    <span class="Prd_batch_no">
                                                        <img src="<?php echo asset($row['offer_file']) ?>" alt="Italian Trulli" width="100%" height="100%">
                                                    </span>
                                                    <div class="form-group row  m-1">
                                                        <div class="col-sm-12 text-center">
                                                            <a href="<?php echo route('individual/dealer/offer/index'); ?>" class="edit"><i class="btn btn-primary px-5 m-4">Back</i></a>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-2 "></div>
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