<?php

namespace App\Controllers;

use App\Models\User;


class ServiceCenterController  extends Controller
{
    private $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->auth = new User();
    }

    /**
     * Display a login page
     *
     * @return view
     */
    public function index()
    {
        // $image= $this->auth->table('service_center_image')->where('image_active',1)->fetchAll();
        $image= $this->auth->query('SELECT * FROM service_center_image')->fetchAll();
    
        return view('service_center',compact('image'),false);
    }
    public function show(){
        $service= $_GET['service_id'] ;
        if(!empty( $service)){
   
            $service_data=$this->auth->query(" SELECT * FROM service_branch WHERE service_branch.service_center_name LIKE '$service%' OR service_branch.address LIKE '$service%' OR service_branch.near_area LIKE '$service%'LIMIT 6")->fetchAll();
            if(!empty($service_data)){
                $get_service=$service_data;
            }
            else{
                $get_service=$this->auth->query(" SELECT * FROM service_branch WHERE service_branch.service_center_name LIKE '%$service%' OR service_branch.address LIKE '%$service%' OR service_branch.thana LIKE '%$service%' OR service_branch.district LIKE '%$service%' OR service_branch.near_area LIKE '%$service%'LIMIT 6")->fetchAll();
            }
            $dealer_data=$this->auth->query(" SELECT * FROM dealer WHERE ( dealer.thana LIKE '$service%'OR dealer.district LIKE '$service%'OR dealer.near_area LIKE '$service%' ) AND dealer.status=1")->fetchAll();
            if(!empty($dealer_data)){
                $dealer=$dealer_data;
            }else{
                $dealer=$this->auth->query(" SELECT * FROM dealer WHERE ( dealer.thana LIKE '%$service%' OR dealer.district LIKE '%$service%' OR dealer.near_area LIKE '%$service%') AND dealer.status=1 ")->fetchAll(); 
            }
            $retailer_serch=$this->auth->query(" SELECT * FROM retailer WHERE retailer.name LIKE '%$service%' OR retailer.address LIKE '%$service%'  LIMIT 6")->fetchAll();
            $mul_array=['service'=> $get_service,'dealer'=>$dealer,'retailer'=>$retailer_serch];
           
        }else{
            $mul_array=null;
        }
   
        echo json_encode($mul_array);
        exit();
    }
    public function dealerIndex(){
        $image= $this->auth->query('SELECT * FROM service_center_image WHERE image_active=1  ORDER BY id DESC')->fetchAll();
        return view('dealer_main_page',compact('image'),false);
    }

    public function service_show(){
        $service_data= $this->auth->query('SELECT * FROM service_branch')->fetchAll();
        return view('service',compact('service_data'),false);
    }
   
}
