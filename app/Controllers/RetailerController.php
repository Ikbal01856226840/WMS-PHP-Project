<?php

namespace App\Controllers;

use App\Models\Retailer;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class RetailerController extends Controller
{
    use GenerateList;

    public $retailer;
    public function __construct()
    {
        parent::__construct();
        $this->retailer = new Retailer();
        if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7){
            true;
        }else{
            redirect('auth/login');
        }
    }
    public function create()
    {
        $data = $this->retailer->table('dealertype')->fetchAll();
        $cid=$this->retailer->query('SELECT * FROM dealer ORDER BY id DESC')->fetch();
        $branchs = $this->retailer->table('branch')->fetchAll();
        $areas = $this->retailer->table('areas')->fetchAll();
        $dealers = $this->retailer->table('dealer')->where('customer_type',1)->fetchAll();

        return view('retailer/create', compact('data', 'dealers','cid','branchs','areas','dealers'));
    }

    public function index()
    {
       
        if(!empty($_GET['branch_id'])||!empty($_GET['area_id'])){
            if($_GET['branch_id']==0 &&$_GET['area_id']==0){
              $branch_and_area = "";
            }else if($_GET['branch_id']==0){
                $branch_and_area = "AND d.area_id='".$_GET['area_id']."'";
               
            }else if($_GET['area_id']==0){
                $branch_and_area ="AND d.branch_id='".$_GET['branch_id']."'";
            }else{
                $branch_and_area ="AND d.branch_id='".$_GET['branch_id']."' AND d.area_id='".$_GET['area_id']."'";
            }
            $area_id=$_GET['area_id'];
            $branch_id=$_GET['branch_id'];
        }else{
            $branch_and_area = "";
            $branch_id="";
            $area_id="";
        }
        $dealers = $this->retailer->table('dealer')->where('customer_type',1)->fetchAll();

        $branch_area = $this->retailer->table('areas')->where('branch_id', $branch_id)->fetchAll();

        $branchs = $this->retailer->table('branch')->fetchAll();
       
        $data = $this->retailer->query("SELECT d.id, dy.typename,d.parent_dealer, d.status,
                                                        d.dealertype_id,d.dealercode,d.dealeralise,d.name,d.dealerdetails,d.address,d.thana,
                                                        d.district,d.near_area, d.email, d.phone1, d.phone2, d.fax ,d.area_id,pd.name as pdName,branch.id 
                                                as branch_id,branch.name as branch_name,areas.area_name
                                                FROM `dealer` as d 
                                                LEFT JOIN dealer as pd on pd.id=d.parent_dealer
                                                LEFT JOIN branch  on branch.id=d.branch_id
                                                LEFT JOIN areas  on areas.id=d.area_id
                                                LEFT JOIN dealertype as dy on dy.id=d.dealertype_id  WHERE d.customer_type=2 $branch_and_area ")->fetchAll();
                                                
        
        $dealertype = $this->retailer->table('dealertype')->fetchAll();
        $cid=$this->retailer->query('SELECT * FROM dealer ORDER BY id DESC')->fetch();
        return view('retailer/index', compact('data', 'dealertype', 'cid','branchs','branch_id','area_id','branch_area','dealers'));
    }

    public function edit()
    {

        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $where = "WHERE r.id = $id";
            $data = $this->retailer->retaileredit($where);
            if (!empty($data)) {
                echo json_encode($data);
            } else echo 0;
        } else {
            return view('retailer/index');
        }
    }

    public function store()
    {

        
        if ($_POST) {
            $id = $_POST['id'] ?? null;
            $dealer_id=$_POST['dealer_id']??null;
            $retailer_type= $_POST['retailer_type'] ?? null;
            $branch_id=$_POST['branch_id']?? NULL;
            $status=$_POST['status'] ?? null;
            $area_id = $_POST['area_id'] ?? null;
            $retailer_code = $_POST['retailer_code'] ?? null;
            $retailer_alias = $_POST['retailer_alias'] ?? null;
            $retailer_name = $_POST['retailer_name'] ?? null;
            $Address = $_POST['Address'] ?? null;
            $thana = $_POST['thana'] ?? null;
            $District = $_POST['District'] ?? null;
            $near_area = $_POST['near_area'] ?? null;
            $Email = $_POST['Email'] ?? null;
            $Phone1 = $_POST['Phone1'] ?? null;
            $Phone2 = $_POST['Phone2'] ?? null;
            $Fax = $_POST['Fax'] ?? null;

            $is_match_dealer_code=$this->retailer->table('dealer')->where('dealercode', $retailer_code)->count();
            if(!empty($is_match_dealer_code) && empty($id)){
                $retailer_code=$this->retailer->query('SELECT  MAX(dealercode) AS dealercode FROM dealer ORDER BY id DESC')->fetch()['dealercode'];
                $retailer_code+=1;
            }else if(!empty($is_match_dealer_code) && !empty($id) && $is_match_dealer_code>1){
                $retailer_code=$this->retailer->query('SELECT  MAX(dealercode) AS dealercode FROM dealer ORDER BY id DESC')->fetch()['dealercode'];
                $retailer_code+=1;
            }
            $data = [
                'id' => $id,
                'dealer_id'=>$dealer_id,
                'customer_type'=>2,
                'dealertype_id' =>$retailer_type,
                'dealercode' =>$retailer_code,
                'dealeralise' => $retailer_alias,
                'name' =>$retailer_name,
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
                $update = $this->retailer->table('dealer')->where('id', $id)->update($data);
                $get_user_id = $this->retailer->table('users')->where('dealer_id',$id)->fetch();
                    if(empty($get_user_id)){
                        $user_info = [
                            'name' => $retailer_name,
                            'email' =>'',
                            'user_name' =>$retailer_code,
                            'password' => bcrypt(123456),
                            'role_id' =>5,
                            'is_active'=>1,
                            'branch_id' => $branch_id,
                            'dealer_id'=> $id,
                            'address' => $Address,
                            'user_phone'=>$Phone1,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ];
                        $user_info = $this->retailer->table('users')->insert( $user_info);
                
                    }else {
                    $user = [
                        'name' => $retailer_name,
                        'email' =>'',
                        'user_name' =>$retailer_code,
                        'branch_id' =>$branch_id,
                        'dealer_id'=>$id,
                        'address'=>$Address,
                        'user_phone'=>$Phone1,
                        'updated_at' =>date('Y-m-d H:i:s'),
                    ];
                
                    $user_info =$this->retailer->table('users')->where('id',$get_user_id['id'])->update($user);
                }
                if (!empty($update)) {
                    notification(['type' => 'success', 'message' => 'Updated Successfully']);
                    echo 1;
                } else echo 0;
            } else {
                $data = $this->retailer->table('dealer')->insert($data);
                $dealer_id=$this->retailer->lastInsertId();
                $user_info = [
                    'name' =>$retailer_name,
                    'email' =>'',
                    'user_name' =>$retailer_code,
                    'password' => bcrypt(123456),
                    'role_id' =>5,
                    'is_active'=>1,
                    'branch_id' => $branch_id,
                    'dealer_id'=> $dealer_id,
                    'address' => $Address,
                    'user_phone'=>$Phone1,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $user_info = $this->retailer->table('users')->insert( $user_info);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('retailer/index');
            }
        }
    }

    public function type_create()
    {

        return view('retailer/type_create');
    }
    public function type_index()
    {
        $data = $this->retailer->table('retailer_type')->fetchAll();
        return view('retailer/type_index', compact('data'));
    }

    public function type_store()
    {

        if ($_POST) {
            $RetailerType = $_POST['RetailerType'] ?? null;
            $id = $_POST['id'] ?? null;
            $data = [
                'typename' =>  $RetailerType,
            ];
            if (!empty($id)) {
                $rs = $this->retailer->table('retailer_type')->where('id', $id)->update($data);
                if (!empty($rs)) {
                    echo 1;
                }
            } else {
                $data = $this->retailer->table('retailer_type')->insert($data);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('retailer/type/index');
            }
        }
    }

    public function data()
    {
        $data = $this->retailer->table('retailer')->fetchAll();
        echo json_encode($data);
    }

    public function delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $retailer = $this->retailer->table('dealer')->where('id', $id)->delete();
            if(!empty($retailer)){
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
            $delete = $this->retailer->table('retailer_type')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
}
