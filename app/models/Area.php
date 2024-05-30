<?php

namespace App\Models;

class Area extends Model
{
   public $_table = 'area';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
   }
}