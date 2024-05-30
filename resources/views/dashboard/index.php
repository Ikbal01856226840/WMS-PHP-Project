<style>
    .show-more-height { height: 56px; overflow:hidden; }
</style>
 <?php if(session('user_lavel')==5||session('user_lavel')==6){ ?>
    <div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-body m-t-50">
                            <div class="card">
                                <div class="card-header text-center p-0">
                                    <h3>New  Message</h3>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <?php foreach($offers as $offer) { ?>
                                        <div class=" col-sm-12">
                                            <div class="card user-card p-1">
                                                 <div class="row">
                                                    <?php
                                                        $temp_offer_arr=[];
                                                        foreach ($delear_new_offer as $key => $delear_new_offers) { ?>
                                                        <?php if( $offer['id'] == $delear_new_offers['offer_id'])  {
                                                            $temp_offer_arr[]=$delear_new_offers;
                                                                } }
                                                            foreach($temp_offer_arr as $key=>$row){
                                                                if((count($temp_offer_arr)%2!=0) && (count($temp_offer_arr)==$key+1)){
                                                                    ?>
                                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-xl-12 col-s-13">
                                                                        <div class="thumbnail">
                                                                            <div class="thumb">
                                                                                <a href="<?php echo asset($row['offer_file']); ?>" data-lightbox="1" data-title="My caption 1">
                                                                                    <img src="<?php  echo asset($row['offer_file']); ?>" alt="" class="img-fluid img-thumbnail" >
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                    <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6 col-s-4">
                                                                        <div class="thumbnail">
                                                                            <div class="thumb">
                                                                                <a href="<?php echo asset($row['offer_file']); ?>" data-lightbox="1" data-title="My caption 1">
                                                                                    <img src="<?php  echo asset($row['offer_file']); ?>" alt="" class="img-fluid img-thumbnail">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                               <?php } }?>  
                                                            </div>
                                                            <p style="font-size:20px; margin-left: 3px;"><?php echo   $offer['offer_name'] ?></p>
                                                            <p style=" margin-left: 3px;"> <?php echo date('d F, Y', strtotime( $offer['create_date'])); ?> </p>
                                                            <p class="show-more-height text"><?php echo  $offer['offer_message'] ?></p>
                                                            <?php if(strlen($offer['offer_message'])>100) {?>
                                                            <a class="show-more text-left" style="text-decoration: none; margin-top:-15px;">... More Details</a>
                                                            <?php }?>
                                                         </div>
                                                       </div>
                                                     <?php } ?>
                                                    </div>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>    
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else {?>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-body m-t-50">
                            <div class="row">
                                <!-- task, page, download counter  start -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-yellow update-card">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white"><?php echo $total_warranty_card?></h4>
                                                    <h6 class="text-white m-b-0">Total Warranty Card</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-1" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update :<?php echo date('y-m-d')?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-green update-card">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white"><?php echo $total_product?></h4>
                                                    <h6 class="text-white m-b-0">Total Product</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-2" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : <?php echo date('y-m-d')?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-pink update-card">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white"><?php echo $total_branch?></h4>
                                                    <h6 class="text-white m-b-0">Total Branch</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-3" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update :<?php echo date('y-m-d')?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-lite-green update-card">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white"><?php echo $service_branch?></h4>
                                                    <h6 class="text-white m-b-0">Total Service Center</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-4" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update :<?php echo date('y-m-d')?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- task, page, download counter  end -->

                                <!--  sale analytics start -->
                                <div class="col-xl-9 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Product Analytics</h5>
                                            <span class="text-muted">Showing details of all products of each group</span>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block table-responsive-md">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <td>
                                                        <canvas id="barChart" width="400" height="155"></canvas>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-12">
                                    <div class="card user-card2">
                                        <div class="card-block text-center">
                                            <h6 class="m-b-15">User Task </h6>
                                            <!-- <div class="risk-rate"> -->
                                                <!-- <span><b>5</b></span> -->
                                                <canvas id="myChart" width="400" height="400"></canvas>

                                            <!-- </div> -->
                                            <h6 class="m-b-10 m-t-10">Work Ratio</h6>
                                            <!-- <a href="#!" class="text-c-yellow b-b-warning">Highest </a> -->
                                            <div class="row justify-content-center m-t-10 b-t-default m-l-0 m-r-0">
                                                <div class="col m-t-15 b-r-default">
                                                <h6 class="text-muted max_ratio_d">User</h6>
                                                    <h6 class="text-muted max_ratio_name"></h6>
                                                    <!-- <h6 class="max_ratio"></h6> -->
                                                </div>
                                                <div class="col m-t-15">
                                                    <h6 class="text-muted">Created</h6>
                                                    <h6 class="create_max_date"></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php  echo route('warrantyCard/index') ?>" class="btn btn-warning btn-block p-t-15 p-b-1">Overall Report</a>
                                        
                                    </div>
                                </div>
                                <!--  sale analytics end -->

                                <div class="col-xl-8 col-md-12">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <h5>Service History</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="table-responsive">
                                                <table class="table table-hover  table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="chk-option">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label class="check-task">
                                                                            <input type="checkbox" value="">
                                                                            <span class="cr">
                                                                                <i class="cr-icon feather icon-check txt-default"></i>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                              Product Group
                                                            </th>
                                                            <th>Items</th>
                                                            <th>Ratio</th>
                                                            <th>Today Service Qty</th>
                                                            <th>Total Qty</th>
                                                            
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $key=1; foreach($gruop_item as $data){?>
                                                            <?php if(!empty($gruop_todate)){
                                                            foreach($gruop_todate as $s){ 
                                                                if($s['id']==$data['id'])  {  
                                                                    $warranty_card_curentdate=$s['today_date'];
                                                                    break; 
                                                                }else{   
                                                                    $warranty_card_curentdate=0;
                                                                } 
                                                              }
                                                           }?>
                                                        <tr>
                                                            <td>
                                                                <div class="chk-option">
                                                                    <div class="checkbox-fade fade-in-primary">
                                                                        <label class="check-task">
                                                                            <input type="checkbox" value="">
                                                                            <span class="cr">
                                                                                <i class="cr-icon feather icon-check txt-default"></i>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
																<div class="d-inline-block align-middle">
                                                                    <h6><?php echo  $data['name']?></h6>
                                                                    <p class="text-muted m-b-0"><?php echo  $data['description']?></p>
                                                                </div>
                                                                
                                                            </td>
                                                            <td><?php echo  $data['product_id']?></td>
                                                            <td><canvas id="<?php echo 'app-sale'.$key++;?>" height="50" width="100"></canvas></td>
                                                            <td><?php echo $warranty_card_curentdate ?? 0 ?></td>
															 <td><?php echo  $data['total_count_warranty_card']?></td>
                                                           
                                                        </tr>
                                                       <?php } ?>
                                                      
                                                        
                                                    </tbody>
                                                </table>
                                                <div class="text-center">
                                                    <a href="<?php echo route('stockGroup/index'); ?>" class=" b-b-primary text-primary">View all Group</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="card user-activity-card">
                                        <div class="card-header">
                                            <h5>User Activity</h5>
                                        </div>
                                        <div class="card-block">
                                            <?php foreach($users as $user) {?>
                                            <div class="row m-b-25">
                                                <div class="col-auto p-r-0">
                                                    <div class="u-img">
                                                        <img src="<?php echo asset('libraries\images\breadcrumb-bg.jpg')?> "alt="user image" class="img-radius cover-img">
                                                        <img src="<?php echo asset('libraries\images\avatar-2.jpg')?>" alt="user image" class="img-radius profile-img">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="m-b-5"><?php echo $user['name']?></h6>
                                                    <p class="text-muted m-b-0"><?php echo $user['address']?></p>
                                                    <p class="text-muted m-b-0"><i class="feather icon-clock m-r-10"></i><?php echo $user['created_at']?></p>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
                                            <div class="text-center">
                                                <a href="<?php echo route('user/index'); ?>" class="b-b-primary text-primary">View all User</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script type="text/javascript" src="<?php echo asset('libraries\bower_components\chart.js\js\Chart.js'); ?>"></script>
<script src="<?php echo asset('libraries\pages\chart\chartjs\chartjs-custom.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>

function drawChart() {
$.ajax({
            url: "<?php echo route('user/rastio'); ?>",
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                let maxvalue=[];
                let lable=[];
                let value=[];
                for(i=0;i<response.length;i++){
                    lable.push(response[i]['name']);
                    value.push(response[i]['ratio']);
                    
                }
               

                function my_max(_data){
                    var out = 0;
                    for(var key in _data){
                        out = Math.max(out,  _data[key]['ratio']);
                    }
                    return out;
                }
              let max =my_max(response);
              var gh;
              for(i=0;i<response.length;i++){
                   if(max==response[i]['ratio']){
                    $('.max_ratio_name').text(response[i]['name']);
                    $('.max_ratio').text(response[i]['ratio']);
                    $('.create_max_date').text(response[i]['create_date']);
                   
                   }
                    
                }
                
                                /*Doughnut chart*/
                var ctx = document.getElementById("myChart");
                var data = {
                    labels: lable,
                    datasets: [{
                        data: value,
                        backgroundColor: [
                            "#1ABC9C",
                            "#FCC9BA",
                            "#B8EDF0",
                            "#B4C1D7"
                        ],
                        borderWidth: [
                            "0px",
                            "0px",
                            "0px",
                            "0px"
                        ],
                        borderColor: [
                            "#1ABC9C",
                            "#FCC9BA",
                            "#B8EDF0",
                            "#B4C1D7"

                        ]
                    }]
                };

                var myDoughnutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: data
                });



            }
        
        }) 

}
drawChart();
</script>
<script>
$(".show-more").click(function () {

if( $(this).text()=="(Show Less)")$(this).text("... More Details");
else $(this).text("(Show Less)");


$(this).closest('div').find(".text").toggleClass("show-more-height");
});
function group_item_chart(){
    $.ajax({
            url: "<?php echo route('group_item/rastio'); ?>",
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                let maxvalue=[];
                let lable1=[];
                let value1=[];
                for(i=0;i<response.length;i++){
                    lable1.push(response[i]['name']);
                    value1.push(response[i]['product_count']);
                    
                }
                /*Bar chart*/
                var data1 = {
                    labels: lable1,
                    datasets: [{
                        label: "Group Wise Product",
                        backgroundColor: [
                            "#1ABC9C",
                            "#FCC9BA",
                            "#B8EDF0",
                            "#B4C1D7",
                            "#1ABC9C",
                            "#FCC9BA",
                            "#B8EDF0",
                            "#B4C1D7",
                            "#1ABC9C",
                            "#FCC9BA",
                            "#B8EDF0",
                            "#B4C1D7",
                            "#1ABC9C",
                            "#FCC9BA",
                            "#B8EDF0",
                            "#B4C1D7",
                            "#1ABC9C",
                            "#FCC9BA",
                            "#B8EDF0",
                            "#B4C1D7",
                            "#1ABC9C",
                            "#FCC9BA",
                            "#B8EDF0",
                            "#B4C1D7",
                            // 'rgba(95, 190, 170, 0.99)',
                            'rgba(93, 156, 236, 0.93)'
                        ],
                        hoverBackgroundColor: [
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)',
                            'rgba(26, 188, 156, 0.88)'

                        ],
                        data: value1,
                    }]
                };

                var bar = document.getElementById("barChart").getContext('2d');
                var myBarChart = new Chart(bar, {
                    type: 'bar',
                    data: data1,
                    options: {
                        barValueSpacing: 20
                    }
                });


            }
        
        }) 




}
group_item_chart();
</script>