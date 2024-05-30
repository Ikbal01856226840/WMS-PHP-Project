<?php

namespace App\Controllers;

use App\Models\User;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class UserController extends Controller
{
    use GenerateList;

    public $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
        if (session('user_lavel') == 1) {
            true;
        } else {
            redirect('auth/login');
        }
    }

    public function create()
    {
        $userLevel = $this->user->query('SELECT * FROM roles WHERE roles.id!=5 AND roles.id!=6 ')->fetchAll();
        $branch = $this->user->table('branch')->fetchAll();

        return view('user/create', compact('userLevel', 'branch'));
    }
    public function user_access()
    {
        $access_user = $_GET['userLevel_id'];
        if ($access_user == 5) {
            $access_user_id = $this->user->table('offerdealer')->fetchAll();
        } else if ($access_user == 6) {
            $access_user_id = $this->user->table('retailer')->fetchAll();
        }

        echo json_encode($access_user_id);
        exit();
    }

    public function store()
    {
        $inputs = $_POST;

        if (!empty($inputs['id'])) {
            $id = $inputs['id'] ?? null;
            $name = validation($inputs['fullName'] ?? NULL);
            $email = validation($inputs['emailAddress'] ?? NULL);
            $user_name = validation($inputs['userName'] ?? NULL);
            $password = validation($inputs['password'] );
            $role_id = $inputs['userLevel'] ?? NULL;
            $user_phone = $inputs['userPhone'] ?? NULL;
            $branch_id = $inputs['branchName'] ?? NULL;
            $address = $inputs['address'] ?? NULL;
            $is_active=$inputs['is_active'] ?? NULL;
            if (!empty($password)) {
                $user_info = [
                    'name' => $name,
                    'email' => $email,
                    'user_name' => $user_name,
                    'password' => bcrypt($password),
                    'role_id' => $role_id,
                    'is_active'=> $is_active,
                    'user_phone' => $user_phone,
                    'branch_id' => $branch_id,
                    'address' => $address,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $update = $this->user->table('users')->where('id', $id)->update($user_info);
            } else {
                $user_info = [
                    'name' => $name,
                    'email' => $email,
                    'user_name' => $user_name,
                    'role_id' => $role_id,
                    'is_active'=> $is_active,
                    'user_phone' => $user_phone,
                    'branch_id' => $branch_id,
                    'address' => $address,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $update = $this->user->table('users')->where('id', $id)->update($user_info);
            }


            if (!empty($update)) {
                $where = " where u.id=$id";
                $users = $this->user->user($where);
                echo json_encode($users);
            } else echo 0;
        } else {

            $v = new Validator($inputs);
            $v->rule('required', ['fullName', 'userName', 'password']);
            // $v->rule('alphaNum', 'userID');
            $v->rule('lengthBetween', 'password', 5, 20);
            if ($v->validate()) {
                $name = validation($inputs['fullName'] ?? NULL);
                $email = validation($inputs['emailAddress'] ?? NULL);
                $user_name = validation($inputs['userName'] ?? NULL);
                $password = validation($inputs['password'] ?? NULL);
                $role_id = $inputs['userLevel'] ?? NULL;
                $user_access = $inputs['user_access'] ?? NULL;
                $user_phone = $inputs['userPhone'] ?? NULL;
                $branch_id = $inputs['branchName'] ?? NULL;
                $address = $inputs['address'] ?? NULL;
                $is_active=$inputs['is_active'] ?? NULL;
                $user_info = [
                    'user_name' => $user_name
                ];
                if (!$this->user->table('users')->where($user_info)->count()) {
                    $user_info = [
                        'name' => $name,
                        'email' => $email,
                        'user_name' => $user_name,
                        'password' => bcrypt($password),
                        'role_id' => $role_id,
                        'is_active'=> $is_active,
                        'user_access_id' => $user_access,
                        'user_phone' => $user_phone,
                        'branch_id' => $branch_id,
                        'address' => $address,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                    $rs = $this->user->table('users')->insert($user_info, 'prepared');
                    if ($rs) {
                        notification(['type' => 'success', 'message' => 'Created Successfully']);
                    } else {
                        $errors = $rs->errorInfo();
                    }
                } else {

                    notification(['type' => 'warning', 'message' => 'User Already Exists']);
                    $errors = [
                        'user_name' => ['User name is already exists.']
                    ];
                }
            } else {
                $errors = $v->errors();
            }

            $with = [
                'errors' => $errors ?? '',
                'inputs' => $inputs
            ];
            //myLog(json_encode($with));
            return redirect('user/create', ['with' => $with]); //->with($inputs);
        }
    }



    public function index()
    {
        $title = "Users";
       
        $userLevel = $this->user->table('roles')->fetchAll();
        $branch = $this->user->table('branch')->fetchAll();
        $where = " where u.role_id !=5";
        $users = $this->user->user($where);
        return view('user/index', compact('title', 'users', 'userLevel', 'branch'));
    }
    public function dealer()
    {
        $title = "Users";
        if(!empty($_GET['branch_id'])||!empty($_GET['area_id'])){
            if($_GET['branch_id']==0 &&$_GET['area_id']==0){
              $branch_and_area = "";
            }else if($_GET['branch_id']==0){
                $branch_and_area = "WHERE d.area_id='".$_GET['area_id']."' AND u.role_id=5";
               
            }else if($_GET['area_id']==0){
                $branch_and_area = "WHERE d.branch_id='".$_GET['branch_id']."' AND u.role_id=5";
            }else{
                $branch_and_area = "WHERE d.branch_id='".$_GET['branch_id']."' AND d.area_id='".$_GET['area_id']."' AND u.role_id=5";
            }
            $area_id=$_GET['area_id'];
            $branch_id=$_GET['branch_id'];
        }else{
            $branch_and_area = "WHERE u.role_id=5 ";
            $branch_id="";
            $area_id="";
        }
        $branch_area = $this->user->table('areas')->where('branch_id', $branch_id)->fetchAll();
       
        $userLevel = $this->user->table('roles')->fetchAll();
        $branchs = $this->user->table('branch')->fetchAll();
        $users = $this->user->user($branch_and_area);
        return view('user/dealer_index', compact('title', 'users', 'userLevel', 'branchs','branch_id','branch_area','area_id'));
    }
    
    public function delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->user->table('users')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
}
