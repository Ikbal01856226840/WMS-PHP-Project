<?php

namespace App\Controllers;
use App\Models\Branch;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class AreaController extends Controller
{
    use GenerateList;

    public $area;
    public function __construct()
    {
        parent::__construct();
        $this->area = new Branch();
        if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7||session('user_lavel')==8){
            true;
        }else{
            redirect('auth/login');
        }
    }
    public function create()
    {
        $branchs = $this->area->table('branch')->fetchAll();
        return view('area/create',compact('branchs'));
    }


    public function index()
    {
        if(!empty($_GET['branch_id'])){
            $branch_id=$_GET['branch_id'];
            if($_GET['branch_id']==0){
                $branch="";
            }else{
                $branch="WHERE areas.branch_id='".$_GET['branch_id']."'";
            }
           
        }else{
            $branch="";
            $branch_id="";
        }

        if(session('user_lavel')==2 || session('user_lavel')==8){
            $branchs= $this->area->query("SELECT branch.id, branch.name FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id='".session('user_id')."'")->fetchAll();                               
            $branch_id = $branchs[0]['id'];            
            $data =  $value = $this->area->query("SELECT areas.id,areas.area_name,areas.phone_number,areas.sales_parson,areas.branch_id, branch.name as branch_name FROM areas LEFT JOIN branch ON branch.id=areas.branch_id WHERE areas.branch_id = $branch_id")->fetchAll();
        }else{
            $branchs = $this->area->table('branch')->fetchAll();
            $data =  $value = $this->area->query("SELECT areas.id,areas.area_name,areas.phone_number,areas.sales_parson,areas.branch_id, branch.name as branch_name FROM areas LEFT JOIN branch ON branch.id=areas.branch_id $branch")->fetchAll();
        }

        
        return view('area/index', compact('data','branchs','branch_id'));
    }

    public function store()
    {
        //dd($_POST);
        if (!empty($_POST)) {
            $area_name = $_POST['area_name'] ?? null;
            $branch_id = $_POST['branch_id'] ?? null;
            $sales_parson=$_POST['sales_parson']??NULL;
            $phone_number=$_POST['phone_number']??NULL;
           

            $data = [
                'area_name' =>$area_name,
                'branch_id' => $branch_id,
                'phone_number'=>$phone_number,
                'sales_parson'=>$sales_parson,
            ];
            
            if(!empty($_POST['id'])){
                $update=$this->area->table('areas')->where('id',$_POST['id'])->update($data);
                $value = $this->area->query("SELECT areas.id, areas.area_name,areas.phone_number,areas.sales_parson,areas.branch_id, branch.name as branch_name FROM areas LEFT JOIN branch ON branch.id=areas.branch_id  WHERE areas.id='".$_POST['id']."' ")->fetchAll();
                echo json_encode($value);
            }else{
                $data = $this->area->table('areas')->insert($data);
    
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('area/index');
            }
        }else{
            return redirect('area/index');
        }

        
    }

    public function delete(){
        if($_POST['id']){
            $id=$_POST['id']??null;
            $delete=$this->area->table('areas')->where('id',$id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
    public function AreaNameShow()
    {
        if ($_GET['id']) {
            $areaname = $this->area->query("SELECT areas.*,branch.name FROM areas LEFT JOIN branch ON branch.id=areas.branch_id WHERE areas.id='".$_GET['id']."'")->fetch();
            echo json_encode($areaname );
            exit();
           
        }
    }
}
