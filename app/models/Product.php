<?php

namespace App\Models;

class Product extends Model
{
   public $_table = 'product';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
   }

   public function products($where = '')
   {

      $sql = "SELECT p.id,p.product_short_name, p.name,p.company, c.name as companyName, p.unit, p.stock_group, p.status, p.warranty, p.batch_no, sg.name as sgname FROM product as p 
              LEFT JOIN stock_group sg ON sg.id = p.stock_group  
              LEFT JOIN company c ON c.id = p.company $where";
      $query = $this->pdo->query($sql);
      return $query->fetchAll();
   }
   public function data($where = null)
   {
      $sql = "SELECT * FROM product $where";
      $query = $this->pdo->query($sql);
      return $query->fetchAll();
   }
   public function product_price($id='')
   {
       $where = '';
       if(!empty($id)){
           $where = "WHERE product_price.id = $id";   
       }        
       $sql = "SELECT product_price.*, stock_group.id AS grp_id, stock_group.name AS grp_name, product.id AS prd_id, product.name AS prd_name FROM `product_price`
                    LEFT JOIN stock_group ON stock_group.id= product_price.stock_group
                    LEFT JOIN product ON product.id= product_price.product_type
                    $where";
       $query = $this->pdo->query($sql);
       return $query->fetchAll();
   }   
}
