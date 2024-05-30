<?php

namespace App\Controllers\Auth;

use App\Models\User;
use Vendor\Valitron\Validator;

class AuthController // extends Controller
{
    private $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->auth = new User();
    }

    /**
     * Display a login page
     *
     * @return view
     */
    public function login()
    {
        $title = "Login";
        return view('auth/login', [], false);
    }
    public function show()
    {
        $service = $_GET['service_id'];
        if (!empty($service)) {

            $service_data = $this->auth->query(" SELECT * FROM service_branch WHERE service_branch.service_center_name LIKE '$service%' OR service_branch.address LIKE '$service%' LIMIT 7")->fetchAll();
            if (!empty($service_data)) {
                $get_service = $service_data;
            } else {
                $get_service = $this->auth->query(" SELECT * FROM service_branch WHERE service_branch.service_center_name LIKE '%$service%' OR service_branch.address LIKE '%$service%' LIMIT 7")->fetchAll();
            }
            $dealer_data = $this->auth->query(" SELECT * FROM dealer WHERE dealer.name LIKE '$service%' OR dealer.address LIKE '$service%'LIMIT 7")->fetchAll();
            if (!empty($dealer_data)) {
                $dealer = $dealer_data;
            } else {
                $dealer = $this->auth->query(" SELECT * FROM dealer WHERE dealer.name LIKE '%$service%' OR dealer.address LIKE '%$service%'LIMIT 7")->fetchAll();
            }

            $retailer_serch = $this->auth->query(" SELECT * FROM retailer WHERE retailer.name LIKE '%$service%' OR retailer.address LIKE '%$service%' LIMIT 7")->fetchAll();
            $mul_array = ['service' => $get_service, 'dealer' => $dealer, 'retailer' => $retailer_serch];
        } else {
            $mul_array = null;
        }

        echo json_encode($mul_array);
        exit();
    }

    /**
     * Login with credentials.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginAuth()
    {

        $inputs = $_POST;
        // dd($inputs);
        $usertype = $_POST['user_type'];
        $v = new Validator($inputs);
        //$v->rule('required', ['user_name', 'password','captcha']);
        $v->rule('alphaNum', 'user_name');
        $v->rule('lengthBetween', 'password', 5, 20);

        if ($v->validate()) {
            $user_data = [
                'user_name' => validation($inputs['user_name'])
            ];
            $user_dat = validation($inputs['user_name']);
            // if($inputs['firstNumber']+$inputs['secondNumber']==$inputs['captcha']){ 
            $user_level = $this->auth->query("SELECT users.*, roles.user_level FROM  users  LEFT JOIN roles ON roles.id=users.role_id WHERE users.user_name='$user_dat'")->fetch();
            $user = $this->auth->table("users")->where($user_data)->fetch();
            $str = $user_level['user_level'];
            // dd(   $str);
            $exploe = explode(" ", $str);

            $branch_id = $user->branch_id;
            $branch = $this->auth->table("branch")->where('id', $branch_id)->fetch();
            if ($user['is_active'] == 1) {
                if ($user) {
                    if (verify_hash(validation($inputs['password']), $user->password)) {
                        $login_data = [
                            'is_logged_in' => true,
                            'user_id' => $user->id,
                            'role_id' => $user->role_id,
                            'user_name' => $user->name,
                            'branch_id' => $user->branch_id,
                            'branch_name' => $branch->name,
                            'user_lavel' => $exploe[0],
                        ];
                        if ($usertype) {
                            session($login_data);
                            return redirect('dealerpage');
                        } else {
                            session($login_data);
                            return redirect('dashboard');
                        }
                    } else {
                        $errors['user_name'] = [
                            '0' => 'Username/Password did not match.'
                        ];
                    }
                } else {
                    $errors['user_name'] = [
                        '0' => 'Username/Password did not match.'
                    ];
                }
            } else {

                $errors['password'] = [
                    '0' => 'Login Failed'
                ];
            }
        } else {
            $errors = $v->errors();
        }

        if ($usertype) {
            session('errors', $errors);
            return redirect('dealerapp');
        } else {
            session('errors', $errors);
            return redirect('auth/login');
        }
    }

    /**
     * Logout from this system
     *
     * @return view
     */
    public function logout()
    {
        if(session('user_lavel')==5 || session('user_lavel')==4){
            session_empty();
            return redirect("dealerapp");
        }else{
        session_empty();
        return redirect("auth/login");
        }
    }
}