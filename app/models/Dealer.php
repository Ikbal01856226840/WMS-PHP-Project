<?php

namespace App\Models;

class Dealer extends Model
{
   public $_table = 'dealer';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
   }

   public function dealer()
   {
      $sql = "SELECT d.id, dy.typename,d.dealercode,d.dealeralise,d.name,d.dealerdetails,d.address,d.district, d.email, d.phone1, d.phone2, d.fax ,d.area_id,pd.name as pdName,branch.name as branch_name, areas.area_name
               FROM `dealer` as d 
               LEFT JOIN dealer as pd on pd.id=d.parent_dealer
               LEFT JOIN branch  on branch.id=d.branch_id
               LEFT JOIN areas  on areas.id=d.area_id
               LEFT JOIN dealertype as dy on dy.id=d.dealertype_id WHERE d.customer_type=1";
      $query = $this->pdo->query($sql);
     
      return $query->fetchAll();
   }

   public function dealeredit($where = null)
   {
      $sql = "SELECT d.id,d.status, dy.typename,d.parent_dealer, d.dealertype_id,d.dealercode,d.dealeralise,d.name,d.dealerdetails,d.address,d.thana,d.district,d.near_area, d.email, d.phone1, d.phone2, d.fax ,d.area_id,pd.name as pdName,branch.id as branch_id,areas.area_name,d.dealer_id
               FROM `dealer` as d 
               LEFT JOIN dealer as pd on pd.id=d.parent_dealer
               LEFT JOIN branch  on branch.id=d.branch_id
               LEFT JOIN areas  on areas.id=d.area_id
               LEFT JOIN dealertype as dy on dy.id=d.dealertype_id $where";
      $query = $this->pdo->query($sql);
      return $query->fetchAll();
   }
}

