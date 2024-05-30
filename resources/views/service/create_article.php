
<div class="pcoded-main-container">
    <div class="pcoded-content  ">
        <div class="pcoded-inner-content " >
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
                                <h4 class="text-center mx-auto">Add Article<h4>
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
                        <form action="<?php echo route('service/article/save'); ?>" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-xl-10 " >
                                        <div class="card-block ">
                                            <div class="form-group my-2 row">
                                                <label class="col-md-1 col-form-label">Article </label>
                                                <div class="col-md-11">
                                                  <textarea name="article_details"  class="form-control Address" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-md-1 col-form-label m-2" >Active</label>
                                        <div class="col-md-4">
                                            <select name="status" id="" class="form-control Active js-example-basic-single" required>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
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

