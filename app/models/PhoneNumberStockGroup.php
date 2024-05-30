<?php

namespace App\Models;

class PhoneNumberStockGroup extends Model
{
    public $_table = 'phone_number_stock_group';
    protected $primary = "id";
    protected $pdo;
    public function __construct()
    {
        parent::__construct();
    }

    public function data($where = null)
    {
        $sql = "SELECT sg.id,sg.name,sg.alias,sg.under,sg.qty_add_per,sg.status,stg.name as underName FROM `phone_number_stock_group` AS sg 
      LEFT JOIN phone_number_stock_group AS stg ON stg.id=sg.under $where";
        $query = $this->pdo->query($sql);

        return $query->fetchAll();
    }
}
