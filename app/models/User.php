<?php

namespace App\Models;

class User extends Model
{
   public $_table = 'users';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
   }

   public function user($where='')
   {
      $sql = "SELECT u.id,u.name,u.user_name,u.is_active,u.role_id,r.user_level,	u.email,u.user_phone,u.address,b.name as branch,r.title,u.created_at ,areas.area_name,d.dealercode  FROM `users` as u LEFT JOIN roles as r on r.id=u.role_id LEFT JOIN branch as b ON b.id=u.branch_id  LEFT JOIN dealer as d on u.dealer_id=d.id   LEFT JOIN areas  on areas.id=d.area_id $where";
     
      $query = $this->pdo->query($sql);
      return $query->fetchAll();
   }
}
