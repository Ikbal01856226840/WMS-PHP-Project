<?php

namespace App\Models;

class OfferDealer extends Model
{
    public $_table = 'offerdealer';
    protected $primary = "id";
    protected $pdo;
    public function __construct()
    {
        parent::__construct();
    }

    public function dealer()
    {
        $sql = "SELECT d.id, d.dealeralise,d.thana,d.name,d.dealerdetails,d.address,d.district, d.email, d.phone1, d.phone2, d.fax ,branch.name as branch_name,d.area
               FROM `offerdealer` as d 
               LEFT JOIN branch  on branch.id=d.branch_id
              ";
        $query = $this->pdo->query($sql);
        return $query->fetchAll();
    }

    public function dealeredit($where = null)
    {
        $sql = "SELECT d.id, d.thana, d.dealeralise,d.name,d.dealerdetails,d.address,d.district, d.email, d.phone1, d.phone2, d.fax ,branch.id as branch_id,d.area
             FROM `offerdealer` as d
             LEFT JOIN branch  on branch.id=d.branch_id
                $where";      
        $query = $this->pdo->query($sql);
        return $query->fetchAll();
    }
}
