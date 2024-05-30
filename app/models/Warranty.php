<?php

namespace App\Models;

class Warranty extends Model
{
   public $_table = 'warranty_card';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
   }
   public function warranty()
   {
  
      $sql = "SELECT wc.id, p.name,wc.product_serial,wc.card_no,wc.sales_date,wc.card_end_date,wc.customer_name, wc.customer_address, wc.customer_phone,
      wc.reference, wc.priority, d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name,a.area_name,a.sales_parson
      FROM `warranty_card` as wc 
      LEFT JOIN product as p ON p.id=wc.product_id
      LEFT JOIN stock_group as s ON s.id=wc.product_id  
      LEFT JOIN dealer as d ON d.id=wc.dealer_id 
      LEFT JOIN branch as b on b.id=wc.branch_id
      LEFT JOIN areas as a on a.id=wc.area_id  
   
      LEFT JOIN users as u on wc.user=u.id";
         $query = $this->pdo->query($sql);
         return $query->fetchAll();
   }

   public function dealer_warrantyinfo($where = ' ')
   {
      $sql = "SELECT wc.id,wc.product_id,wc.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,wc.product_serial,wc.card_no,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
      wc.reference, wc.priority,   wc.create_date,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
      FROM `warranty_card` as wc 
      LEFT JOIN product as p ON p.id=wc.product_id 
      LEFT JOIN stock_group as s ON s.id=wc.stock_group_id  
      LEFT JOIN dealer as d ON d.id=wc.dealer_id 
      LEFT JOIN branch as b on b.id=wc.branch_id 
      LEFT JOIN areas as a on a.id=wc.area_id 
      LEFT JOIN users as u on wc.user=u.id WHERE $where";
      $query = $this->pdo->query($sql);
      $data=$query->fetchAll();
      if(!empty($data)){
         return  $data;
      }
   }


   public function warrantyinfo($where = ' ')
   {
      $sql = "SELECT wc.id,wc.product_id,wc.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,wc.product_serial,wc.card_no,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
      wc.reference, wc.priority,   wc.create_date,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
      FROM `warranty_card` as wc 
      LEFT JOIN product as p ON p.id=wc.product_id 
      LEFT JOIN stock_group as s ON s.id=wc.stock_group_id  
      LEFT JOIN dealer as d ON d.id=wc.dealer_id 
      LEFT JOIN branch as b on b.id=wc.branch_id 
      LEFT JOIN areas as a on a.id=wc.area_id 
      LEFT JOIN users as u on wc.user=u.id  $where";
      $query = $this->pdo->query($sql);
      $data=$query->fetchAll();
      if(!empty($data)){
         return  $data;
      }else{
         $whare_data= str_replace("wc","brep",$where);
         $sql = "SELECT brep.id as replacement_id,brep.product_id,brep.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,brep.product_serial,brep.card_no,brep.create_date ,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
         wc.reference, brep.priority, brep.old_ProductSerial as old_product_serial,wp.name as old_product_name,ws.name as old_stock_group_name,   wc.create_date as old_create_date,wc.card_no as old_card_no,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
         FROM  battery_replacement as brep
         LEFT JOIN `warranty_card` as wc ON wc.id=brep.warrant_card_id
         LEFT JOIN product as wp ON wp.id=wc.product_id 
         LEFT JOIN stock_group as ws ON ws.id=wc.stock_group_id
         LEFT JOIN product as p ON p.id=brep.product_id 
         LEFT JOIN stock_group as s ON s.id=brep.stock_group_id  
         LEFT JOIN dealer as d ON d.id=wc.dealer_id 
         LEFT JOIN branch as b on b.id=wc.branch_id 
         LEFT JOIN areas as a on a.id=wc.area_id 
         LEFT JOIN users as u on brep.user_id=u.id
         $whare_data AND brep.old_ProductSerial	 IS NOT NULL";
         $query = $this->pdo->query($sql);
          $old_data=$query->fetchAll();
          if(!empty($old_data)){
             return  $old_data;
          }else{
             $whare_data= str_replace("wc","brep",$where);
             $sql = "SELECT brep.id as replacement_id,brep.product_id,brep.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,brep.product_serial,brep.card_no,brep.create_date ,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
             wc.reference, brep.priority,wc.product_serial as old_product_serial,wp.name as old_product_name,ws.name as old_stock_group_name,   wc.create_date as old_create_date,wc.card_no as old_card_no,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
             FROM  battery_replacement as brep
             LEFT JOIN `warranty_card` as wc ON wc.id=brep.warrant_card_id
             LEFT JOIN product as wp ON wp.id=wc.product_id 
             LEFT JOIN stock_group as ws ON ws.id=wc.stock_group_id
             LEFT JOIN product as p ON p.id=brep.product_id 
             LEFT JOIN stock_group as s ON s.id=brep.stock_group_id  
             LEFT JOIN dealer as d ON d.id=wc.dealer_id 
             LEFT JOIN branch as b on b.id=wc.branch_id 
             LEFT JOIN areas as a on a.id=wc.area_id 
             LEFT JOIN users as u on brep.user_id=u.id
             $whare_data AND brep.old_ProductSerial IS NULL";
             $query = $this->pdo->query($sql);
             return $query->fetchAll();
          }
     
      }
      
   }
}
