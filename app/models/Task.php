<?php

namespace App\Models;

class Task extends Model
{
   public $_table = 'phone_entry';
   protected $primary = "id";
   protected $pdo;
   public function __construct()
   {
      parent::__construct();
   }
}
