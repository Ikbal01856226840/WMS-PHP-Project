<?php

namespace App\Controllers;

use App\Models\Product;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class ProductController extends Controller
{
    use GenerateList;

    public $product;
    public function __construct()
    {
        parent::__construct();
        $this->product = new Product();
        if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7){
            true;
        }else{
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data = $this->product->products();
        $warranty_period = $this->product->table('warranty_period')->fetchAll();
        $stockGroup = $this->product->table('stock_group')->fetchAll();
        $company = $this->product->table('company')->fetchAll();
        return view('product/index', compact('data', 'stockGroup', 'company', 'warranty_period'));
    }

    public function create()
    {
        $stock_select=session('stock_id');
        $get_compant=session('get_company');
        $get_units=session('units');
        $warranty_period = $this->product->table('warranty_period')->fetchAll();
        $data = $this->product->table('stock_group')->fetchAll();
        $company = $this->product->table('company')->fetchAll();
        return view('product/create', compact('data', 'company', 'warranty_period','stock_select','get_compant','get_units'));
    }
    public function duplicate_product_name(){
        $product_name = $_GET['product_name'];
        $duplicate_product_name = $this->product->table('product')->where('name',  $product_name)->fetch();
        $data = '0';
        $c = $this->product->table('product')->where('name',$product_name)->count();
        if ($c>=1) {
            $data =  $duplicate_product_name['name'];
        } else {
            $data = '0';
        }
        
        echo json_encode($data);
        exit(); 
    }
    public function duplicate_product_id(){
        $product_name = $_GET['product_id'];
        $duplicate_product_name = $this->product->table('product')->where('prd_id',  $product_name)->fetch();
        $data = '0';
        $c = $this->product->table('product')->where('prd_id',$product_name)->count();
        if ($c>=1) {
            $data =  $duplicate_product_name['prd_id'];
        } else {
            $data = '0';
        }
        
        echo json_encode($data);
        exit(); 
    }

    public function duplicate_batch_no(){
        $batch_no = $_GET['batch_no'];
        $c = $this->product->table('product')->where('batch_no', $batch_no)->count();        
        echo json_encode($c);
        exit();      
    }

    public function store()
    {
        $store_data = [
            'get_company' =>$_POST['company']?? null,
            'units'=> $_POST['units'],
        ];
           
        session($store_data);
        if ($_POST) {
            $name = $_POST['name'] ?? null;
            $company = $_POST['company'] ?? null;
            $units = $_POST['units'] ?? null;
            $warranty = $_POST['warranty'] ?? null;
            $BatchNo = $_POST['BatchNo'] ?? null;
            $id = $_POST['id'] ?? null;
            $data = [
                'name' =>$name,
                'company' => $company,
                'unit' => $units,
                'warranty' => $warranty,
                'batch_no' => $BatchNo
            ];
            if (!empty($id)) {
                $data = $this->product->table('product')->where('id', $id)->update($data);
                if (!empty($data)) {
                    $where = "where p.id=$id";
                    $data = $this->product->products($where);
                    echo json_encode($data);
                } else echo 0;
            } else {
                $data = $this->product->table('product')->insert($data);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('product/index');
            }
        }
    }


    public function data()
    {

        if (!empty($_POST['id'])) {
            $id = $_POST['id'] ?? null;
            if (!empty($id)) {
                $where = " where id =" . $id;
                $data = $this->product->data($where);
                echo json_encode($data);
            }
        } else {
            $data = $this->product->data();
            echo json_encode($data);
        }
    }

    public function delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->product->table('product')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }

    public function warranty_period_create()
    {
        
        $branchs = $this->product->table('branch')->fetchAll();
        return view('product/warranty_period_create',compact('branchs'));
    }

    public function warranty_period_store()
    {
        if (!empty($_POST['id'])) {
            $data = [
                'value' => $_POST['value'] ?? null,
                'code' => $_POST['code'] ?? null,
                'note' => $_POST['note'] ?? null,
            ];
           
            $rs = $this->product->table('warranty_period')->where('id', $_POST['id'] ?? null)->update($data);
            if (!empty($rs)) {
                $product_data= $this->product->query('SELECT  warranty_period.id, warranty_period.value,warranty_period.code,warranty_period.brand_name FROM  warranty_period  WHERE warranty_period.id="'.$_POST['id'].'"')->fetchAll();
                 echo json_encode($product_data);
             }
             else{
                 echo 0;
             } 
        } else {
            $data = [
                'value' => $_POST['value'] ?? null,
                'code' => $_POST['code'] ?? null,
                'note' => $_POST['note'] ?? null,
            ];
            $rs = $this->product->table('warranty_period')->insert($data);
            return redirect('product/warranty/period');
        }
    }
    public function warranty_period()
    {
        $data = $this->product->query('SELECT  warranty_period.id, warranty_period.value,warranty_period.code,warranty_period.note,warranty_period.brand_name FROM  warranty_period ')->fetchAll();
        $branchs = $this->product->table('branch')->fetchAll();
        return view('product/warranty_period', compact('data','branchs'));
    }

    public function warranty_delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->product->table('warranty_period')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
}
