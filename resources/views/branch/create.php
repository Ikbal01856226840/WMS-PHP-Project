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
                                    <h4 class="text-center">Branch Setup</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-8">
                                    <!-- Basic Form Inputs card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <!-- <h5>Add Admin</h5> -->
                                            <div class="card-header-right">
                                                <i class="icofont icofont-spinner-alt-5"></i>
                                            </div>

                                        </div>
                                        <div class="card-block">
                                            <form action="<?php echo route('branch/save'); ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12 text-left">
                                                        <div class="form-group my-2 row">
                                                            <label class="col-md-3 col-form-label">Branch Name</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="BranchName" class="form-control BranchName" placeholder="Enter Branch Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-md-3 col-form-label">Address</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="Address" class="form-control Address" placeholder="Enter Address" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-md-3 col-form-label">Phone Number One</label>
                                                            <div class="col-md-8">
                                                                <input type="number" name="phone_number_one" class="form-control phone_number_one" placeholder="Enter Phone Number One" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-md-3 col-form-label">Phone Number Two</label>
                                                            <div class="col-md-8">
                                                                <input type="number" name="phone_number_two" class="form-control phone_number_two" placeholder="Enter Phone Number Two" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-md-3 col-form-label">Email</label>
                                                            <div class="col-md-8">
                                                                <input type="email" name="email" class="form-control email" placeholder="Enter Email" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-md-3 col-form-label">Active</label>
                                                            <div class="col-md-8">
                                                                <select name="Active" id="" class="form-control Active" required>
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
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

                                <div class="col-md-3"></div>
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