<?php

namespace App\Models;

class Offer extends Model
{
   public $_table = 'offer';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
   }

   
}
