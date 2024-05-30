<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <div class="page-header mt-4 ">
                            <div class="row align-items-end text-center mt-5">
                                <div class="col-sm-12 ">
                                    <h4 class="text-center">Retailer Category</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <!-- Basic Form Inputs card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <!-- <h5>Add Admin</h5> -->
                                            <div class="card-header-right">
                                                <i class="icofont icofont-spinner-alt-5"></i>
                                            </div>

                                        </div>
                                        <div class="card-block">
                                            <form action="<?php echo route('retailer/type/save'); ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12 text-left">

                                                        <div class="form-group my-2 row">
                                                            <label class="col-sm-2 col-form-label">Retailer Type</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="RetailerType" class="form-control DealerType" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <div class="col-sm-12 text-center">
                                                                <button type="submit" class="btn btn-primary px-5 mt-4">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3"></div>
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