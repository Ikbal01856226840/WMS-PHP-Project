<?php
namespace App\Controllers;
use App\Models\StockGroup;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class StockGroupController extends Controller {
    use GenerateList;

    public $user;
    public function __construct()
    {
        parent::__construct();
        $this->group = new StockGroup();
        if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7){
            true;
        }else{
            redirect('auth/login');
        }
    }
    public function create(){
        $data=$this->group->table('stock_group')->fetchAll();
       
        return view('stock_group/create',compact('data'));
    }
    public function index(){
        $data=$this->group->data();
       
       
        return view('stock_group/index',compact('data'));
    }


    public function store(){
      
        if(!empty($_POST)){
            $stockGroup=$_POST['stockGroup']??null;
            $stock_group_code=$_POST['stock_group_code']??null;
            $warrantry_period=$_POST['warrantry_period']??null;
            $sales_expire_date=$_POST['sales_expire_date']??null;
            $alias=$_POST['alias']??null;
            $under=$_POST['under']??null;
            $qtyAdd=$_POST['qtyAdd']??null;
            $description=$_POST['description']??null;
            $id=$_POST['id']??null;
            $data=[
                'name'=>$stockGroup,
                'stock_group_code'=>$stock_group_code,
                'warrantry_period'=>$warrantry_period,
                'sales_expire_date'=>$sales_expire_date,
                'alias'=>$alias,
                'under'=>$under,
                'qty_add_per'=>$qtyAdd,
                'description'=>$description
            ];
            if(!empty($id)){
                $rs=$this->group->table('stock_group')->where('id',$id)->update($data);
                if(!empty($rs)){
                    $where ="WHERE sg.id=$id";
                    $data=$this->group->data($where);
                    echo json_encode($data);
                }else{
                    echo 0;
                }
            }else{
                //dd($data);
                $rs=$this->group->table('stock_group')->insert($data);
                if($rs) notification(['type'=>'success', 'message'=>'Insert Successfully']);
                return redirect('stockGroup/index');
            }
        }
    }

    public function delete(){
        if(!empty($_POST['id'])){
            $id=$_POST['id']??null;
            $delete=$this->group->table('stock_group')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }

    public function duplicate_sgc()
    {
        $sgc = $_GET['stock_group_code'];
        $c = $this->group->table('stock_group')->where('stock_group_code', $sgc)->count();        
        echo json_encode($c);
        exit();
    }
}