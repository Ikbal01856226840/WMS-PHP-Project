<?php
namespace App\Models;

class StockGroup extends Model {
     public $_table = 'stock_group';
     protected $primary = "id";
     protected $pdo;
     public function __construct()
     {
        parent::__construct();
     }

     public function data($where=null){
      $sql="SELECT sg.id,sg.name,sg.stock_group_code,sg.warrantry_period,sg.description,sg.alias,sg.under,sg.qty_add_per,sg.status,stg.name as underName ,sg.brand_name,sg.sales_expire_date FROM `stock_group` AS sg 
      LEFT JOIN stock_group AS stg ON stg.id=sg.under  $where";
      $query = $this->pdo->query($sql);

      return $query->fetchAll(); 
         
     }

}