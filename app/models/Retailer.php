<?php

namespace App\Models;

class Retailer extends Model
{
   public $_table = 'retailer';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
   }

   public function retailer()
   {
      $sql = "SELECT r.id,r.retaileralise,r.thana,r.name,r.retailer_code,r.retailerdetails,r.address,r.district, r.email,r.dealer_id, r.phone1, r.phone2, r.fax ,dealer.name as dealer_name
      FROM `retailer` as r LEFT JOIN dealer ON dealer.id=r.dealer_id ;";
      $query = $this->pdo->query($sql);
      return $query->fetchAll();
   }

   public function retaileredit($where = null)
   {
      $sql = "SELECT r.id,r.thana,r.retaileralise,r.name,r.retailer_code,r.retailerdetails,r.address,r.district,r.dealer_id, r.email, r.phone1, r.phone2, r.fax ,dealer.name as dealer_name
              FROM `retailer` as r LEFT JOIN dealer ON dealer.id=r.dealer_id  $where";
      $query = $this->pdo->query($sql);
      return $query->fetchAll();
   }
}
