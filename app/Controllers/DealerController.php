<?php

namespace App\Controllers;

use App\Models\Dealer;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class DealerController extends Controller
{
    use GenerateList;

    public $dealer;
    public function __construct()
    {
        parent::__construct();
        $this->dealer = new Dealer();
        if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==3||session('user_lavel')==7||session('user_lavel')==8||session('user_lavel')==9){
            true;
        }else{
            redirect('auth/login');
        }
    }
    public function create()
    {
        $data = $this->dealer->table('dealertype')->fetchAll();
        $cid=$this->dealer->query('SELECT * FROM dealer ORDER BY id DESC')->fetch();
       
        if(session('user_lavel')==2 || session('user_lavel')==8){
            $branchs= $this->dealer->query("SELECT branch.id, branch.name FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id='".session('user_id')."'")->fetchAll();       
        }else{
           $branchs = $this->dealer->table('branch')->fetchAll();
        }
        $areas = $this->dealer->table('areas')->fetchAll();
        return view('dealer/create', compact('data', 'cid','branchs','areas'));
    }
    public function  areaShow()
    {
        $data = $this->dealer->query("SELECT areas.id,areas.area_name FROM areas WHERE  areas.branch_id='".$_GET['branch_id']."'")->fetchAll();
        echo json_encode($data);
       
    }
    public function index()
    {
        
        if(!empty($_GET['branch_id'])||!empty($_GET['area_id'])){
            if($_GET['branch_id']==0 &&$_GET['area_id']==0){
              $branch_and_area = "";
            }else if($_GET['branch_id']==0){
                $branch_and_area = "AND d.area_id='".$_GET['area_id']."'";
               
            }else if($_GET['area_id']==0){
                $branch_and_area = "AND d.branch_id='".$_GET['branch_id']."'";
            }else{
                $branch_and_area = "AND d.branch_id='".$_GET['branch_id']."' AND d.area_id='".$_GET['area_id']."'";
            }
            $area_id=$_GET['area_id'];
            $branch_id=$_GET['branch_id'];
        }else{
            $branch_and_area = "";
            $branch_id="";
            $area_id="";
        }


        //  dd($branch_and_area);      
        
        if(session('user_lavel')==2 || session('user_lavel')==8){
            $branchs= $this->dealer->query("SELECT branch.id, branch.name FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id='".session('user_id')."'")->fetchAll();                   
            $branch_area = $this->dealer->table('areas')->where('branch_id', $branchs[0]['id'])->fetchAll();
            $branch_and_area = "AND d.branch_id='".$branchs[0]['id']."'";
        }else{
           $branchs = $this->dealer->table('branch')->fetchAll();
           $branch_area = $this->dealer->table('areas')->where('branch_id', $branch_id)->fetchAll();
        }

        // dd($branch_and_area);
        $data = $this->dealer->query("SELECT d.id, dy.typename,d.parent_dealer, d.status,
                                    d.dealertype_id,d.dealercode,d.dealeralise,d.name,d.dealerdetails,d.address,d.thana,
                                    d.district,d.near_area, d.email, d.phone1, d.phone2, d.fax ,d.area_id,pd.name as pdName,branch.id 
                                    as branch_id,branch.name as branch_name,areas.area_name
                                    FROM `dealer` as d 
                                    LEFT JOIN dealer as pd on pd.id=d.parent_dealer
                                    LEFT JOIN branch  on branch.id=d.branch_id
                                    LEFT JOIN areas  on areas.id=d.area_id
                                    LEFT JOIN dealertype as dy on dy.id=d.dealertype_id WHERE d.customer_type=1 $branch_and_area ")->fetchAll();
        
        $dealertype = $this->dealer->table('dealertype')->fetchAll();
        $cid=$this->dealer->query('SELECT * FROM dealer ORDER BY id DESC')->fetch();
        return view('dealer/index', compact('data', 'dealertype', 'cid','branchs','branch_id','area_id','branch_area'));
    }

    public function edit()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $where = "WHERE d.id = $id";
            $get_id_dealer = $this->dealer->dealeredit($where);

            $dealer = $this->dealer->table('dealer')->where('id',$id)->fetch();
            $areas = $this->dealer->table('areas')->where('branch_id',  $dealer->branch_id)->fetchAll();
            
            $data=['dealer'=>$get_id_dealer,'areas'=>$areas];
            if (!empty($data)) {
                echo json_encode($data);
            } else echo 0;
        } else {
            return view('dealer/index');
        }
    }

    public function store()
    {
        $password="123456";
        if ($_POST) {
            $id = $_POST['id'] ?? null;
            $DealerType = $_POST['DealerType'] ?? null;
            $branch_id=$_POST['branch_id']?? NULL;
            $status=$_POST['status'] ?? null;
            $area_id = $_POST['area_id'] ?? null;
            $DealerCode = $_POST['DealerCode'] ?? null;
            $DealerAlise = $_POST['DealerAlias'] ?? null;
            $DealerName = $_POST['DealerName'] ?? null;
            $Address = $_POST['Address'] ?? null;
            $thana = $_POST['thana'] ?? null;
            $District = $_POST['District'] ?? null;
            $near_area = $_POST['near_area'] ?? null;
            $Email = $_POST['Email'] ?? null;
            $Phone1 = $_POST['Phone1'] ?? null;
            $Phone2 = $_POST['Phone2'] ?? null;
            $Fax = $_POST['Fax'] ?? null;
            $is_match_dealer_code=$this->dealer->table('dealer')->where('dealercode', $DealerCode)->count();
            if(!empty($is_match_dealer_code) && empty($id)){
                $DealerCode=$this->dealer->query('SELECT  MAX(dealercode) AS dealercode FROM dealer ORDER BY id DESC')->fetch()['dealercode'];
                $DealerCode+=1;
            }else if(!empty($is_match_dealer_code) && !empty($id) && $is_match_dealer_code>1){
                $DealerCode=$this->dealer->query('SELECT  MAX(dealercode) AS dealercode FROM dealer ORDER BY id DESC')->fetch()['dealercode'];
                $DealerCode+=1;
            }
            $data = [
                'id' => $id,
                'dealertype_id' => $DealerType,
                'dealercode' => $DealerCode,
                'dealeralise' => $DealerAlise,
                'name' => $DealerName,
                'area_id'=> $area_id,
                'branch_id'=>$branch_id,
                'status'=>$status,
                'address' => $Address,
                'thana' =>  $thana,
                'district' => $District,
                'near_area' =>$near_area,
                'email' => $Email,
                'Phone1' => $Phone1,
                'Phone1' => $Phone1,
                'Phone2' => $Phone2,
                'fax' => $Fax,
            ];
           
            if (!empty($id)) {
                $update = $this->dealer->table('dealer')->where('id', $id)->update($data);
                $get_user_id = $this->dealer->table('users')->where('dealer_id',$id)->fetch();
                    if(empty($get_user_id)){
                        $user_info = [
                            
                            'name' => $DealerName,
                            'email' =>'',
                            'user_name' =>$DealerCode,
                            'password' => bcrypt($password),
                            'role_id' =>5,
                            'is_active'=>1,
                            'branch_id' => $branch_id,
                            'dealer_id'=> $id,
                            'address' => $Address,
                            'user_phone'=>$Phone1,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ];
                        $user_info = $this->dealer->table('users')->insert( $user_info);
                
                    }else {
                    $user = [
                        'name' => $DealerName,
                        'email' =>'',
                        'user_name' =>$DealerCode,
                        'branch_id' =>$branch_id,
                        'dealer_id'=>$id,
                        'address'=>$Address,
                        'user_phone'=>$Phone1,
                        'updated_at' =>date('Y-m-d H:i:s'),
                    ];
                
                    $user_info =$this->dealer->table('users')->where('id',$get_user_id['id'])->update($user);
                }
                if (!empty($update)) {
                    notification(['type' => 'success', 'message' => 'Updated Successfully']);
                    echo 1;
                } else echo 0;
            } else {
                $data = $this->dealer->table('dealer')->insert($data);
                $dealer_id=$this->dealer->lastInsertId();
                $user_info = [
                    'name' => $DealerName,
                    'email' =>'',
                    'user_name' =>$DealerCode,
                    'password' => bcrypt($password),
                    'role_id' =>5,
                    'is_active'=>1,
                    'branch_id' => $branch_id,
                    'dealer_id'=> $dealer_id,
                    'address' => $Address,
                    'user_phone'=>$Phone1,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $user_info = $this->dealer->table('users')->insert( $user_info);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('dealer/index');
            }
        }
    }

    public function type_create()
    {

        return view('dealer/type_create');
    }
    public function type_index()
    {
        $data = $this->dealer->table('dealertype')->fetchAll();
        return view('dealer/type_index', compact('data'));
    }

    public function type_store()
    {
        if ($_POST) {
            $DealerType = $_POST['DealerType'] ?? null;
            $id = $_POST['id'] ?? null;
            $data = [
                'typename' => $DealerType,
            ];
            if (!empty($id)) {
                $rs = $this->dealer->table('dealertype')->where('id', $id)->update($data);
                if (!empty($rs)) {
                    echo 1;
                }
            } else {
                $data = $this->dealer->table('dealertype')->insert($data);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('dealer/type/index');
            }
        }
    }

    public function data()
    {
        if(session('user_lavel')==3){
            $branch_id= $this->dealer->table('users')->where('id', session('user_id'))->fetch();
            $dealer_name =  $_GET['name'];
            $product_id = $this->dealer->query("SELECT d.id, dy.typename,d.dealercode,d.dealeralise,d.name,d.dealerdetails,d.address,d.thana,d.district, d.near_area,d.email, d.phone1, d.phone2, d.fax ,d.area_id,d.branch_id,pd.name as pdName,branch.name as branch_name, areas.area_name,areas.sales_parson
            FROM `dealer` as d 
            LEFT JOIN dealer as pd on pd.id=d.parent_dealer
            LEFT JOIN branch  on branch.id=d.branch_id
            LEFT JOIN areas  on areas.id=d.area_id
            LEFT JOIN dealertype as dy on dy.id=d.dealertype_id   WHERE d.customer_type=1 AND branch.id=$branch_id->branch_id AND  d.name LIKE '%$dealer_name%' Limit 10 ")->fetchAll();
            echo json_encode($product_id);
            exit();  
        }else{
            $dealer_name =  $_GET['name'];
            $product_id = $this->dealer->query("SELECT d.id, dy.typename,d.dealercode,d.dealeralise,d.name,d.dealerdetails,d.address,d.thana,d.district, d.near_area,d.email, d.phone1, d.phone2, d.fax ,d.area_id,d.branch_id,pd.name as pdName,branch.name as branch_name, areas.area_name,areas.sales_parson
            FROM `dealer` as d 
            LEFT JOIN dealer as pd on pd.id=d.parent_dealer
            LEFT JOIN branch  on branch.id=d.branch_id
            LEFT JOIN areas  on areas.id=d.area_id
            LEFT JOIN dealertype as dy on dy.id=d.dealertype_id   WHERE d.customer_type=1 AND d.name LIKE '%$dealer_name%' Limit 10 ")->fetchAll();
            echo json_encode($product_id);
            exit();
        }
       
    }

    public function delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->dealer->table('dealer')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }

    public function type_delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->dealer->table('dealertype')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
    public function  DealerNameShow()
    {
        if ($_GET['id']) {
           
            $dealer_name = $this->dealer->table('dealer')->where('id',$_GET['id'])->fetch();
            echo json_encode($dealer_name);
            exit();
           
        }
    }
   
}
