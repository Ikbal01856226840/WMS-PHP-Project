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
                                    <h4 class="text-center">Branch Area</h4>
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
                                            <form action="<?php echo route('area/save'); ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12 text-left">
                                                        <div class="form-group my-2 row">
                                                            <label class="col-md-3 col-form-label">Area Name</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="area_name" class="form-control AreaName" placeholder="Enter Area Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                        <label class="col-md-3 col-form-label">Branch</label>
                                                            <div class="col-md-8">
                                                                <select name="branch_id" class="form-control js-example-basic-single  ParentDealer" id="" required>
                                                                    <option value="0">Select</option>
                                                                    <?php
                                                                    if (!empty($branchs)) {
                                                                        foreach ($branchs as $branch) { ?>
                                                                            <option value="<?php if (!empty($branch['id'])) echo $branch['id']; ?>"><?php if (!empty($branch['name'])) echo $branch['name']; ?></option>
                                                                    <?php }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-md-3 col-form-label">Sales parson</label>
                                                            <div class="col-md-8">
                                                            <input type="text" name="sales_parson" class="form-control AreaName" placeholder="Enter Area Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-2 row">
                                                            <label class="col-md-3 col-form-label">Phone Number </label>
                                                            <div class="col-md-8">
                                                                <input type="number" name="phone_number" class="form-control phone_number_two" placeholder="Enter Phone Number " >
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