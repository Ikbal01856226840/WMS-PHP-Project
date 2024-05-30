<?php

namespace App\Controllers;

use Vendor\Valitron\Validator;
use App\Models\Branch;

class DashbordController extends Controller
{
    public $dashboard;
    public function __construct()
    {
        parent::__construct();
        $this->dashboard = new  Branch();
    }
    public function index()
    {
        $date=date('Y-m-d');
       
       $total_warranty_card =$this->dashboard->table('warranty_card')->count();
	   $warranty_card_two_user_create_by_get= $this->dashboard->query( "SELECT * FROM warranty_card LEFT JOIN users ON warranty_card.user=users.id LIMIT 2" )->fetchAll();
	  // dd($warranty_card_two_user_create_by_get);
       $total_product =$this->dashboard->table('product')->count();
       $total_branch =$this->dashboard->table('branch')->count();
       $service_branch =$this->dashboard->table('service_branch')->count();
       $gruop_item = $this->dashboard->query( "SELECT COUNT(product.id) as product_id, COUNT(warranty_card.id) as total_count_warranty_card, stock_group.name,stock_group.alias,stock_group.under,stock_group.description,stock_group.id 
          FROM stock_group LEFT JOIN product ON stock_group.id=product.stock_group 
          LEFT JOIN warranty_card ON product.id=warranty_card.product_id GROUP BY stock_group.id limit 5")->fetchAll();
       $gruop_todate = $this->dashboard->query(" SELECT COUNT(warranty_card.create_date) as today_date, stock_group.id 
          FROM stock_group LEFT JOIN product ON stock_group.id=product.stock_group 
          LEFT JOIN  warranty_card ON product.id=warranty_card.product_id WHERE warranty_card.create_date='$date'  GROUP BY stock_group.id limit 4")->fetchAll();
       $users =$this->dashboard->table('users')->limit(4)->fetchAll();
       $user_id = session('user_id');
       $roule_id = session('role_id');
       if ($roule_id == 5) {
        // $offers=$this->dashboard->query("SELECT * FROM offer   ORDER BY offer.id DESC")->fetchAll();
        $offers=$this->dashboard->query(
            "SELECT offer.offer_name,
            offer.id,
            offer.offer_message,
            offer.start_date,
            offer.end_date,
            offer.create_date
            FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
            LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
            INNER JOIN users ON dealer.id=users.dealer_id 
            WHERE users.id='$user_id'
            ORDER BY offer.id DESC"
        )->fetchAll();;
        $delear_new_offer = $this->dashboard->query(
            "SELECT offer.offer_name,
            offer.id,
            offer.offer_message,
            offer.start_date,
            offer.end_date,
            offer_file_path.id as offer_file_id ,
            offer_file_path.offer_file ,
            offer_file_path.offer_id,
            dealer.name 
            FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
            LEFT JOIN offer_file_path ON offer.id=offer_file_path.offer_id
            LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
            INNER JOIN users ON dealer.id=users.dealer_id 
            WHERE users.id='$user_id'
            ORDER BY offer.id DESC"
        )->fetchAll();
       }
    
        return view('dashboard/index',compact('service_branch','total_product','total_user','total_branch','gruop_item','users','total_warranty_card','gruop_todate','delear_new_offer','offers'));
    }
    public function user_ratio(){
        $user_ratio= $this->dashboard->query( "SELECT COUNT(users.id) AS ratio,users.name,warranty_card.create_date FROM warranty_card LEFT JOIN users ON warranty_card.user=users.id GROUP BY warranty_card.user " )->fetchAll();
       
        echo json_encode( $user_ratio);
      
    }
    public function item_group(){
        $item_group= $this->dashboard->query( "SELECT COUNT(product.id) AS product_count, stock_group.name FROM stock_group LEFT JOIN product ON stock_group.id=product.stock_group GROUP BY stock_group.id" )->fetchAll();
      
        echo json_encode($item_group);
      
    }
    public function pagination(){
        $limit_per_page = 5;
        $page = isset($_POST['page_no']) ? $_POST['page_no'] : 1;

        $offset = ($page - 1) * $limit_per_page;
        $query=$this->dashboard->query(" SELECT * FROM service_branch LIMIT {$offset},{$limit_per_page}")->fetchAll();
        
        echo json_encode($query);
        exit();
        //"SELECT * FROM page LIMIT {$offset},{$limit_per_page}";
    }
    public function show(){
        $service= $_GET['service_id'] ;
        $get_service=$this->dashboard->query(" SELECT * FROM service_branch WHERE service_branch.name LIKE '%$service%'")->fetchAll();
      
        echo json_encode($get_service);
        exit();
    }
}
