<?php

namespace App\Controllers;

use App\Models\Dealer;
use App\Traits\GenerateList;

class ProductListSerialController extends Controller
{
    use GenerateList;

    public $dealer;
    public function __construct()
    {
        parent::__construct();
        $this->dealer = new Dealer();
        if (session('user_lavel') == 1 || session('user_lavel') == 2 || session('user_lavel') == 7) {
            true;
        } else {
            redirect('auth/login');
        }
    }

    public function index(){
        $data = $this->dealer->query("SELECT tran_master.id,
                                            tran_master.invoice,
                                            tran_master.invoice_date,
                                            dealer.name 
                                    FROM tran_master 
                                    LEFT JOIN dealer 
                                    ON tran_master.dealer_id=dealer.id "
                                    )->fetchAll();

       return view('product_list_serial/index',compact('data'));
    }
    public function create()
    {
        $dealers = $this->dealer->table('dealer')->fetchAll();
        
        $invoice=$this->dealer->query('SELECT  MAX(id) AS id FROM tran_master ORDER BY id DESC')->fetch()['id'];
        return view('product_list_serial/create',compact('dealers','invoice'));
    }

    public function store(){

        $product_serial_id=$_POST['productSerial_id'];
        $product_id=$_POST['product_id'];
        $stock_group_id=$_POST['stock_group_id'];
        $remark=$_POST['remark'];

        $is_match_invoice_code=$this->dealer->table('tran_master')->where('id', $_POST['invoice'])->count();
        if(!empty($is_match_invoice_code) && $is_match_invoice_code>1){
            $invoice=$this->dealer->query('SELECT  MAX(id) AS id FROM tran_master ORDER BY id DESC')->fetch()['id'];
            $invoice+=1;
        }else{
            $invoice=$_POST['invoice'];
        }

        $data_tran = [
            'invoice'=>$invoice,
            'narration' =>$_POST['narration'],
            'invoice_date' => $_POST['invoice_date'],
            'retailer_id'=> $_POST['retailer_id']??'',
            'dealer_id'=>$_POST['dealer_id']
         ];

          $this->dealer->table('tran_master')->insert($data_tran);

          $transaction_master_id= $this->dealer->lastInsertId();
        
        $data[]=[];
        for($i=0;$i<count($product_serial_id);$i++)
        {
            if(!empty($product_serial_id[$i])){
                $data[$i]=[
                    'tran_id'=>$transaction_master_id,
                    'product_serial_id'=>$product_serial_id[$i],
                    'product_id'=>$product_id[$i],
                    'stock_group_id'=>$stock_group_id[$i],
                    'remark'=>$remark[$i]??''
                ];
            }
        }

        for($i=0;$i<count($product_serial_id);$i++){
            if(!empty($product_serial_id[$i])){
                
               $product_serial= $this->dealer->table('product_serial_in')->insert($data[$i]);
            }
        }
        if($product_serial){
            notification(['type'=>'success', 'message'=>'Sales Insert Successfully']);
        }
        else {
            notification(['type' => 'warning', 'message' => 'Created Error']);
        }
       return  redirect('product/list/serial/create');
    }

    public function delete(){
        if($_POST['id']) {  
            $this->dealer->table("tran_master",$_POST['id'])->delete();
            $product_serial_delete=$this->dealer->query("DELETE FROM product_serial_in WHERE product_serial_in.tran_id='".$_POST['id']."'");
            if($product_serial_delete) {
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else {
                 echo 0;
            }
        }
    }

    public function edit($id){
       
        $data=$this->dealer->table("tran_master")->where('id',$id)->fetch();
        $dealers = $this->dealer->table('dealer')->fetchAll();
        return view('product_list_serial/edit',compact('dealers','data'));
    }

    public function productSerialInEdit(){
        $data = $this->dealer->query("SELECT product_serial_in.id,
                                                    product_serial_in.product_serial_id,
                                                    product_serial_in.stock_group_id,
                                                    product_serial_in.product_id,
                                                    product_serial_in.remark,
                                                    stock_group.name AS stock_group_name,
                                                    product.name     AS  product_name
                                            FROM product_serial_in 
                                            LEFT JOIN stock_group 
                                            ON product_serial_in.stock_group_id=stock_group.id 
                                            LEFT JOIN product 
                                            ON product_serial_in.product_id=product.id 
                                            WHERE  product_serial_in.tran_id='".$_GET['tran_id']."'
                                            "
                                            )->fetchAll();
       
        echo json_encode($data); exit;
       
    }

    public function update($id){
        
        $product_serial_id=$_POST['productSerial_id'];
        $product_id=$_POST['product_id'];
        $stock_group_id=$_POST['stock_group_id'];
        $remark=$_POST['remark'];
        $product_serial_in_id=$_POST['product_serial_in_id'];
        $data_tran = [
            'invoice'=>$_POST['invoice'],
            'narration' =>$_POST['narration'],
            'invoice_date' => $_POST['invoice_date'],
            'retailer_id'=> $_POST['retailer_id']??'',
            'dealer_id'=>$_POST['dealer_id']
         ];

          $this->dealer->table('tran_master',$id)->update($data_tran, 'prepared');
        
        $data[]=[];
        for($i=0;$i<count($product_serial_id);$i++)
        {
            if(!empty($product_serial_id[$i])){
                $data[$i]=[
                    'tran_id'=>$id,
                    'product_serial_id'=>$product_serial_id[$i],
                    'product_id'=>$product_id[$i],
                    'stock_group_id'=>$stock_group_id[$i],
                    'remark'=>$remark[$i]??'',
                    'id'=>$product_serial_in_id[$i],
                ];
            }
        }

        for($i=0;$i<count($product_serial_id);$i++){
            if(!empty($product_serial_id[$i])){
                if(!empty($data[$i]['id'])){
                    $product_serial= $this->dealer->table('product_serial_in',$data[$i]['id'])->update($data[$i], 'prepared');
                }else{
                    $product_serial= $this->dealer->table('product_serial_in')->insert($data[$i]);
                }
               
            }
        }
        
        if (! empty($_POST['product_serial_in_id_arr'])) {
            $delete_stock_in = explode(',', $_POST['product_serial_in_id_arr']);
            for ($i = 0; $i < count(array_filter($delete_stock_in)); $i++) {
                $stock_delete = $this->dealer->table("product_serial_in",$delete_stock_in[$i])->delete();
            }
        }

        if($product_serial){
            notification(['type'=>'success', 'message'=>'Sales Update Successfully']);
        }
        else {
            notification(['type' => 'warning', 'message' => 'Update Error']);
        }
        return  redirect('product/list/serial/index');
    }
    public function productSerialReportShow(){
        $dealers = $this->dealer->table('dealer')->fetchAll();
        $stock_items = $this->dealer->table('product')->fetchAll();
        return view('product_list_serial/product_list_report',compact('dealers','stock_items'));

    }
    public function productSerialReport(){

        $dealers = $this->dealer->table('dealer')->fetchAll();
      
        $stock_items = $this->dealer->table('product')->fetchAll();
        $dealer =$_GET['dealer_id']==0?'':"dealer.id='".$_GET['dealer_id']."' AND";
        $stock_item =$_GET['stock_item_id']==0?'':"product.id='".$_GET['stock_item_id']."' AND";
        if(!empty($_GET['to_date'])){
            $to_date = $_GET['to_date'];
        }
       
        if(!empty($_GET['from_date'])){
            $from_date =$_GET['from_date'];
        }
       $dealer_id=$_GET['dealer_id'];
       $stock_item_id=$_GET['stock_item_id'];

        
               $data = $this->dealer->query("SELECT tran_master.invoice,
                                                    tran_master.invoice_date,
                                                    dealer.name, 
                                                    product_serial_in.product_serial_id,
                                                    stock_group.name AS stock_group_name,
                                                    product.name     AS  product_name
                                            FROM tran_master  
                                            LEFT JOIN product_serial_in 
                                            ON tran_master.id=product_serial_in.tran_id
                                            LEFT JOIN dealer 
                                            ON tran_master.dealer_id=dealer.id
                                            LEFT JOIN stock_group 
                                            ON product_serial_in.stock_group_id=stock_group.id 
                                            LEFT JOIN product 
                                            ON product_serial_in.product_id=product.id 
                                            WHERE $dealer $stock_item tran_master.invoice_date BETWEEN '$from_date' AND '$to_date' 
                                            "
                                            )->fetchAll();

                return view('product_list_serial/product_list_report',compact('dealers','data','from_date','to_date','dealer_id','stock_items','stock_item_id'));
    }

    public function duplicate_serial_id()
    {
        $serial_id = $_GET['serial_id'];

        $c = $this->dealer->table('product_serial_in')->where('product_serial_id', $serial_id)->count();

        echo json_encode($c);
        exit();
    }
}
