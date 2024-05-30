<?php

namespace App\Models;

class Branch extends Model
{
   public $_table = 'branch';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
   }
}
