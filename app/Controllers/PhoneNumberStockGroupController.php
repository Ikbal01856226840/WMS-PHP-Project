<?php
namespace App\Controllers;
use App\Models\PhoneNumberStockGroup;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class PhoneNumberStockGroupController extends Controller {
    use GenerateList;

    public $user;
    public function __construct()
    {
        parent::__construct();
        $this->group = new PhoneNumberStockGroup();
        if(session('user_lavel')==1){
            true;
        }else{
            redirect('auth/login');
        }
    }
    public function create(){

        $data=$this->group->table('phone_number_stock_group')->fetchAll();
        return view('phone_number_stock_group/create',compact('data'));
    }
    public function index(){
        $data=$this->group->data();
        return view('phone_number_stock_group/index',compact('data'));
    }


    public function store(){

        if(!empty($_POST)){
            $stockGroup=$_POST['stockGroup']??null;
            $alias=$_POST['alias']??null;
            $under=$_POST['under']??null;
            $qtyAdd=$_POST['qtyAdd']??null;
            $id=$_POST['id']??null;
            $data=[
                'name'=>$stockGroup,
                'alias'=>$alias,
                'under'=>$under,
                'qty_add_per'=>$qtyAdd
            ];
            if(!empty($id)){
                $rs=$this->group->table('phone_number_stock_group')->where('id',$id)->update($data);
                if(!empty($rs)){
                    $where ="WHERE sg.id=$id";
                    $data=$this->group->data($where);
                    echo json_encode($data);
                }else{
                    echo 0;
                }
            }else{
                $rs=$this->group->table('phone_number_stock_group')->insert($data);
                if($rs) notification(['type'=>'success', 'message'=>'Insert Successfully']);
                return redirect('phone_number/stock/index');
            }
            

        }

    
    }

    public function delete(){
        if(!empty($_POST['id'])){
            $id=$_POST['id']??null;
            $delete=$this->group->table('phone_number_stock_group')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
}