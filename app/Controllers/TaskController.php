<?php

namespace App\Controllers;

use App\Models\Task;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class TaskController extends Controller
{
    use GenerateList;

    public $task;
    public function __construct()
    {
        parent::__construct();
        $this->task = new Task();
        if (session('user_lavel') == 1||session('user_lavel') == 4||session('user_lavel') == 8) {
            true;
        } else {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $brand_get = ''; $stock_group_id = ''; $branch_id = ''; $phone_type_get = ''; $tasks=''; $to_date = ''; $from_date = ''; 
        $stocks = $this->task->table('phone_number_stock_group')->fetchAll();

        if( (session('user_lavel')==2) || (session('user_lavel')==8)){
            $branchs= $this->task->query("SELECT branch.id, branch.name FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id='".session('user_id')."'")->fetchAll();
        }else{
            $branchs= $this->task->query("SELECT branch.id, branch.name FROM branch ")->fetchAll();
        }

        $user_level=session('user_lavel');
        $user_id=session('user_id');

        if(!empty($_POST)){
            // dd($_POST);
            $branch_id = $_POST['branch_id'] ?? '';
            $user_lavel = $_POST['user_lavel'] ?? '';
            $user_id = $_POST['user_id'] ?? '';
            $stock_group_id = $_POST['stock_group_id'] ?? '';
            $brand_get = $_POST['brand'] ?? '';            
            $phone_type_get = $_POST['phone_type'] ?? '';
            $from_date = $_POST['from_date'] ?? '';
            $to_date = $_POST['to_date'] ?? '';

            $where = '';

            if ($branch_id !== 'All') {
                $where .=" users.branch_id = $branch_id AND";
            }
            if ($user_id !== 'All') {
                $where .=" phone_entry.user_id = $user_id AND";
            }
            if ($stock_group_id > 0) {
                $where .=" phone_entry.stock_group_id = $stock_group_id AND";
            }
            if ($brand_get > '0') {
                $where .=" phone_entry.brand = '$brand_get' AND";
            }
            if ($phone_type_get > '0') {
                $where .=" phone_entry.phone_type = '$phone_type_get' AND";
            }
            if (isset($from_date) && isset($to_date)) {
                $where .=" phone_entry.phone_entry_date BETWEEN '$from_date' AND '$to_date'";
            }   

            // dd($where);
            $tasks = $this->task->query("SELECT phone_entry.id, phone_entry.phone_type, phone_entry.brand, phone_entry.phone_number, phone_entry.customer_name, phone_entry.phone_entry_date, phone_entry.note as user_name, phone_number_stock_group.name as group_name, phone_entry.location, users.user_name as UserName, phone_number_stock_group.alias FROM phone_entry
                                                LEFT JOIN phone_number_stock_group ON phone_entry.stock_group_id=phone_number_stock_group.id
                                                LEFT JOIN users ON phone_entry.user_id=users.id
                                                WHERE $where ORDER BY phone_entry.id DESC")->fetchAll();
        }

        return view('task/index_phone_number', compact('tasks','brand_get','to_date','from_date','stock_group_id','stocks','branchs','branch_id','user_id','phone_type_get'));        
    }

    // public function index()
    // {
    //     $brand_get = ''; $stock_group_id = ''; $branch_id =''; $phone_type_get ='';
    //     $stocks = $this->task->table('phone_number_stock_group')->fetchAll();
    //     if( (session('user_lavel')==2) || (session('user_lavel')==8)){
    //         $branchs= $this->task->query("SELECT branch.id, branch.name FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id='".session('user_id')."'")->fetchAll();
    //     }else{
    //         $branchs= $this->task->query("SELECT branch.id, branch.name FROM branch ")->fetchAll();
    //     }
    //     $user_lavel=session('user_lavel');
    //     $user_id=session('user_id');
    //     if ($user_lavel == 1) {
    //         if(!empty($_GET)){
    //             $brand_get=$_GET['brand'];
    //             if ($_GET['brand'] == '0' || $_GET['brand'] == ''  ) {
    //                 $brand = " ";
    //             } else if($_GET['brand'] == '1') {
    //                 $brand = " phone_entry.brand='Hamko' AND";
    //             } else if($_GET['brand'] == '2') {
    //                 //dd($_GET['brand']);
    //                $brand = " phone_entry.brand='Others Brand' AND ";
    //             }
    //         }
    //         else{
    //             $brand='' ;
    //         }
    //         if(!empty($_GET)){
    //             $phone_type_get=$_GET['phone_type'];
    //             if ($_GET['phone_type'] == '0' || $_GET['phone_type'] == ''  ) {
    //                 $phone_type = " ";
    //             } else if($_GET['phone_type'] == '1') {
    //                 $phone_type = "phone_entry.phone_type='Owner' AND";
    //             } else if($_GET['phone_type'] == '2') {
    //                 //dd($_GET['brand']);
    //                 $phone_type = " phone_entry.phone_type='User/Driver' AND ";
    //             }
    //         }
    //         else{
    //             $phone_type='' ;
    //         }
    //         if(!empty($_GET['to_date'])){
    //             $to_date = $_GET['to_date'];
    //         }
    //         else{
    //             $to_date =date('Y-m-d') ; 
    //         }
    //         if(!empty($_GET['from_date'])){
    //             $from_date =$_GET['from_date'];
    //         }
    //         else{
    //             $from_date =date('Y-m-d');
    //         }
    //         if(!empty($_GET)){
    //             $stock_group_id=$_GET['stock_group_id'];
    //             if ($_GET['stock_group_id'] == '0' || $_GET['stock_group_id'] == ''   ) {
    //                 $stock_group = " ";
    //             } else  {
    //                 $stock_group = "phone_entry.stock_group_id =' ".$_GET['stock_group_id']."' AND ";
    //             }
               
    //         }
    //         else{
    //             $stock_group='' ;
    //         }
    //         if(!empty($_GET)){
    //             $branch_id=$_GET['branch_id'];
    //             if ($_GET['branch_id'] == 'All' || $_GET['branch_id'] == ''   ) {
    //                 $branch = " ";
    //             } else  {
    //                 $branch = "users.branch_id =' ".$_GET['branch_id']."' AND ";
    //             }
    //         }
    //         else{
    //             $branch='' ;
    //         }
    //         if(!empty($_GET)){
    //             $user_id=$_GET['user_id'];
    //             if ($_GET['user_id'] == 'All' || $_GET['user_id'] == ''|| $_GET['user_id'] == '0'   ) {
    //                 $user = "";
    //             } else  {
    //                 $user = "phone_entry.user_id ='".$_GET['user_id']."' AND ";
    //             }
               
    //         }
    //         else{
    //             $user='' ;

    //         }

    //         $tasks = $this->task->query("SELECT phone_entry.id,phone_entry.phone_type, phone_entry.brand,phone_entry.phone_number,phone_entry.customer_name,phone_entry.phone_entry_date,phone_entry.note as user_name,phone_number_stock_group.name as group_name,phone_entry.location,users.user_name,phone_number_stock_group.alias FROM phone_entry  LEFT JOIN phone_number_stock_group ON phone_entry.stock_group_id=phone_number_stock_group.id LEFT JOIN users ON  phone_entry.user_id=users.id WHERE $brand  $phone_type $stock_group $branch $user phone_entry.phone_entry_date  BETWEEN '$from_date' AND '$to_date' ORDER BY phone_entry.id DESC ")->fetchAll();
            
    //     } else {
    //         if(!empty($_GET)){
    //             $brand_get=$_GET['brand'];
    //             if ($_GET['brand'] == '0' || $_GET['brand'] == ''  ) {
    //                 $brand = " ";
    //             } else if($_GET['brand'] == '1') {
    //                 $brand = " phone_entry.brand='Hamko'AND";
    //             } else if($_GET['brand'] == '2') {
    //                 //dd($_GET['brand']);
    //                $brand = "  phone_entry.brand='Others Brand' AND ";
    //             }
    //         }
    //         else{
    //             $brand='' ;
    //         }
    //         if(!empty($_GET)){
    //             $phone_type_get=$_GET['phone_type'];
    //             if ($_GET['phone_type'] == '0' || $_GET['phone_type'] == ''  ) {
    //                 $phone_type = " ";
    //             } else if($_GET['phone_type'] == '1') {
    //                 $phone_type = " phone_entry.phone_type='Owner' AND";
    //             } else if($_GET['phone_type'] == '2') {
    //                 //dd($_GET['brand']);
    //                 $phone_type = " phone_entry.phone_type='User/Driver' AND ";
    //             }
    //         }
    //         else{
    //             $phone_type='' ;
    //         }
    //         if(!empty($_GET['to_date'])){
    //             $to_date = $_GET['to_date'];
    //         }
    //         else{
    //             $to_date =date('Y-m-d') ; 
    //         }
    //         if(!empty($_GET['from_date'])){
    //             $from_date =$_GET['from_date'];
    //         }
    //         else{
    //             $from_date =date('Y-m-d');
    //         }
    //         if(!empty($_GET)){
    //             $stock_group_id=$_GET['stock_group_id'];
    //             if ($_GET['stock_group_id'] == '0' || $_GET['stock_group_id'] == ''   ) {
    //                 $stock_group = " ";
    //             } else  {
    //                 $stock_group = "phone_entry.stock_group_id =' ".$_GET['stock_group_id']."' AND ";
    //             }
               
    //         }
    //         else{
    //             $stock_group='' ;
    //         }
    //         if(!empty($_GET)){
    //             $branch_id=$_GET['branch_id'];
    //             if ($_GET['branch_id'] == 'All' || $_GET['branch_id'] == ''   ) {
    //                 $branch = " ";
    //             } else  {
    //                 $branch = "users.branch_id =' ".$_GET['branch_id']."' AND ";
    //             }
    //         }
    //         else{
    //             $branch='' ;
    //         }
    //         if(!empty($_GET)){
    //             $user_id=$_GET['user_id'];
    //             if ($_GET['user_id'] == 'All' || $_GET['user_id'] == ''|| $_GET['user_id'] == '0'   ) {
    //                 $user = "";
    //             } else  {
    //                 $user = "phone_entry.user_id ='".$_GET['user_id']."' AND ";
    //             }
               
    //         }
    //         else{
    //             $user='' ;

    //         }
    //         $tasks = $this->task->query("SELECT phone_entry.id,phone_entry.phone_type, phone_entry.brand,phone_entry.phone_number,phone_entry.customer_name,phone_entry.phone_entry_date,phone_entry.note as user_name,phone_number_stock_group.name as group_name,phone_entry.location,users.user_name ,phone_number_stock_group.alias FROM phone_entry  LEFT JOIN phone_number_stock_group ON phone_entry.stock_group_id=phone_number_stock_group.id LEFT JOIN users ON  phone_entry.user_id=users.id WHERE $brand $phone_type $stock_group $branch $user phone_entry.user_id=' $user_id' AND phone_entry.phone_entry_date  BETWEEN '$from_date' AND '$to_date' ORDER BY phone_entry.id DESC ")->fetchAll();
    //     }
    
    //     return view('task/index_phone_number', compact('tasks','brand_get','to_date','from_date','stock_group_id','stocks','branchs','branch_id','user_id','phone_type_get'));
        
    // }

    public function create()
    {
        $stocks = $this->task->table('phone_number_stock_group')->fetchAll();
        //dd($stocks);
        return view('task/add_new_phone_number', compact('stocks'));
    }

    public function store()
    {
        //dd($_POST);
        if (!empty($_POST)) {
            $stock_group_id = $_POST['stock_group_id'] ?? null;
            $brand = $_POST['brand_id'] ?? null;
            $phone_type = $_POST['phone_type'] ?? null;
            $phone_number = $_POST['phone_number'] ?? null;
            $customer_name = $_POST['customer_name'] ?? null;
			$location = $_POST['location'] ?? null;
            $date = $_POST['date'] ?? null;
            $note = $_POST['note'] ?? null;
            $phone_number_unique = [
                'phone_number' => $phone_number
            ];
            $group_unique = [
                'stock_group_id' => $stock_group_id
            ];
            if (!$this->task->table('phone_entry')->where($phone_number_unique)->where($group_unique)->count()) {
                $dat = [
                    'stock_group_id' => $stock_group_id,
                    'brand' => $brand,
                    'phone_type'=>$phone_type,
                    'phone_number' => $phone_number,
                    'customer_name' => $customer_name,
					'location' => $location,
                    'phone_entry_date' => $date,
                    'note' => $note,
                    'user_id' => session('user_id'),
                ];

                $data = $this->task->table('phone_entry')->insert($dat);
                //dd($data);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('phoner_number/view');
            } else {
                notification(['type' => 'warning', 'message' => 'Duplicate Phone Number']);
                return redirect('phoner_number/create');
            }
        }
    }

    public function edit($id)
    {
        $stocks = $this->task->table('phone_number_stock_group')->fetchAll();
        $task = $this->task->table('phone_entry')->where('id', $id)->fetch();
        return view('task/edit_phone_number', compact('task', 'stocks'));
    }

    public function update($id)
    {
        if (!empty($_POST)) {
            $stock_group_id = $_POST['stock_group_id'] ?? null;
            $brand = $_POST['brand_id'] ?? null;
            $phone_type = $_POST['phone_type'] ?? null;
            $phone_number = $_POST['phone_number'] ?? null;
            $customer_name = $_POST['customer_name'] ?? null;
			$location = $_POST['location'] ?? null;
            $date = $_POST['date'] ?? null;
            $note = $_POST['note'] ?? null;
            $phone_number_unique = [
                'phone_number' => $phone_number
            ];
            $group_unique = [
                'stock_group_id' => $stock_group_id
            ];
            $c = $this->task->table('phone_entry')->where($phone_number_unique)->where($group_unique)->count();

            if ($c<2) {
                $data = [
                    'stock_group_id' => $stock_group_id,
                    'brand' => $brand,
                    'phone_type'=>$phone_type,
                    'phone_number' => $phone_number,
                    'customer_name' => $customer_name,
					'location' => $location,
                    'phone_entry_date' => $date,
                    'note' => $note,
                    'user_id' => session('user_id'),
                ];
                $data = $this->task->table('phone_entry')->where('id', $id)->update($data);
                if ($data) notification(['type' => 'success', 'message' => 'Updated Successfully']);
                else notification(['type' => 'warning', 'message' => 'Update Error']);
                return redirect('phoner_number/view');
            } else {
                notification(['type' => 'warning', 'message' => 'Duplicate Phone Number']);
                return redirect('phoner_number/view');
            }
        }
    }

    public function delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->task->table('phone_entry')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
    public function duplicate_number_check()
    {
        $phone_number = $_GET['phone_number'];
        $group_id = $_GET['stock_id'];
        $duplicate_phone_number = $this->task->table('phone_entry')->where('phone_number',  $phone_number)->where('stock_group_id', $group_id)->fetch();
        $data = '0';
        $c = $this->task->table('phone_entry')->where('phone_number', $phone_number)->where('stock_group_id', $group_id)->count();
        if ($c >= 1) {
            $data = $duplicate_phone_number['phone_number'];
            $data = $duplicate_phone_number['stock_group_id'];
        } else {
            $data = '0';
        }
        echo json_encode($data);
        exit();
    }
    public function get_user(){
        $branch_id=$_GET['branch_id'];
        if(session('user_lavel')==4){
            $users= $this->task->query("SELECT users.name,users.id FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id=".session('user_id')."")->fetchAll();
        }else{
            if($branch_id=='All'){
                $users=$this->task->table('users')->where('role_id',4)->fetchAll();
            }else{
                
                $users= $this->task->query("SELECT users.name,users.id FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.role_id=4 AND users.branch_id='".$branch_id."'")->fetchAll();
            }
        }
        
        echo json_encode($users);
        exit();
    }
}
