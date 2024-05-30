<?php
namespace App\Controllers\Auth;
use App\Controllers\Controller;
use App\Models\Model;
use App\Models\User;
use Vendor\Valitron\Validator;

class ProfileUpdateController extends Controller
{
   
  
    private $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->auth = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function ShowPasswordChange()
    {
        $title = "Change Password";
        
        return view('auth/password_change',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Form  $request
     * @return View
     */
    public function ChangePassword()
    {
        $inputs = $_POST;
        // dd( $inputs);
        $v = new Validator($inputs);
       
        // $v->rule('required', ['user_name', 'old_password','new_password','confirm_password']);
        //  $v->rule('lengthBetween', ['old_password','new_password','confirm_password'], 8, 20);
         $user_id=session('user_id');
        if($v->validate()) {
            $user_data = [
                'user_name'=>validation($inputs['user_name']),
                'id'=>$user_id,
            ];
                $user = $this->auth->table("users")->where($user_data)->fetch();
                // dd($user);
                
                if ($user) {
                    if (password_verify(validation($inputs['old_password']), $user->password)) {
                        $data = [
                            'password' =>password_hash(validation($inputs['new_password']), PASSWORD_BCRYPT),
                            'user_name' => $inputs['new_user_name'] ?? $user->user_name                           
                        ];
                        $rs=$this->auth->table('users',$user_id)->update($data, 'prepared');
                        // dd($rs->errorInfo());
                        if ($rs) {
                            notification(['type' => 'success','message' => 'Password Change Successfully']);
                            return redirect('auth/logout');
                        } else {
                            $errors = $rs->errorInfo();
                        }
                    }else {
                        $errors['old_password'] = [
                            '0' => 'Password does not match.'
                        ];
                    }
                }else {
                    $errors['user_name'] = [
                        '0' => 'Old User Name does not match.'
                    ];
                }
             
        }
        else {
            $errors = $v->errors();
        }
        $with = [
            'errors' => $errors ?: '',
            'inputs' => $_REQUEST,
        ];
        return redirect('dealerapp/profileupdate', ['with' => $with]);
    }
}