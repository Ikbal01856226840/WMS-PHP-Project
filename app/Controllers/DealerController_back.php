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
    }
    public function create()
    {
        $data = $this->dealer->table('dealertype')->fetchAll();
        $parentid = $this->dealer->table('dealer')->fetchAll();
        // dd($parentid);
        return view('dealer/create', compact('data', 'parentid'));
    }

    public function index()
    {
        $data = $this->dealer->dealer();
        $parentid = $this->dealer->table('dealer')->fetchAll();
        // dd($data);
        $dealertype = $this->dealer->table('dealertype')->fetchAll();
        return view('dealer/index', compact('data', 'dealertype'));
    }

    public function store()
    {
        if ($_POST) {
            $DealerType = $_POST['DealerType'] ?? null;
            $ParentDealer = $_POST['ParentDealer'] ?? null;
            $DealerCode = $_POST['DealerCode'] ?? null;
            $DealerAlise = $_POST['DealerAlias'] ?? null;
            $Dealer_Company_Name = $_POST['Dealer_Company_Name'] ?? null;
            $DealerDetails = $_POST['DealerDetails'] ?? null;
            $Address = $_POST['Address'] ?? null;
            $District = $_POST['District'] ?? null;
            $Email = $_POST['Email'] ?? null;
            $Phone1 = $_POST['Phone1'] ?? null;
            $Phone2 = $_POST['Phone2'] ?? null;
            $Fax = $_POST['Fax'] ?? null;
            $data = [
                'dealertype_id' => $DealerType,
                'user_id'=>session('user_id'),
                'parent_dealer' => $ParentDealer,
                'dealercode' => $DealerCode,
                'dealeralise' => $DealerAlise,
                'name' => $Dealer_Company_Name,
                'dealerdetails' => $DealerDetails,
                'address' => $Address,
                'district' => $District,
                'email' => $Email,
                'Phone1' => $Phone1,
                'Phone1' => $Phone1,
                'Phone2' => $Phone2,
                'fax' => $Fax,
            ];
            // dd($data);
            $data = $this->dealer->table('dealer')->insert($data);
            if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
            else notification(['type' => 'warning', 'message' => 'Created Error']);
        }

        return redirect('dealer/index');
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
            $id= $_POST['id'] ?? null;
            $data = [
                'typename' => $DealerType,
            ];
            if(!empty($id)){
                $rs=$this->dealer->table('dealertype')->where('id',$id)->update($data);
                if(!empty($rs)){
                    echo 1;
                }
            }else{
                $data = $this->dealer->table('dealertype')->insert($data);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('dealer/type/index');
            }
           
        }
        
    }

    public function data()
    {
        $dealer_name =  $_GET['name'];
        $product_id = $this->dealer->query("SELECT d.id, dy.typename,d.dealercode,d.dealeralise,d.name,d.dealerdetails,d.address,d.district, d.email, d.phone1, d.phone2, d.fax ,d.area_id,d.branch_id,pd.name as pdName,branch.name as branch_name, areas.area_name,areas.sales_parson
        FROM `dealer` as d 
        LEFT JOIN dealer as pd on pd.id=d.parent_dealer
        LEFT JOIN branch  on branch.id=d.branch_id
        LEFT JOIN areas  on areas.id=d.area_id
        LEFT JOIN dealertype as dy on dy.id=d.dealertype_id WHERE d.name LIKE'%$dealer_name%'Limit 10")->fetchAll();
     echo json_encode(  $product_id);
     exit();
    }

    public function delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->dealer->table('dealer')->where('id', $id)->delete();
            if(!empty($delete))echo 1;
            else echo 0;
        }
    }

    public function type_delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->dealer->table('dealertype')->where('id', $id)->delete();
            if(!empty($delete))echo 1;
            else echo 0;
        }
    }
}
