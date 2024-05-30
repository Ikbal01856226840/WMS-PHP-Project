<div class="pcoded-main-container">
    <div class="pcoded-content  ">
        <div class="pcoded-inner-content  " >
               <br>
                <!-- Main-body start -->
            <div class="main-body ">
                <div class="page-wrapper m-t-0 m-l-2 m-r-2 p-12">
                <!-- Page-header start -->
                    <div class="page-header m-0 p-0">
                        <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                            <div class="d-inline ">
                                <h4 class="text-center mx-auto">Add User</h4>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <!-- Page body start -->
                    <div class="page-body">
                            <!-- Basic Form Inputs card start -->
                        <form action="<?php echo route('user/save'); ?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="card-block ">
                                            <h6 class="m-t-0">Add User</h6>
                                            <hr>
                                            <div class="form-group my-2 row">
                                                <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">User Id</label>
                                                <div class="col-xl-10 col-md-10 col-sm-10 col-xs-10">
                                                    <input type="text" name="userName" class="form-control" placeholder="Enter User Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">Password</label>
                                                <div class="col-xl-10 col-md-10 col-sm-10 col-xs-10">
                                                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">User Level</label>
                                                <div class="col-xl-10 col-md-10 col-sm-10">
                                                    <select name="userLevel" id="userLevel_id" class="form-control js-example-basic-single " required>
                                                        <option value="0">Select</option>
                                                        <?php if (!empty($userLevel)) {
                                                            foreach ($userLevel as $row) {
                                                        ?>
                                                                <option value="<?php if (!empty($row['id'])) echo $row['id']; ?>"><?php if (!empty($row['id'])) echo $row['user_level']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">Branch Name</label>
                                                <div class="col-xl-10 col-md-10 col-sm-10 col-xs-2">
                                                    <select name="branchName" id="" class="form-control js-example-basic-single" required>
                                                        <option value="0">Select</option>
                                                        <?php if (!empty($branch)) {
                                                            foreach ($branch as $row) {
                                                                if (!empty($row['id']) && !empty($row['name'])) {
                                                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                }
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group my-2 row">
                                                <label class="col-md-2 col-form-label">Active</label>
                                                <div class="col-md-10">
                                                    <select name="is_active" id="" class="form-control status js-example-basic-single" required>
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactivate</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6 "  >
                                        <div class="card-block  " > 
                                            <h6 class="">Basic Inputs</h6>
                                            <hr>
                                            <div class=" b-l-default m-t-0 " style="margin-left:-36px;">
                                                <div style="margin-left: 36px;">
                                                    <div class="form-group my-2 row">
                                                        <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">FullName</label>
                                                        <div class="col-xl-10 col-md-10 col-sm-10">
                                                            <input type="text" name="fullName" class="form-control" placeholder="Enter Full Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-xl-2 col-md-2 col-sm-2 col-form-label">Email Address</label>
                                                        <div class="col-xl-10 col-md-10 col-sm-10">
                                                            <input type="text" name="emailAddress" class="form-control" placeholder="Enter Email Address">
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">User Phone</label>
                                                        <div class="col-xl-10 col-md-10 col-sm-10">
                                                            <input type="text" name="userPhone" class="form-control" placeholder="Enter User Phone Number" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-2 row">
                                                        <label class="col-xl-2 col-md-2 col-sm-2 col-xs-2 col-form-label">Address</label>
                                                        <div class="col-xl-10 col-md-10 col-sm-10">
                                                            <input type="text" name="address" class="form-control" placeholder="Enter User Address">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <button type="submit" class="btn hor-grd btn-grd-primary btn-block submit" style="width:100%" ><u>S</u>ave</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <a class=" btn hor-grd btn-grd-success btn-block " href="<?php echo route('dashboard') ?>" style="width:100%"><u>B</u>ack</a>
                                    </div>
                                </div>
                            </div>
                                <!-- Input Alignment card end -->
                        </form>
                    </div>  
                </div>   
           </div>  
       </div>
   </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
