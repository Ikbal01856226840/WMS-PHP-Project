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
                                <div class="col-md-12 ">
                                    <h4 class="text-center">Warranty Period Create</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-md-2 col-lg-3"></div>
                                <div class="col-md-8 col-lg-6">
                                    <!-- Basic Form Inputs card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <!-- <h5>Add Admin</h5> -->
                                            <div class="card-header-right">
                                                <i class="icofont icofont-spinner-alt-5"></i>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <form action="<?php echo route('product/warranty/period_store'); ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12 form-group row">
                                                        <!-- <div class="form-group my-2 my-2 row">
                                                            <label class="col-md-3 col-form-label">Warranty Period Value</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="value" class="form-control value" placeholder="" required>
                                                            </div>
                                                        </div> -->
                                                        <label class="col-md-4 col-form-label">Warranty Period</label>
                                                        <div class="col-md-8">
                                                            <select name="value" class="form-control value js-example-basic-single" required>
                                                                <option value="0" class="d-inline">Select</option>
                                                                <option value="3" class="d-inline">3 Months</option>
                                                                <option value="6" class="d-inline">6 Months</option>
                                                                <option value="9" class="d-inline">9 Months</option>
                                                                <option value="12" class="d-inline">12 Months</option>
                                                                <option value="15" class="d-inline">15 Months</option>
                                                                <option value="18" class="d-inline">18 Months</option>
                                                                <option value="21" class="d-inline">21 Months</option>
                                                                <option value="24" class="d-inline">24 Months</option>
                                                                <option value="60" class="d-inline">60 Months</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group row mb-0">
                                                        <div class="col-md-4">
                                                            <label for="">Warranty Period Code</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control code" name="code" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group row mb-0">
                                                        <div class="col-md-4">
                                                            <label for="">Warranty Note</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control note" name="note" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <div class="form-group my-2 my-2 row">
                                                            <div class="col-md-12 text-center">
                                                                <button type="submit" class="btn btn-primary px-5 mt-4">Submit</button>
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