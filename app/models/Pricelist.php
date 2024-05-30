<?php

namespace App\Models;

class Pricelist extends Model
{
   public $_table = 'pricelist';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
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
