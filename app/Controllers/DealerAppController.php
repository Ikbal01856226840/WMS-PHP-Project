<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Warranty;

class DealerAppController  extends Controller
{
    private $auth, $warranty;
    public $user, $nt, $nt_data;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->auth = new User();        
        $this->warranty = new Warranty();
        $this->user = session('user_id');
        $this->nt = $this->auth->query("SELECT COUNT(offer_access_dealer.status) as notification FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id INNER JOIN users ON dealer.id=users.dealer_id WHERE users.id= '$this->user' AND offer_access_dealer.status=1 ORDER BY offer.id DESC")->fetch();
        $this->nt_data = $this->auth->query("SELECT offer.offer_name, offer.id, offer.offer_message, offer.start_date, offer.end_date, offer.offer_type, offer.create_date, offer_access_dealer.status FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id INNER JOIN users ON dealer.id=users.dealer_id WHERE users.id= '$this->user' AND offer_access_dealer.status=1 ORDER BY offer.id DESC")->fetchAll();
    }

    /**
     * Display a login page
     *
     * @return view
     */
    public function index()
    {
        $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1)')->fetchAll();
        $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
        return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
    }

    public function dealerpage()
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {

            $notification = $this->nt;
            $notification_data = $this->nt_data;
            return view('dealer_app/dealerpage', compact('notification', 'notification_data'), false);
        }
    }

    public function notification($id)
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $notification = $this->auth->query("SELECT COUNT(offer_access_dealer.status) as notification,  FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id INNER JOIN users ON dealer.id=users.dealer_id WHERE users.id= '$this->user' AND offer_access_dealer.status=1 ORDER BY offer.id DESC")->fetch();
            $message = $this->auth->query("SELECT offer.offer_name, offer.id, offer.offer_message, offer.start_date, offer.end_date, offer.create_date, offer_access_dealer.status FROM offer
                                            LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id
                                            LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
                                            INNER JOIN users ON dealer.id=users.dealer_id
                                            WHERE users.id= '$this->user' ORDER BY offer.id DESC")->fetchAll();

            return view('dealer_app/dealerpage', compact('notification'), false);
        }
    }

    public function message()
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $notification = $this->nt;
            $notification_data = $this->nt_data;
            $message = $this->auth->query("SELECT offer.offer_name, offer.id, offer.offer_message, offer.start_date, offer.end_date, offer.create_date, offer_access_dealer.status, sender_name.name AS sender_name, ofp.offer_file FROM offer
                                            LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id
                                            LEFT JOIN (SELECT * FROM offer_file_path  GROUP BY offer_id) AS ofp   ON offer.id=ofp.offer_id
                                            LEFT JOIN (SELECT users.id, users.name FROM users) AS sender_name ON offer.user_id=sender_name.id
                                            LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
                                            INNER JOIN users ON dealer.id=users.dealer_id
                                            WHERE users.id= '$this->user' AND offer.offer_type = 2 ORDER BY offer.id DESC")->fetchAll();
            return view('dealer_app/dealer_message', compact('message', 'notification', 'notification_data'), false);
        }
    }

    public function message_details($id)
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $notification = $this->nt;
            $notification_data = $this->nt_data;
            $message_details = $this->auth->query("SELECT offer.offer_name, offer.id, offer.offer_message, offer.start_date, offer.end_date, offer.create_date, offer_access_dealer.status, offer_access_dealer.dealer_id, ofp.offer_file FROM offer
                                            LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id
                                            LEFT JOIN (SELECT * FROM offer_file_path  GROUP BY offer_id) AS ofp   ON offer.id=ofp.offer_id
                                            LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
                                            INNER JOIN users ON dealer.id=users.dealer_id
                                            WHERE users.id= '$this->user' AND offer.id = '$id'")->fetch();
            $data = [
                'status' => 0
            ];
            if ($message_details == true) {
                $update = $this->auth->table('offer_access_dealer')->where('dealer_id', $message_details['dealer_id'])->where('offer_id', $id)->update($data);
            }
            return view('dealer_app/message_details', compact('message_details', 'notification', 'notification_data'), false);
        }
    }

    public function offer()
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $notification = $this->nt;
            $notification_data = $this->nt_data;
            $offers = $this->auth->query("SELECT offer.offer_name, offer.id, offer.offer_message, offer.start_date, offer.end_date, offer.create_date, offer_access_dealer.status, sender_name.name AS sender_name, ofp.offer_file FROM offer
                                            LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id
                                            LEFT JOIN (SELECT * FROM offer_file_path  GROUP BY offer_id) AS ofp   ON offer.id=ofp.offer_id
                                            LEFT JOIN (SELECT users.id, users.name FROM users) AS sender_name ON offer.user_id=sender_name.id
                                            LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
                                            INNER JOIN users ON dealer.id=users.dealer_id
                                            WHERE users.id= '$this->user'  AND offer.offer_type = 1 ORDER BY offer.id DESC")->fetchAll();
            return view('dealer_app/dealer_offers', compact('offers', 'notification', 'notification_data'), false);
        }
    }

    public function offer_details($id)
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $notification = $this->nt;
            $notification_data = $this->nt_data;
            $offer_details = $this->auth->query("SELECT offer.offer_name, offer.id, offer.offer_message, offer.start_date, offer.end_date, offer.create_date, offer_access_dealer.status, offer_access_dealer.dealer_id, ofp.offer_file FROM offer
                                            LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id
                                            LEFT JOIN (SELECT * FROM offer_file_path  GROUP BY offer_id) AS ofp   ON offer.id=ofp.offer_id
                                            LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
                                            INNER JOIN users ON dealer.id=users.dealer_id
                                            WHERE users.id= '$this->user' AND offer.offer_type = 1 AND offer.id = '$id'")->fetch();
            $data = [
                'status' => 0
            ];
            if ($offer_details == true) {
                $update = $this->auth->table('offer_access_dealer')->where('dealer_id', $offer_details['dealer_id'])->where('offer_id', $id)->update($data);
            }
            return view('dealer_app/offer_details', compact('offer_details', 'notification', 'notification_data'), false);
        }
    }

    public function pricelist()
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $notification = $this->nt;
            $notification_data = $this->nt_data;
            $pricelist = $this->auth->query("SELECT offer.offer_name, offer.id, offer.offer_message, offer.start_date, offer.end_date, offer.create_date, offer_access_dealer.status, sender_name.name AS sender_name, ofp.offer_file FROM offer
                                            LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id
                                            LEFT JOIN (SELECT * FROM offer_file_path  GROUP BY offer_id) AS ofp   ON offer.id=ofp.offer_id
                                            LEFT JOIN (SELECT users.id, users.name FROM users) AS sender_name ON offer.user_id=sender_name.id
                                            LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
                                            INNER JOIN users ON dealer.id=users.dealer_id
                                            WHERE users.id= '$this->user'  AND offer.offer_type = 3 ORDER BY offer.id DESC")->fetchAll();
            return view('dealer_app/dealer_pricelist', compact('pricelist', 'notification', 'notification_data'), false);
        }
    }

    public function pricelist_details($id)
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $notification = $this->nt;
            $notification_data = $this->nt_data;
            $offer_details = $this->auth->query("SELECT offer.offer_name, offer.id, offer.offer_message, offer.start_date, offer.end_date, offer.create_date, offer_access_dealer.status, offer_access_dealer.dealer_id, ofp.offer_file FROM offer
                                                LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id
                                                LEFT JOIN (SELECT * FROM offer_file_path  GROUP BY offer_id) AS ofp   ON offer.id=ofp.offer_id
                                                LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
                                                INNER JOIN users ON dealer.id=users.dealer_id
                                                WHERE users.id= '$this->user' AND offer.offer_type = 3 AND offer.id = '$id'")->fetch();
            $data = [
                'status' => 0
            ];
            if ($offer_details == true) {
                $update = $this->auth->table('offer_access_dealer')->where('dealer_id', $offer_details['dealer_id'])->where('offer_id', $id)->update($data);
            }
            return view('dealer_app/offer_details', compact('offer_details', 'notification', 'notification_data'), false);
        }
    }

    // public function swr()
    // {
    //     $swr = '';
    //     $ProductSerial = '';
    //     $notification = $this->nt;
    //     $notification_data = $this->nt_data;
    //     if (!empty($_GET['ProductSerial'])) {
    //         $ProductSerial = $_GET['ProductSerial'] ?? null;
    //         // $userid = (session('user_id'));
    //         $where = "WHERE wc.product_serial='$ProductSerial'";
    //         $swr = $this->auth->query("SELECT wc.id,wc.product_id,wc.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,wc.product_serial,wc.card_no,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
    //             wc.reference, wc.priority,   wc.create_date,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
    //             FROM `warranty_card` as wc 
    //             LEFT JOIN product as p ON p.id=wc.product_id 
    //             LEFT JOIN stock_group as s ON s.id=wc.stock_group_id  
    //             LEFT JOIN dealer as d ON d.id=wc.dealer_id 
    //             LEFT JOIN branch as b on b.id=wc.branch_id 
    //             LEFT JOIN areas as a on a.id=wc.area_id 
    //             LEFT JOIN users as u on wc.dealer_id=u.dealer_id $where")->fetchAll();
    //     }
    //     return view('dealer_app/dealer_swr', compact('swr', 'ProductSerial', 'notification', 'notification_data'), false);
    // }


    public function swr()
    {   
        $swr = ''; 
        $ProductSerial = '';
        $notification = $this->nt;
        $notification_data = $this->nt_data;
        if(!empty($_POST['ProductSerial'])){            
        $ProductSerial = $_POST['ProductSerial'] ?? null;
        $where = "where (wc.product_serial='" . $ProductSerial . "')";
        $swr = $this->warranty->warrantyinfo($where);
        
        // $where = "where (wc.product_serial='" . $ProductSerial . "')";
        // $swr = $this->auth->query("SELECT wc.id,wc.product_id,wc.stock_group_id,wc.dealer_id ,wc.branch_id,wc.area_id , p.name,wc.product_serial,wc.card_no,wc.sales_date,wc.card_end_date, wc.sales_office, wc.sales_person, wc.customer_name, wc.customer_address, wc.customer_phone,
        //         wc.reference, wc.priority,   wc.create_date,d.name as dealerName, wc.customer_name,b.name as branchName,u.name as userName,wc.id,s.name as group_name,a.area_name,a.sales_parson
        //         FROM `warranty_card` as wc 
        //         LEFT JOIN product as p ON p.id=wc.product_id 
        //         LEFT JOIN stock_group as s ON s.id=wc.stock_group_id  
        //         LEFT JOIN dealer as d ON d.id=wc.dealer_id 
        //         LEFT JOIN branch as b on b.id=wc.branch_id 
        //         LEFT JOIN areas as a on a.id=wc.area_id 
        //         LEFT JOIN users as u on wc.user=u.id $where")->fetchAll();
                if(!empty($swr)){
                    // dd($swr);
                echo json_encode($swr);
                }else{
                    echo 0;
                }
        }else{
        return view('dealer_app/dealer_swr_barcode', compact('swr', 'ProductSerial', 'notification', 'notification_data'), false);
        }
    }



    public function number()
    {
        $userid = (session('user_id'));
        $notification = $this->nt;
        $notification_data = $this->nt_data;
        $stocks = $this->auth->table('phone_number_stock_group')->fetchAll();
        $numbers = $this->auth->query("SELECT phone_entry.*, phone_number_stock_group.name as stock_group_name FROM phone_entry LEFT JOIN phone_number_stock_group ON phone_number_stock_group.id = phone_entry.stock_group_id WHERE user_id=$userid AND phone_entry_date=CURDATE()")->fetchAll();

        return view('dealer_app/dealer_collectnumber', compact('numbers', 'stocks', 'notification', 'notification_data'), false);
    }

    public function number_store()
    {
        if (!empty($_POST)) {
            $stock_group_id = $_POST['stock_group_id'] ?? null;
            $brand = $_POST['brand_id'] ?? null;
            $phone_type = $_POST['phone_type'] ?? null;
            $phone_number = $_POST['phone_number'] ?? null;
            $customer_name = $_POST['customer_name'] ?? null;
            $location = $_POST['location'] ?? null;
            $date = $_POST['date'] ?? null;
            $note = $_POST['note'] ?? null;
            $phone_number_unique = [
                'phone_number' => $phone_number
            ];
            $group_unique = [
                'stock_group_id' => $stock_group_id
            ];
            if (!$this->auth->table('phone_entry')->where($phone_number_unique)->where($group_unique)->count()) {
                $dat = [
                    'stock_group_id' => $stock_group_id,
                    'brand' => $brand,
                    'phone_type' => $phone_type,
                    'phone_number' => $phone_number,
                    'customer_name' => $customer_name,
                    'location' => $location,
                    'phone_entry_date' => $date,
                    'note' => $note,
                    'user_id' => session('user_id'),
                ];
            }
            $data = $this->auth->table('phone_entry')->insert($dat);
            if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
            else notification(['type' => 'warning', 'message' => 'Created Error']);
            return redirect('dealerapp/number');
        } else {
            notification(['type' => 'warning', 'message' => 'Duplicate Phone Number']);
            return redirect('dealerapp/number');
        }
    }

    public function profileupdate()
    {
        $notification = $this->nt;
        $notification_data = $this->nt_data;
        return view('dealer_app/dealer_profileupdate', compact('notification', 'notification_data'), false);
    }



    public function show()
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $service = $_GET['service_id'];
            if (!empty($service)) {
                $service_data = $this->auth->query(" SELECT * FROM service_branch WHERE service_branch.service_center_name LIKE '$service%' OR service_branch.address LIKE '$service%' OR service_branch.near_area LIKE '$service%'LIMIT 6")->fetchAll();
                if (!empty($service_data)) {
                    $get_service = $service_data;
                } else {
                    $get_service = $this->auth->query(" SELECT * FROM service_branch WHERE service_branch.service_center_name LIKE '%$service%' OR service_branch.address LIKE '%$service%' OR service_branch.thana LIKE '%$service%' OR service_branch.district LIKE '%$service%' OR service_branch.near_area LIKE '%$service%'LIMIT 6")->fetchAll();
                }
                $dealer_data = $this->auth->query(" SELECT * FROM dealer WHERE (dealer.name LIKE '$service%' OR dealer.address LIKE '$service%' OR dealer.thana LIKE '$service%'OR dealer.district LIKE '$service%'OR dealer.near_area LIKE '$service%' ) AND dealer.status=1 LIMIT 6")->fetchAll();
                if (!empty($dealer_data)) {
                    $dealer = $dealer_data;
                } else {
                    $dealer = $this->auth->query(" SELECT * FROM dealer WHERE (dealer.name LIKE '%$service%' OR dealer.address LIKE '%$service%' OR dealer.thana LIKE '%$service%' OR dealer.district LIKE '%$service%' OR dealer.near_area LIKE '%$service%') AND dealer.status=1 LIMIT 6")->fetchAll();
                }
                $retailer_serch = $this->auth->query(" SELECT * FROM retailer WHERE retailer.name LIKE '%$service%' OR retailer.address LIKE '%$service%'  LIMIT 6")->fetchAll();
                $mul_array = ['service' => $get_service, 'dealer' => $dealer, 'retailer' => $retailer_serch];
            } else {
                $mul_array = null;
            }
            echo json_encode($mul_array);
            exit();
        }
    }
    public function dealerIndex()
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $image = $this->auth->query('SELECT * FROM service_center_image WHERE image_active=1  ORDER BY id DESC')->fetchAll();
            return view('dealer_main_page', compact('image'), false);
        }
    }


    public function service_show()
    {
        if (!session('is_logged_in')) {
            $image = $this->auth->query('SELECT image, image_active FROM service_center_image WHERE (image_active=1) AND (image_type = 0)  ORDER BY id DESC')->fetchAll();
            $pdfs = $this->auth->query('SELECT * FROM service_center_image WHERE (image_active=1) AND (image_type =2)  ORDER BY id DESC')->fetchAll();
            return view('dealer_app/dealer_login', compact('image', 'pdfs'), false);
        } else {
            $service_data = $this->auth->query('SELECT * FROM service_branch')->fetchAll();
            return view('service', compact('service_data'), false);
        }
    }
}
