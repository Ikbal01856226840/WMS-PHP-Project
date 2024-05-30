<?php

namespace App\Controllers;

use App\Models\Branch;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class BranchController extends Controller
{
    use GenerateList;

    public $branch;
    public function __construct()
    {
        parent::__construct();
        $this->branch = new Branch();
        if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7||session('user_lavel')==8){
            true;
        }else{
            redirect('auth/login');
        }
    }
    public function create()
    {

        return view('branch/create');
    }
    public function index()
    {
        $data = $this->branch->table('branch')->fetchAll();
        return view('branch/index', compact('data'));
    }

    public function store()
    {
        //dd($_POST);
        if (!empty($_POST)) {
            $Branchname = $_POST['BranchName'] ?? null;
            $Address = $_POST['Address'] ?? null;
            $Active = $_POST['Active'] ?? null;
            $phone_number_one=$_POST['phone_number_one']??NULL;
            $phone_number_two=$_POST['phone_number_two']??NULL;
            $email=$_POST['email']?? null;

            $data = [
                'name' => $Branchname,
                'address' => $Address,
                'phone_number_one'=>$phone_number_one,
                'phone_number_two'=>$phone_number_two,
                'email'=> $email,
                'status' => $Active
            ];
            
            if(!empty($_POST['id'])){
                $update=$this->branch->table('branch')->where('id',$_POST['id'])->update($data);
                $value = $this->branch->table('branch')->where('id',$_POST['id'])->fetchAll();
                echo json_encode($value);
            }else{
                $data = $this->branch->table('branch')->insert($data);
    
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('branch/index');
            }
        }else{
            return redirect('branch/index');
        }

        
    }

    public function delete(){
        if($_POST['id']){
            $id=$_POST['id']??null;
            $delete=$this->branch->table('branch')->where('id',$id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
    public function BranchNameShow()
    {
        if ($_GET['id']) {
         
            $branch_name = $this->branch->table('branch')->where('id',$_GET['id'])->fetch();
            echo json_encode($branch_name);
            exit();
           
        }
    }
   
}
