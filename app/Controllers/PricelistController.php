<?php
namespace App\Controllers;
use App\Models\Product;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class PricelistController extends Controller {
    use GenerateList;

    public $price;
    public function __construct()
    {
        parent::__construct();
        $this->price = new Product();
        if(session('user_lavel')==1||session('user_lavel')==2||session('user_lavel')==7 ||session('user_lavel')==8){
            true;
        }else{
            redirect('auth/login');
        }
    }

    public function index()
    {
        $stock_id = '';
        $product_id = '';
        $product_price = $this->price->product_price();
        $stock_group=$this->price->table('stock_group')->fetchAll(); 
        $product_type=$this->price->table('product')->fetchAll();

        if(!empty($_GET)){
            $stock_id = $_GET['stock_group'];
            $product_id = $_GET['product_type'];

            $where = '';
            if ($stock_id >0) {
                $where .=" stock_group.id= $stock_id AND";
            }
            if ($product_id >0) {
                $where .=" product_price.product_type=$product_id AND";
            }
            if($where){
                $sql = "SELECT product_price.*, stock_group.id AS grp_id, stock_group.name AS grp_name, product.id AS prd_id, product.name AS prd_name FROM `product_price`
                     LEFT JOIN stock_group ON stock_group.id= product_price.stock_group
                     LEFT JOIN product ON product.id= product_price.product_type
                     WHERE $where";
                $sql =  rtrim($sql,"AND");
                $product_price = $this->price->query($sql)->fetchAll();
            }
        }
        return view('pricelist/index', compact('product_price','stock_group','product_type','stock_id','product_id'));
    }


    public function create()
    {
        $stock_group=$this->price->table('stock_group')->fetchAll();       
        $product_type=$this->price->table('product')->fetchAll();       
        return view('pricelist/create',compact('stock_group','product_type'));
    }

    public function store()
    {
        if(!empty($_POST)){
            $stock_group = $_POST['stock_group']??null;
            $product_type = $_POST['product_type']??null;
            $warranty_period = $_POST['warranty_period']??null;
            $capacity = $_POST['capacity']??null;            
            $plate_pc = $_POST['plate_pc']??null;
            $volt = $_POST['volt']??null;
            $length = $_POST['length']??null;
            $width = $_POST['width']??null;
            $height_wp = $_POST['height_wp']??null;
            $height_op = $_POST['height_op']??null;
            $cca = $_POST['cca']??null;
            $rc = $_POST['rc']??null;
            $d_weight = $_POST['d_weight']??null;
            $w_weight = $_POST['w_weight']??null;
            $electrolyte = $_POST['electrolyte']??null;
            $cc_ips = $_POST['cc_ips']??null;
            $price = $_POST['price']??null;            
            $id=$_POST['id']??null;

            $data=[
                'stock_group' => $stock_group,
                'product_type' => $product_type,
                'warranty_period' => $warranty_period,
                'capacity' => $capacity,
                'plate_pc' => $plate_pc,
                'volt' => $volt,
                'length' => $length,
                'width' => $width,
                'height_wp' => $height_wp,
                'height_op' => $height_op,
                'cca' => $cca,
                'rc' => $rc,
                'd_weight' => $d_weight,
                'w_weight' => $w_weight,
                'electrolyte' => $electrolyte,
                'cc_ips' => $cc_ips,
                'price' => $price
            ];
            // dd($data);
            if(!empty($id)){
                $rs=$this->price->table('product_price')->where('id',$id)->update($data);
                if(!empty($rs)){                    
                    $data=$this->price->product_price($id);
                    echo json_encode($data);
                }else{
                    echo 0;
                }
            }else{
                // dd($data);
                $rs=$this->price->table('product_price')->insert($data);
                if($rs) notification(['type'=>'success', 'message'=>'Insert Successfully']);
                return redirect('pricelist/index');
            }
        }
    }

    public function delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->price->table('product_price')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }





}