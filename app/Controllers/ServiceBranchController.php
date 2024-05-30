<?php

namespace App\Controllers;

use App\Models\Branch;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class ServiceBranchController extends Controller
{
    use GenerateList;

    public $branch;
    public function __construct()
    {
        parent::__construct();
        $this->branch = new Branch();
        if(session('user_lavel')==1){
            true;
        }else{
            redirect('auth/login');
        }
    }
    public function create()
    {
        $branchs = $this->branch->table('branch')->fetchAll();
        return view('service/create_branch',compact('branchs'));
    }
    public function index()
    {
        $branchs = $this->branch->table('branch')->fetchAll();
        $data = $this->branch->query("SELECT service_branch.service_center_name,service_branch.id,service_branch.status,service_branch.address,service_branch.thana,service_branch.District,service_branch.near_area,service_branch.email,service_branch.Phone1,service_branch.Fax,branch.name FROM service_branch LEFT JOIN branch ON service_branch.branch_id=branch.id ")->fetchAll();
        return view('service/index_branch', compact('data','branchs'));
    }

    public function store()
    {
        if (!empty($_POST)) {
                $id = $_POST['id'] ?? null;
                $service_center_name= $_POST['service_center_name'] ?? null;
                $branch_id=$_POST['branch_id']?? NULL;

                $Active = $_POST['Active'] ?? null;
                $Address = $_POST['Address'] ?? null;
                $thana = $_POST['thana'] ?? null;
                $District = $_POST['District'] ?? null;
                $near_area = $_POST['near_area'] ?? null;
                $Email = $_POST['Email'] ?? null;
                $Phone1 = $_POST['Phone1'] ?? null;
                $Phone2 = $_POST['Phone2'] ?? null;
                $Fax = $_POST['Fax'] ?? null;
                $data = [
                    'id' => $id,
                    'service_center_name'=>$service_center_name,
                    'branch_id'=>$branch_id,
                    'status' => $Active,
                    'address' => $Address,
                    'thana' =>  $thana,
                    'district' => $District,
                    'near_area' =>$near_area,
                    'email' => $Email,
                    'Phone1' => $Phone1,
                    'Phone2' => $Phone2,
                    'fax' => $Fax,
                ];

            if(!empty($_POST['id'])){
                $update=$this->branch->table('service_branch')->where('id',$_POST['id'])->update($data);
                $value= $this->branch->query("SELECT service_branch.service_center_name,service_branch.id,service_branch.status,service_branch.address,service_branch.thana,service_branch.District,service_branch.near_area,service_branch.email,service_branch.Phone1,service_branch.Fax,branch.name FROM service_branch LEFT JOIN branch ON service_branch.branch_id=branch.id WHERE service_branch.id='".$_POST['id']."' ")->fetchAll();
                echo json_encode($value);
            }else{
                $data = $this->branch->table('service_branch')->insert($data);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('service/branch/index');
            }
        }else{
            return redirect('service/branch/index');
        }

        
    }

    public function delete(){
        if($_POST['id']){
            $id=$_POST['id']??null;
            $delete=$this->branch->table('service_branch')->where('id',$id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
    public function image_index(){
        
        $images= $this->branch->table('service_center_image')->orderBy('id','DESC')->fetchAll();
      
        return view('service/image_index',compact('images'));
    }
    public function image_create(){
      
        return view('service/image_create');
    }

     public function image_save(){     
        if ($_POST) { 
            $image_name= $_POST['image_name'] ?? null;
            $description = $_POST['description'] ?? null;
            $status = $_POST['image_active'] ?? null;
            $start_date = $_POST['start_date'] ?? null;
            $end_date = $_POST['end_date'] ?? null;
            $id = $_POST['id'] ?? null;
            $image = isset($_FILES['image']) ? $_FILES['image'] : '';
            if (!empty($image)) {     
                if ($_FILES['image']['type'] == 'application/pdf' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/jpeg') {
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];
                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                    $uploaded_image = "public/assets/uploads/" . $unique_image;
                    $upload = "uploads/" . $unique_image;
                    move_uploaded_file($file_temp, $uploaded_image);
                } else {
                    notification(['type' => 'danger', 'message' => 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.']);
                    redirect('service/center/image/create');
                    exit;
                }
            }
            if(!empty($id)){
                $update=[
                    'image_name'=>$image_name,
                    'start_date'=>$start_date,
                    'end_date'=>$end_date,
                    'image'=> $upload,
                    'image_active'=>$status,
                    'description'=>$description
                ];
            $update_image=$this->branch->table('service_center_image')->where('id', $id)->update($update);
                if ($update_image) {               
                    notification(['type' => 'success', 'message' => 'Update Successfully']);
                    echo json_encode($update_image);
                }
                else{
                    notification(['type' => 'warning', 'message' => 'Created Error']);
                }
            }else{
                $data=[
                'image_name'=>$image_name,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
                'image'=> $upload,
                'image_active'=>$status,
                'description'=>$description
                ];
                $create_image=$this->branch->table('service_center_image')->insert($data);
                if ($create_image) {
                    notification(['type' => 'success', 'message' => 'Created Successfully']);
                    return redirect('service/center/image/index');
                }           
            }
           
        }        
    }
    
    public function image_delete()
    {
        if ($_POST['id']) {

            $id = $_POST['id'] ?? null;
            $data = $this->branch->table('service_center_image')->where('id', $id)->fetch();

         
                if (!$data['image'] == null) {
                    unlink('public/assets/' .$data['image']);
                }else{

                }
            $service_center_image = $this->branch->table('service_center_image')->where('id', $id)->delete();
            if (!empty($service_center_image)) {
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            } else echo 0;
        }
    }
    public function article_create(){
        return view('service/create_article');
    }
    public function article_store(){
        if (!empty($_POST)) {
            $id = $_POST['id'] ?? null;
            $article_details=$_POST['article_details'] ?? null;
            $status=$_POST['status'] ?? null;
            $data = [
                'id' => $id,
                'article_details'=>$article_details,
                'status'=>$status,
                
            ];
            if(!empty($_POST['id'])){
                $update=$this->branch->table('article')->where('id',$_POST['id'])->update($data);
                $value= $this->branch->query("SELECT * FROM article  WHERE id='".$_POST['id']."' ")->fetchAll();
                echo json_encode($value);
            }else{
                $data = $this->branch->table('article')->insert($data);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('service/article/index');
            }
        }else{
            return redirect('service/article/index');
        }
    }
    public function article_index(){
       $data= $this->branch->query("SELECT * FROM article")->fetchAll();
       return view('service/index_article',compact('data'));
    }
    public function  article_delete(){
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->branch->table('article')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
        
     }
    

}
