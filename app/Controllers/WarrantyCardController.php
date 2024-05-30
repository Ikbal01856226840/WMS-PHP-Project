<?php

namespace App\Controllers;

use App\Models\Warranty;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class WarrantyCardController extends Controller
{
    use GenerateList;

    public $Warranty;
    public function __construct()
    {
        parent::__construct();
        $this->warranty = new Warranty();
        if (session('user_lavel') == 1 || session('user_lavel') == 2 || session('user_lavel') == 3 || session('user_lavel') == 7 || session('user_lavel') == 8) {
            true;
        } else {
            redirect('auth/login');
        }
    }
    public function create()
    {

        return view('warrentyCard/create');
    }
    public function index()
    {
        $data = $this->warranty->warrantyinfo();
        return view('warrentyCard/warranty_index', compact('data'));
    }
    
    public function mf_date()
    {         
        return view('warrentyCard/mf_date');
    }

    public function manufacture_date($mf_date) 
    {
        $year = [            
            'Z' => '2022',
            'Y' => '2023',
            'X' => '2024',
            'W' => '2025',
            'V' => '2026',
            'U' => '2027',
            'T' => '2028',
            'S' => '2029',
            'R' => '2030',
            'Q' => '2031',
            'P' => '2032',
            'O' => '2033'
        ];
        $month = [            
            'C' => '01',
            'D' => '02',
            'E' => '03',
            'F' => '04',
            'G' => '05',
            'H' => '06',
            'I' => '07',
            'J' => '08',
            'K' => '09',
            'L' => '10',
            'M' => '11',
            'N' => '12'
        ];
        $date = [            
            'B' => '0',
            'C' => '1',
            'D' => '2',
            'E' => '3',
            'F' => '4',
            'G' => '5',
            'H' => '6',
            'I' => '7',
            'J' => '8',
            'K' => '9'
        ];
        $s = $mf_date;
        for ($i=2; $i<=strlen($s); $i++){
            if (ctype_alpha($s[$i].$s[$i+1].$s[$i+2].$s[$i+3])){
                return $date[$s[$i+2]].$date[$s[$i+3]].'/'.$month[$s[$i+1]].'/'.$year[$s[$i]];
            }
        }
    }

    public function get_serial(){        
        $serial_id=$_GET['serial_id'];
        // dd($serial_id);
        $str3=substr($serial_id, 0, 3);
        // dd(ctype_alpha($str3));
        if(ctype_alpha($str3)){
            $str1=substr($serial_id, 2, 2);
            $str2=substr($serial_id, 0, 2);
            $serial=$this->warranty->query("SELECT product.id, product.name FROM product  WHERE product.batch_no='".$str1."'")->fetch();
            $warranty_time=$this->warranty->table('stock_group')->where('stock_group_code',$str2)->fetch();
            $month=$warranty_time['warrantry_period'];
            if(!empty($month)){
            $date = date("d-m-Y", strtotime(" +$month months"));
            }else{
                $date = date("d-m-Y");
            }
            $mul_array=['date'=>$date,'interger'=>$serial,'month'=>$month,'stock_group'=>$warranty_time];
            echo json_encode($mul_array);
        }else{
            $str_len=substr($serial_id, 0, 1);
            $str_len_1=substr($serial_id, 0,2);
            if(ctype_alpha($str_len_1)){
                $string=$str_len_1;
                
            }else if(ctype_alpha($str_len)){
                $string= $str_len;
            }
            $number=substr($serial_id, 1, 2);
            $number1=substr($serial_id, 2, 2);
            if(is_numeric($number)){
            $two_number= $number;
            }
            else if(is_numeric($number1)){
            $two_number= $number1;
            }
            // dd($two_number);
            if(!empty($serial_id)){
                $mf_date = $this->manufacture_date($serial_id);
                $serial=$this->warranty->table('product')->where('batch_no', $two_number)->fetch();
                $warranty_time=$this->warranty->table('stock_group')->where('stock_group_code', $string)->fetch();
                $month=$warranty_time['warrantry_period']; 
                if(!empty($month)){                        
                    $date = date("d-m-Y", strtotime("+$month months"));
                }else{
                    $date = date("d-m-Y");
                }                    
            }else{
                $serial=null; 
                $date=null;
                $warranty_time=null;
            }
            $mul_array=['date'=>$date,'interger'=>$serial,'month'=>$month,'stock_group'=>$warranty_time, 'mf_date'=>$mf_date ];
            echo json_encode($mul_array);
        }
    }

    public function store()
    {

        if ($_POST) {
            $name = $_POST['name'] ?? null;
            $name1 = explode('-', $name);
            if (!empty($_POST['product_id'])) {
                $id = $_POST['product_id'];
            } else {
                $id = $name1[0];
            }

            $DealerName = $_POST['DealerName'] ?? null;
            $DealerName1 = explode('-', $DealerName);
            $dealerid = $DealerName1[0];
            if ((date("Y-m-d", strtotime($_POST['SalesDate'])) == '1970-01-01') || (date("Y-m-d", strtotime($_POST['CardEndDate'])) == '1970-01-01')) {
                notification(['type' => 'danger', 'message' => 'Invalited Date Formet']);
                $data = 0;
            } else {
                $data = [
                    'product_id' => $id ?? null,
                    'stock_group_id' => $_POST['stock_group_id'] ?? null,
                    'product_serial' =>strtoupper($_POST['ProductSerial']) ?? null,
                    'card_no' => $_POST['CardNo'] ?? null,
                    'sales_date' => date("Y-m-d", strtotime($_POST['SalesDate'])) ?? null,
                    'card_end_date' => date("Y-m-d", strtotime($_POST['CardEndDate'])) ?? null,
                    'dealer_id' => $_POST['dealer_id']  ?? null,
                    'branch_id' => $_POST['branch_id'] ?? null,
                    'area_id' => $_POST['area_id'] ?? null,
                    'sales_office' => $_POST['SalesOffice'] ?? null,
                    'sales_person' => $_POST['SalesPerson'] ?? null,
                    'customer_name' => $_POST['CustomerName'] ?? null,
                    'customer_address' => $_POST['CustomerAddress'] ?? null,
                    'customer_phone' => $_POST['CustomerPhone'] ?? null,
                    'reference' => $_POST['Reference'] ?? null,
                    'priority' => $_POST['Priority'] ?? null,
                    'user' => session('user_id') ?? null,
                    'create_date' => date('Y-m-d')
                ];
                $c = $this->warranty->table('warranty_card')->where('product_serial', $_POST['ProductSerial'])->count();
                if (!empty($_POST['id'])) {
                    $rs = $this->warranty->table('warranty_card')->where('id', $_POST['id'])->update($data);
                    if (!empty($rs)) notification(['type' => 'success', 'message' => 'Update Successfully']);
                } else {
                    if ($c == 1) {
                        notification(['type' => 'warning', 'message' => 'Duplicate Product Batch Number']);
                    } else {
                        $rs = $this->warranty->table('warranty_card')->insert($data);
                        if ($rs) {
                            notification(['type' => 'success', 'message' => 'Created Successfully']);
                        } else notification(['type' => 'warning', 'message' => 'Created Error']);
                    }
                }
            }
        }

        return view('warrentyCard/create');
    }

    public function warrenty_card_search()
    {

        $ProductSerial = $_POST['ProductSerial'] ?? null;
        $CardNo = $_POST['CardNo'] ?? 0;
        $where = "where (wc.product_serial='" . $ProductSerial . "')";
        $data = $this->warranty->warrantyinfo($where);
        return view('warrentyCard/warrenty_card_search', compact('data', 'ProductSerial', 'CardNo'));
    }
    public function warrenty_search_date()
    {
        if ((session('user_lavel') == 2)||(session('user_lavel') == 3) ||(session('user_lavel') == 8)) {
            $branchs = $this->warranty->query("SELECT branch.id, branch.name FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id='" . session('user_id') . "'")->fetchAll();
        } else {
            $branchs = $this->warranty->query("SELECT branch.id, branch.name FROM branch ")->fetchAll();
        }


        if (!empty($_POST)) {
            $user_id = $_POST['user_id'] ?? null;
            $branch_id = $_POST['branch_id'] ?? null;
            $FormDate = $_POST['FormDate'] ?? null;
            $ToDate = $_POST['ToDate'] ?? null;
            if ($_POST['user_id'] == 'All' && $_POST['branch_id'] == 'All') {
                $where = "where  wc.create_date BETWEEN '" . $FormDate . "' AND '" . $ToDate . "'";
            } elseif ($_POST['branch_id'] == 'All') {
                $where = "where  wc.create_date BETWEEN '" . $FormDate . "' AND '" . $ToDate . "' AND  wc.user='$user_id'";
            } elseif ($_POST['user_id'] == 'All') {
                $where = "where  wc.create_date BETWEEN '" . $FormDate . "' AND '" . $ToDate . "' AND wc.branch_id='$branch_id'";
            } else {
                $where = "where  wc.create_date BETWEEN '" . $FormDate . "' AND '" . $ToDate . "' AND wc.user='$user_id' AND wc.branch_id='$branch_id'";
            }
            $data = $this->warranty->warrantyinfo($where);

            if (!empty($data)) {
                echo json_encode($data);
            } else echo 0;
        } else {
            return view('warrentyCard/warrenty_search_date', compact('branchs'));
        }
    }

    public function warrenty_search_dealer()
    {
        if ((session('user_lavel') == 2)||(session('user_lavel') == 3) ||(session('user_lavel') == 8)) {
            $branchs = $this->warranty->query("SELECT branch.id, branch.name FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id='" . session('user_id') . "'")->fetchAll();            
            $dealers = $this->warranty->query("SELECT * FROM dealer WHERE customer_type=1 AND branch_id ='" .$branchs[0]['id']. "'")->fetchAll();
        } else {
            $branchs = $this->warranty->query("SELECT branch.id, branch.name FROM branch ")->fetchAll();
            $dealers = $this->warranty->query("SELECT * FROM dealer WHERE customer_type=1")->fetchAll();
        }
        $stockgroup = $this->warranty->query("SELECT * FROM stock_group")->fetchAll();
        $product = $this->warranty->query("SELECT * FROM product")->fetchAll();        
        if (!empty($_POST)) {
            $branch_id = $_POST['branch_id'] ?? null;
            $area_id = $_POST['area_id'] ?? null;
            $dealer_id = $_POST['dealer_id'] ?? null;
            $stockgroup_id = $_POST['stockgroup_id'] ?? null;
            $batterytype_id = $_POST['batterytype_id'] ?? null;
            $FromDate = $_POST['FromDate'] ?? null;
            $ToDate = $_POST['ToDate'] ?? null;

            $where = '';
            if ($branch_id >0) {
                $where .=" wc.branch_id = $branch_id AND";
            }
            if ($area_id >0) {
                $where .=" wc.area_id = $area_id AND";
            }
            if ($dealer_id >0) {
                $where .=" wc.dealer_id = $dealer_id AND";
            }
            if ($stockgroup_id >0) {
                $where .=" wc.stock_group_id = $stockgroup_id AND";
            }
            if ($batterytype_id >0) {
                $where .=" wc.product_id  = $batterytype_id AND";
            }
            if (isset($FromDate) && isset($ToDate)) {
                $where .=" wc.create_date BETWEEN '$FromDate' AND '$ToDate'";
            }   
            $data = $this->warranty->dealer_warrantyinfo($where);
            if (!empty($data)) {
                $data=['data'=>$data];
                echo json_encode($data);
            } else {
                $data=['data'=>0];
                echo json_encode($data);}
        } else {
            return view('warrentyCard/warrenty_search_dealer', compact('branchs','stockgroup','product','dealers'));
        }
    }

    public function  dealerShow()
    {        
        $data = $this->warranty->query("SELECT dealer.id,dealer.name FROM dealer WHERE  customer_type=1 AND  area_id='".$_GET['areaid']."'")->fetchAll();
        echo json_encode($data);
       
    }

    public function edit($id = null)
    {
        if (!empty($id)) {
            $where = "WHERE wc.id = $id";
            $data = $this->warranty->warrantyinfo($where);
            $date1 = date_create($data[0]['card_end_date']);
            $date2 = date_create($data[0]['sales_date']);
            $diff = date_diff($date1, $date2);
            $month = $diff->format("%M%");
            return view('warrentyCard/warranty_edit',  compact('data', 'month'));
        }
    }

    public function delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->warranty->table('warranty_card')->where('id', $id)->delete();
            if (!empty($delete)) {
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            } else echo 0;
        }
    }
    public function get_branch()
    {
        $branch_id = $_GET['branch_id'];
        if (session('user_lavel') == 3) {
            $users = $this->warranty->query("SELECT users.name,users.id FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id=" . session('user_id') . "")->fetchAll();
        } else {
            if ($branch_id == 'All') {
                $users = $this->warranty->table('users')->where('role_id', 3)->fetchAll();
            } else {

                $users = $this->warranty->query("SELECT users.name,users.id FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.role_id=3 AND users.branch_id='" . $branch_id . "'")->fetchAll();
            }
        }
        echo json_encode($users);
        exit();
    }
    public function replacement_create()
    {
        return view('warrentyCard/replacement_create');
    }
    public function replacement_get_old_data()
    {
        $ProductSerial = $_GET['old_ProductSerial'] ?? null;
        $where = "where wc.product_serial='" . $ProductSerial . "'";
        $warranty = $this->warranty->query(
            "SELECT wc.id ,wc.product_id,wc.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,wc.product_serial,wc.card_no,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
            wc.reference, wc.priority,   wc.create_date,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
            FROM `warranty_card` as wc 
            LEFT JOIN product as p ON p.id=wc.product_id 
            LEFT JOIN stock_group as s ON s.id=wc.stock_group_id  
            LEFT JOIN dealer as d ON d.id=wc.dealer_id 
            LEFT JOIN branch as b on b.id=wc.branch_id 
            LEFT JOIN areas as a on a.id=wc.area_id 
            LEFT JOIN users as u on wc.user=u.id  $where"
        )->fetch();

        if (!empty($warranty)) {
            $data = $warranty;
        } else {
            $where = "where brep.product_serial='" . $ProductSerial . "'";
            $replacement_battery = $this->warranty->query(
                "SELECT brep.id as replacement_id,brep.product_id,brep.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,brep.product_serial,brep.card_no,brep.create_date ,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
                wc.reference, brep.priority,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
                FROM  battery_replacement as brep
                LEFT JOIN `warranty_card` as wc ON wc.id=brep.warrant_card_id
                LEFT JOIN product as wp ON wp.id=wc.product_id 
                LEFT JOIN stock_group as ws ON ws.id=wc.stock_group_id
                LEFT JOIN product as p ON p.id=brep.product_id 
                LEFT JOIN stock_group as s ON s.id=brep.stock_group_id  
                LEFT JOIN dealer as d ON d.id=wc.dealer_id 
                LEFT JOIN branch as b on b.id=wc.branch_id 
                LEFT JOIN areas as a on a.id=wc.area_id 
                LEFT JOIN users as u on brep.user_id=u.id  $where"
            )->fetch();
            $data = $replacement_battery;
        }
        echo json_encode($data);
        exit;
    }
    public function replacement_store()
    {
        $w_data = $this->warranty->table('warranty_card')->where('product_serial', $_POST['old_ProductSerial'])->fetch();
        if (!empty($w_data)) {
            $old_ProductSerial = null;
        } else {
            $old_ProductSerial = $_POST['old_ProductSerial'];
        }
        $data = [
            'warrant_card_id' => $_POST['warrenty_id'] ?? null,
            'product_id' => $_POST['product_id'] ?? null,
            'stock_group_id' => $_POST['stock_group_id'] ?? null,
            'product_serial' =>strtoupper($_POST['ProductSerial']) ?? null,
            'old_ProductSerial' =>  $old_ProductSerial,
            'card_no' => $_POST['CardNo'] ?? null,
            'priority' => $_POST['Priority'] ?? null,
            'user_id' => session('user_id') ?? null,
            'replacement_date' => date("Y-m-d", strtotime($_POST['replacement_date'])),
            'create_date' => date('Y-m-d'),
        ];
        $c = $this->warranty->table('battery_replacement')->where('product_serial', $_POST['ProductSerial'])->count();
        if (!empty($_POST['id'])) {
            $rs = $this->warranty->table('battery_replacement')->where('id', $_POST['id'])->update($data);
            if ($rs) {
                notification(['type' => 'success', 'message' => 'Update Successfully']);
                return view('warrentyCard/replacement_edit');
            } else notification(['type' => 'warning', 'message' => 'Update Error']);
        } else {
            if ($c == 1) {
                notification(['type' => 'warning', 'message' => 'Duplicate Product Batch Number']);
            } else {
                $rs = $this->warranty->table('battery_replacement')->insert($data);

                if ($rs) {
                    notification(['type' => 'success', 'message' => 'Created Successfully']);
                    return redirect('replacement/create');
                } else notification(['type' => 'warning', 'message' => 'Created Error']);
            }
        }
    }

    public function replacement_index()
    {
        if ((session('user_lavel') == 2)||(session('user_lavel') == 3) ||(session('user_lavel') == 8)) {
            $branchs = $this->warranty->query("SELECT branch.id, branch.name FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id='" . session('user_id') . "'")->fetchAll();            
            $dealers = $this->warranty->query("SELECT * FROM dealer  WHERE customer_type=1 AND branch_id ='" .$branchs[0]['id']. "'")->fetchAll(); 
        } else {
            $branchs = $this->warranty->query("SELECT branch.id, branch.name FROM branch ")->fetchAll();
            $dealers = $this->warranty->query("SELECT * FROM dealer WHERE customer_type=1")->fetchAll();
        }
        $stockgroup = $this->warranty->query("SELECT * FROM stock_group")->fetchAll();
        $product = $this->warranty->query("SELECT * FROM product")->fetchAll();

        if (!empty($_POST)) {
            $branch_id = $_POST['branch_id'] ?? null;
            $area_id = $_POST['area_id'] ?? null;
            $dealer_id = $_POST['dealer_id'] ?? null;
            $stockgroup_id = $_POST['stockgroup_id'] ?? null;
            $batterytype_id = $_POST['batterytype_id'] ?? null;
            $FromDate = $_POST['FromDate'] ?? null;
            $ToDate = $_POST['ToDate'] ?? null;

            if(($branch_id >0) || ($area_id >0) || ($dealer_id >0) || ($stockgroup_id >0) || ($batterytype_id >0) || (isset($FromDate) && isset($ToDate))) {
                $where = 'WHERE';
                if ($branch_id >0) {
                    $where .=" wc.branch_id = $branch_id AND";
                }
                if ($area_id >0) {
                    $where .=" wc.area_id = $area_id AND";
                }
                if ($dealer_id >0) {
                    $where .=" wc.dealer_id = $dealer_id AND";
                }
                if ($stockgroup_id >0) {
                    $where .=" wc.stock_group_id = $stockgroup_id AND";
                }
                if ($batterytype_id >0) {
                    $where .=" wc.product_id  = $batterytype_id AND";
                }
                if (isset($FromDate) && isset($ToDate)) {
                    $where .=" wc.create_date BETWEEN '$FromDate' AND '$ToDate'";
                }   
            }
            
            $data = $this->warranty->query("SELECT brep.id as replacement_id,brep.product_id,brep.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,brep.product_serial,brep.card_no,brep.create_date ,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
                                            wc.reference, brep.priority,brep.old_ProductSerial, wc.product_serial as old_product_serial,wp.name as old_product_name,ws.name as old_stock_group_name,   wc.create_date as old_create_date,wc.card_no as old_card_no,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
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
                                            $where")->fetchAll();
            if (!empty($data)) {
                $data=['data'=>$data];
                echo json_encode($data);
            } else echo 0;
        } else {
            return view('warrentyCard/replacement_index', compact('branchs','stockgroup','product','dealers'));
        }
    }


    // public function replacement_index()
    // {
    //     $data = $this->warranty->query(
    //         "SELECT brep.id as replacement_id,brep.product_id,brep.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,brep.product_serial,brep.card_no,brep.create_date ,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
    //         wc.reference, brep.priority,brep.old_ProductSerial, wc.product_serial as old_product_serial,wp.name as old_product_name,ws.name as old_stock_group_name,   wc.create_date as old_create_date,wc.card_no as old_card_no,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
    //         FROM  battery_replacement as brep
    //         LEFT JOIN `warranty_card` as wc ON wc.id=brep.warrant_card_id
    //         LEFT JOIN product as wp ON wp.id=wc.product_id 
    //         LEFT JOIN stock_group as ws ON ws.id=wc.stock_group_id
    //         LEFT JOIN product as p ON p.id=brep.product_id 
    //         LEFT JOIN stock_group as s ON s.id=brep.stock_group_id  
    //         LEFT JOIN dealer as d ON d.id=wc.dealer_id 
    //         LEFT JOIN branch as b on b.id=wc.branch_id 
    //         LEFT JOIN areas as a on a.id=wc.area_id 
    //         LEFT JOIN users as u on brep.user_id=u.id "
    //     )->fetchAll();

    //     return view('warrentyCard/replacement_index', compact('data'));
    // }


    public function replacement_edit($id)
    {
        $data = $this->warranty->query(
            "SELECT brep.id as replacement_id,brep.product_id,brep.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,brep.product_serial,brep.card_no,brep.create_date ,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
            wc.reference, brep.priority,brep.replacement_date, wc.product_serial as old_product_serial,wp.name as old_product_name,ws.name as old_stock_group_name,   wc.create_date as old_create_date,wc.card_no as old_card_no,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
            FROM  battery_replacement as brep
            LEFT JOIN `warranty_card` as wc ON wc.id=brep.warrant_card_id
            LEFT JOIN product as wp ON wp.id=wc.product_id 
            LEFT JOIN stock_group as ws ON ws.id=wc.stock_group_id
            LEFT JOIN product as p ON p.id=brep.product_id 
            LEFT JOIN stock_group as s ON s.id=brep.stock_group_id  
            LEFT JOIN dealer as d ON d.id=wc.dealer_id 
            LEFT JOIN branch as b on b.id=wc.branch_id 
            LEFT JOIN areas as a on a.id=wc.area_id 
            LEFT JOIN users as u on brep.user_id=u.id   WHERE brep.id=$id"

        )->fetch();



        return view('warrentyCard/replacement_edit', compact('data'));
    }
    public function replacement_delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->warranty->table('battery_replacement')->where('id', $id)->delete();
            if (!empty($delete)) {
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            } else echo 0;
        }
    }
    public function replacement_card_search()
    {
        if (!empty($_POST)) {
            $ProductSerial = $_POST['ProductSerial'] ?? null;
            $CardNo = $_POST['CardNo'] ?? 0;
            $data = $this->warranty->query(
                "SELECT brep.id as replacement_id,brep.product_id,brep.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,brep.product_serial,brep.card_no,brep.create_date ,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
            wc.reference, brep.priority, wc.product_serial as old_product_serial,wp.name as old_product_name,ws.name as old_stock_group_name,   wc.create_date as old_create_date,wc.card_no as old_card_no,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
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
            WHERE wc.product_serial= '$ProductSerial' OR  brep.product_serial='$ProductSerial'"
            )->fetchAll();
            if (!empty($data)) {
                echo json_encode($data);
            } else echo 0;
        } else
            return view('warrentyCard/replacement_search');
    }
    public function duplicate_serial_id()
    {
        $serial_id = $_GET['serial_id'];
        $c = $this->warranty->table('warranty_card')->where('product_serial', $serial_id)->count();

        echo json_encode($c);
        exit();
    }
    public function  replacement_duplicate_serial_id()
    {
        $serial_id = $_GET['serial_id'];
        $c1 = $this->warranty->table('warranty_card')->where('product_serial', $serial_id)->count();
        if($c1!=0){
            echo json_encode($c1);
            exit();
        }
        $c2= $this->warranty->table('battery_replacement')->where('product_serial', $serial_id)->count();
        if($c2!=0){
            echo json_encode($c2);
            exit();
        }
       
        
    }
}