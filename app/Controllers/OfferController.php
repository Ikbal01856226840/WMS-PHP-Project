<?php

namespace App\Controllers;

use App\Models\Offer;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;
use App\library\Upload;

class OfferController extends Controller
{
    use GenerateList;

    public $offer;
    public function __construct()
    {
        parent::__construct();
        $this->offer = new Offer();
        if (session('user_lavel') == 1 || session('user_lavel')==2 || session('user_lavel') == 5 || session('user_lavel') == 6 || session('user_lavel') == 8) {
            true;
        } else {
            redirect('auth/login');
        }
    }
    public function create()
    {
        $dealer_offers = $this->offer->query("SELECT dealer.name,dealer.id FROM  dealer LEFT JOIN users ON dealer.id=users.dealer_id WHERE  customer_type=1 AND  users.role_id=5")->fetchAll();
        $retrailer_offers = $this->offer->query("SELECT retailer.name,retailer.id FROM  retailer LEFT JOIN users ON retailer.id=users.user_access_id WHERE  users.role_id=6 ")->fetchAll();
        
        if ((session('user_lavel') == 2)||(session('user_lavel') == 3) ||(session('user_lavel') == 8)) {
            $branchs = $this->offer->query("SELECT branch.id, branch.name FROM users  LEFT JOIN branch ON users.branch_id=branch.id WHERE users.id='" . session('user_id') . "'")->fetchAll();                                  
        } else {
            $branchs = $this->offer->query("SELECT branch.id, branch.name FROM branch ")->fetchAll();            
        }
        return view('offer/create', compact('dealer_offers', 'retrailer_offers', 'branchs'));
    }

    public function offerDealer()
    {
        if (!empty($_POST['id'])) {
            $offerid = $_POST['id'];
            $dealer = '';
            $dealer = $this->offer->query("SELECT offer_access_dealer.offer_id, branch.id AS branch_id, branch.name AS branch_name, areas.id AS area_id, areas.area_name AS area_name, offer_access_dealer.dealer_id, dealer.name AS dealer_name FROM offer_access_dealer 
                                           LEFT JOIN dealer ON offer_access_dealer.dealer_id = dealer.id 
                                           LEFT JOIN branch ON dealer.branch_id = branch.id 
                                           LEFT JOIN areas ON dealer.area_id = areas.id 
                                           WHERE  customer_type=1 AND offer_access_dealer.offer_id = $offerid")->fetchAll();
        }
        echo json_encode($dealer);
        exit();
    }


    public function getDealer()
    {
        if (!empty($_GET['branch_id']) || !empty($_GET['area_id'])) {

            $dealer = [];
            if ($_GET['branch_id'] == 0) {
                $dealer[] = $this->offer->query("SELECT dealer.name,dealer.id FROM  dealer LEFT JOIN users ON dealer.id=users.dealer_id WHERE customer_type=1 AND users.role_id=5")->fetchAll();
            } else if ($_GET['branch_id'] != 0) {
                foreach ($_GET['area_id'] as $area) {

                    if ($area == 0) {
                        $dealer[] = $this->offer->query("SELECT dealer.name,dealer.id FROM  dealer LEFT JOIN users ON dealer.id=users.dealer_id WHERE customer_type=1 AND dealer.branch_id='" . $_GET['branch_id'] . "'AND users.role_id=5")->fetchAll();
                    } else {
                        $dealer[] = $this->offer->query("SELECT dealer.name,dealer.id FROM  dealer LEFT JOIN users ON dealer.id=users.dealer_id  WHERE customer_type=1 AND dealer.branch_id='" . $_GET['branch_id'] . "' AND dealer.area_id='" . $area . "'AND users.role_id=5")->fetchAll();
                    }
                }
            }
        }
        echo json_encode($dealer);
        exit();
    }
    public function getRetrailer()
    {
        if (!empty($_GET['access_retrailer_id'])) {
            $relailer = [];
            foreach ($_GET['access_retrailer_id'] as $user_id) {
                if ($user_id == 0) {
                    $relailer[] = $this->offer->query("SELECT retailer.name,retailer.id FROM  retailer LEFT JOIN users ON retailer.id=users.user_access_id WHERE  users.role_id=6 ")->fetchAll();
                } else {
                    $relailer[] = $this->offer->query("SELECT retailer.name,retailer.id  FROM  retailer LEFT JOIN users ON retailer.id=users.user_access_id WHERE retailer.id='$user_id' AND users.role_id=6")->fetchAll();
                }
            }
        } else {
            $relailer = null;
        }
        echo json_encode($relailer);
        exit();
    }
    public function offer_edit($id)
    {
        $retrailer_offers = $this->offer->query("SELECT retailer.name,retailer.id FROM  retailer LEFT JOIN users ON retailer.id=users.user_access_id WHERE  users.role_id=6 ")->fetchAll();
        $dealer_offers = $this->offer->query("SELECT offerdealer.name,offerdealer.id FROM  offerdealer LEFT JOIN users ON offerdealer.id=users.user_access_id WhERE   users.role_id=5 ")->fetchAll();
        $dealer_offer_edit = $this->offer->query("SELECT offer_access_dealer.offer_id, dealer.id AS dealer_id, dealer.name, dealer.branch_id, dealer.area_id FROM offer_access_dealer LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id WHERE offer_access_dealer.offer_id='$id' ")->fetchAll();

        $retrailer_offer_edit = $this->offer->query("SELECT offer_access_retrailer.retrailer_id,offer_access_retrailer.id,retailer.name  FROM  offer_access_retrailer  LEFT JOIN   retailer ON  offer_access_retrailer.retrailer_id=retailer.id  WHERE offer_access_retrailer.offer_id='$id' ")->fetchAll();
        $offer_file = $this->offer->query("SELECT offer_file_path.id as of_id,offer_file_path.offer_file FROM offer_file_path WHERE offer_file_path.offer_id='$id' ")->fetchAll();
        $delers = [];
        foreach ($dealer_offer_edit as $row) {
            $delers[$row['dealer_id']] = $row['dealer_id'];
        }
        $retrailers = [];
        foreach ($retrailer_offer_edit as $row) {
            $retrailers[$row['retrailer_id']] = $row['retrailer_id'];
        }

        $offer = $this->offer->table('offer')->where('id', $id)->fetch();
        return view('offer/offer_edit', compact('offer', 'dealer_offers', 'dealer_offer_edit', 'retrailer_offers', 'retrailer_offer_edit', 'delers', 'retrailers', 'offer_file', 'dealer_offer_edit'));
    }
    public function file_edit()
    {
        $id = $_GET['id'];

        $offer_file = $this->offer->query("SELECT * FROM offer_file_path WHERE offer_file_path.offer_id='$id' ")->fetchAll();

        echo json_encode($offer_file);
        exit();
    }
    // public function all_offer()
    // {
    //     $offers = $this->offer->query("SELECT * FROM offer ORDER BY offer.id DESC")->fetchAll();

    //     return view('offer/all_offer_show', compact('offers'));
    // }

    public function all_offer()
    {   
        $offer_type = $_POST['offer_type'] ?? ''; $where = '';

        if(($offer_type > 0) || (session('user_lavel') == 2) || (session('user_lavel') == 8)){            
            $where = 'WHERE';
            if ((session('user_lavel') == 2) || (session('user_lavel') == 8)) {
                $where .=" offer.user_id = '" . session('user_id') . "' AND";
            }
            if ($offer_type > 0) {
                $where .=" offer.offer_type = $offer_type AND";
            } 

            $where = rtrim($where, "AND");  
        }
        $offers = $this->offer->query("SELECT offer.*, offer_file_path.offer_file as file, users.name AS user_name FROM offer 
                                                LEFT JOIN offer_file_path ON offer.id = offer_file_path.offer_id
                                                LEFT JOIN users ON offer.user_id = users.id
                                                $where ORDER BY offer.id DESC")->fetchAll();
        
        return view('offer/all_offer_show', compact('offers','offer_type'));
    }

    public function index()
    {
        $offers = $this->offer->query(
            "SELECT offer.offer_name,
             offer.id,
             offer.offer_type,
             offer.offer_message,
             offer.start_date,
             offer.end_date,
             dealer.name
             FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
             LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id 
             ORDER BY offer.id DESC"
        )->fetchAll();

        return view('offer/index', compact('offers'));
    }
    public  function retrailerShow()
    {
        $relailers = $this->offer->query(
            "SELECT offer.offer_name,
             offer.id,
             offer.offer_message,
             offer.start_date,
             offer.end_date,
             retailer.name
             FROM offer INNER JOIN offer_access_retrailer ON offer.id=offer_access_retrailer.offer_id 
             INNER JOIN retailer ON offer_access_retrailer.retrailer_id=retailer.id  ORDER BY offer.id DESC"
        )->fetchAll();

        return view('offer/retrailer_show', compact('relailers'));
    }


    public function store()
    {

        if ($_POST) {
            $offer_name = $_POST['offer_name'] ?? null;
            $offer_message = $_POST['offer_message'] ?? null;
            $start_date = $_POST['start_date'] ?? null;
            $end_date = $_POST['end_date'] ?? null;
            $offer_type = $_POST['offer_type'] ?? null;
            $data = [
                'offer_name' => $offer_name,
                'offer_message' => $offer_message,
                'start_date' => $start_date,
                'end_date' =>  $end_date,
                'offer_type' => $offer_type,
                'user_id' => session('user_id'),
                'create_date' => date('Y-m-d'),
            ];
            $data = $this->offer->table('offer')->insert($data);
            $offer_id = $this->offer->lastInsertId();
            $offer_file = isset($_FILES['offer_file']) ? $_FILES['offer_file'] : '';
            if (array_filter($_FILES['offer_file']['name'])) {
                if (!empty($offer_file)) {
                    for ($i = 0; $i < count($offer_file['name']); $i++) {
                        if ($_FILES['offer_file']['type'][$i] == 'application/pdf' || $_FILES['offer_file']['type'][$i] == 'image/png' || $_FILES['offer_file']['type'][$i] == 'image/jpg' || $_FILES['offer_file']['type'][$i] == 'image/jpeg') {
                            $file_name = $_FILES['offer_file']['name'][$i];
                            $file_size = $_FILES['offer_file']['size'];
                            $file_temp = $_FILES['offer_file']['tmp_name'][$i];
                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10) . $i . '.' . $file_ext;
                            $uploaded_image = "public/assets/uploads/" . $unique_image;
                            $upload = "uploads/" . $unique_image;
                            move_uploaded_file($file_temp, $uploaded_image);
                            $this->offer->table('offer_file_path')->insert([
                                'offer_id' => $offer_id,
                                'offer_file' => $upload,

                            ]);
                        } else {
                            notification(['type' => 'danger', 'message' => 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.']);
                            redirect('regular/offer/create');
                            exit;
                        }
                    }
                }
            }

            //dealer insert
            $dealer_id = $_POST['dealer_id'];
            $dat[] = [];
            for ($i = 0; $i < count(array_filter($dealer_id)); $i++) {
                $dat[$i] = [
                    'offer_id' => $offer_id,
                    'dealer_id' => $dealer_id[$i],

                ];
            }
            for ($i = 0; $i < count(array_filter($dealer_id)); $i++) {
                $da = $this->offer->table('offer_access_dealer')->insert($dat[$i]);
            }
            //retrailer insert
            $retrailer_id = $_POST['retrailer_id'];
            $d[] = [];
            for ($i = 0; $i < count(array_filter($retrailer_id)); $i++) {
                $d[$i] = [
                    'offer_id' => $offer_id,
                    'retrailer_id' => $retrailer_id[$i],

                ];
            }
            for ($i = 0; $i < count(array_filter($retrailer_id)); $i++) {
                $da = $this->offer->table('offer_access_retrailer')->insert($d[$i]);
            }
            if ($da) notification(['type' => 'success', 'message' => 'Created Successfully']);
            else notification(['type' => 'warning', 'message' => 'Created Error']);
        }

        return redirect('offer/index');
    }
    public function update($id)
    {

        if ($_POST) {
            $offer_name =  trim($_POST['offer_name'] ?? null);
            $file_id = $_POST['id'];
            $offer_type = $_POST['offer_type'] ?? null;
            $offer_message = trim($_POST['offer_message']);
            $start_date = $_POST['start_date'] ?? null;
            $end_date = $_POST['end_date'] ?? null;
            $data = [
                'offer_name' => $offer_name,
                'offer_message' => $offer_message,
                'start_date' => $start_date,
                'end_date' =>  $end_date,
                'offer_type' => $offer_type,
                'create_date' => date('Y-m-d'),
            ];
            $data = $this->offer->table('offer')->where('id', $id)->update($data);
            if (!empty($file_id)) {
                $offer_file = isset($_FILES['offer_file']) ? $_FILES['offer_file'] : '';
                if (!empty($offer_file)) {
                    for ($i = 0; $i < count($offer_file); $i++) {
                        if ($_FILES['offer_file']['size'][$i] > 0) {
                            $data = [];
                            $data[] = $this->offer->table('offer_file_path')->where('id', $file_id[$i])->fetch();
                            foreach ($data as $row) {
                                if (!$row['offer_file'] == null) {

                                    unlink('public/assets/' . $row['offer_file']);
                                }
                            }

                            if ($_FILES['offer_file']['type'][$i] == 'application/pdf' || $_FILES['offer_file']['type'][$i] == 'image/png' || $_FILES['offer_file']['type'][$i] == 'image/jpg' || $_FILES['offer_file']['type'][$i] == 'image/jpeg') {
                                $file_name = $_FILES['offer_file']['name'][$i];
                                $file_size = $_FILES['offer_file']['size'];
                                $file_temp = $_FILES['offer_file']['tmp_name'][$i];
                                $div = explode('.', $file_name);
                                $file_ext = strtolower(end($div));
                                $unique_image = substr(md5(time()), 0, 10) . $i . '.' . $file_ext;
                                $uploaded_image = "public/assets/uploads/" . $unique_image;
                                $upload = "uploads/" . $unique_image;

                                move_uploaded_file($file_temp, $uploaded_image);
                                $this->offer->table('offer_file_path')->where('id', $file_id[$i])->update([
                                    'offer_id' => $id,
                                    'offer_file' => $upload,

                                ]);
                            } else {
                                notification(['type' => 'danger', 'message' => 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.']);
                                redirect('regular/offer/create');
                                exit;
                            }
                        }
                    }
                }
            }
            if (array_filter($_FILES['offer_file_id']['name'])) {
                $offer_id = $id;
                $offer_file = isset($_FILES['offer_file_id']) ? $_FILES['offer_file_id'] : '';
                if (!empty($offer_file)) {
                    for ($i = 0; $i < count($offer_file['name']); $i++) {
                        if ($_FILES['offer_file_id']['type'][$i] == 'application/pdf' || $_FILES['offer_file_id']['type'][$i] == 'image/png' || $_FILES['offer_file_id']['type'][$i] == 'image/jpg' || $_FILES['offer_file_id']['type'][$i] == 'image/jpeg') {
                            $file_name = $_FILES['offer_file_id']['name'][$i];
                            $file_size = $_FILES['offer_file_id']['size'];
                            $file_temp = $_FILES['offer_file_id']['tmp_name'][$i];
                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10) . $i . '.' . $file_ext;
                            $uploaded_image = "public/assets/uploads/" . $unique_image;
                            $upload = "uploads/" . $unique_image;
                            move_uploaded_file($file_temp, $uploaded_image);
                            $this->offer->table('offer_file_path')->insert([
                                'offer_id' => $offer_id,
                                'offer_file' => $upload,

                            ]);
                        } else {
                            notification(['type' => 'danger', 'message' => 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.']);
                            redirect('regular/offer/create');
                            exit;
                        }
                    }
                }
            }
            //dealer insert
            $this->offer->query("DELETE FROM  offer_access_dealer WHERE offer_id='$id' ");
            $dealer_id = $_POST['dealer_id'];
            $dat[] = [];
            for ($i = 0; $i < count(array_filter($dealer_id)); $i++) {
                $dat[$i] = [
                    'offer_id' => $id,
                    'dealer_id' => $dealer_id[$i],

                ];
            }
            for ($i = 0; $i < count(array_filter($dealer_id)); $i++) {
                $da = $this->offer->table('offer_access_dealer')->insert($dat[$i]);
            }
            //retrailer insert
            $this->offer->query("DELETE FROM  offer_access_retrailer WHERE offer_id='$id' ");
            $retrailer_id = $_POST['retrailer_id'];
            $d[] = [];
            for ($i = 0; $i < count(array_filter($retrailer_id)); $i++) {
                $d[$i] = [
                    'offer_id' => $id,
                    'retrailer_id' => $retrailer_id[$i],

                ];
            }
            for ($i = 0; $i < count(array_filter($retrailer_id)); $i++) {
                $da = $this->offer->table('offer_access_retrailer')->insert($d[$i]);
            }
            if ($da) notification(['type' => 'success', 'message' => 'Update Successfully']);
            else notification(['type' => 'warning', 'message' => 'Created Error']);
            redirect('offer/index');
        }
    }
    public function file_delete()
    {
        $ids = $_GET['id'];

        foreach ($ids as  $id) {
            $data = $this->offer->table('offer_file_path')->where('id', $id)->fetch();
            if (!$data['offer_file'] == null) {
                unlink('public/assets/' . $data['offer_file']);
            }
            $file_data = $this->offer->query("DELETE FROM  offer_file_path WHERE id='" . $data['id'] . "' ");
        }

        echo json_encode($file_data);
        exit;
    }
    public function delete()
    {
        if ($_POST['id']) {

            $id = $_POST['id'] ?? null;
            $data = $this->offer->table('offer_file_path')->where('offer_id', $id)->fetchAll();

            foreach ($data as $row) {
                if (!$row['offer_file'] == null) {
                    unlink('public/assets/' . $row['offer_file']);
                }
            }

            $delete_offer = $this->offer->table('offer')->where('id', $id)->delete();
            $delete_access_dealer = $this->offer->table('offer_access_dealer')->where('offer_id', $id)->delete();
            $offer_file_path = $this->offer->table('offer_file_path')->where('offer_id', $id)->delete();
            if (!empty($delete_offer)) {
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            } else echo 0;
        }
    }


    public function individual_offer()
    {
        if (!empty($_GET['from_date'])) {
            $start_date = ' "' . $_GET['from_date'] . '"';
            $from_date = $_GET['from_date'];
        } else {
            $start_date = date('Y-m-d');
        }
        if (!empty($_GET['to_date'])) {
            $end_date = ' "' . $_GET['to_date'] . '"';
            $to_date = $_GET['to_date'];
        } else {
            $end_date = date('Y-m-d');
        }
        $user_id = session('user_id');
        $roule_id = session('role_id');
        if ($roule_id == 5) {
            if (!empty($_GET['from_date']) && !empty($_GET['to_date'])) {
                $date = "offer.create_date BETWEEN $start_date AND $end_date";
            } else {
                $date = "";
            }
            $individual_offer = $this->offer->query(
                "SELECT offer.offer_name,
                 offer.id,
                 offer.offer_message,
                 offer.start_date,
                 offer.end_date,
                 offer.create_date,
                 users.name,
                 offer_access_dealer.id as offer_access_dealer_id
                 FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
                 LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id 
                 INNER JOIN users ON dealer.id=users.dealer_id  WHERE users.id='$user_id'   $date ORDER BY offer.id DESC"

            )->fetchAll();
        } elseif ($roule_id == 6) {
            if (!empty($_GET['from_date']) && !empty($_GET['to_date'])) {
                $date = "offer.create_date BETWEEN $start_date AND $end_date";
            } else {
                $date = "";
            }
            $individual_offer = $this->offer->query(
                "SELECT offer.offer_name,
                 offer.id,
                 offer.offer_message,
                 offer.start_date,
                 offer.end_date,
                 offer.create_date,
                 users.name,
                 offer_access_retrailer.id as offer_access_dealer_id
                 FROM offer LEFT JOIN offer_access_retrailer ON offer.id=offer_access_retrailer.offer_id 
                 LEFT JOIN  retailer ON offer_access_retrailer.retrailer_id= retailer.id 
                 INNER JOIN users ON  retailer.id=users.user_access_id  WHERE users.id='$user_id'  $date ORDER BY offer.id DESC "
            )->fetchAll();
        } elseif ($roule_id == 1 || $roule_id == 2) {
            if (!empty($_GET['from_date']) && !empty($_GET['to_date'])) {
                $date = " WHERE offer.create_date BETWEEN $start_date AND $end_date";
            } else {
                $date = "";
            }
            $individual_offer = $this->offer->query(
                "SELECT offer.offer_name,
                 offer.id,
                 offer.offer_message,
                 offer.start_date,
                 offer.end_date,
                 offer.create_date
                 FROM offer  $date ORDER BY offer.id DESC "
            )->fetchAll();
        }



        return view('offer/individual_offer', compact('individual_offer', 'from_date', 'to_date'));
    }
    public function individual_offer_all_show()
    {
        $user_id = session('user_id');
        $individual_offer = $this->offer->query(
            "SELECT offer.offer_name,
             offer.id,
             offer.offer_message,
             offer.start_date,
             offer.end_date,
             offerdealer.name 
             FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
             LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id WHERE dealer.user_id='$user_id' "
        )->fetchAll();

        echo json_encode($individual_offer);
        exit();
    }
    public function individual_offer_image_show($id)
    {

        $row = $this->offer->query("SELECT offer.offer_name,offer.id,offer.offer_file FROM offer WHERE  offer.id='$id' ")->fetch();


        return view('offer/individual_offer_image_show', compact('row'));
    }
    public function individual_offer_count()
    {
        $user_id = session('user_id');
        $roule_id = session('role_id');

        if ($roule_id == 5) {
            $count = $this->offer->query(
                "SELECT 
                COUNT(offer.id) as count_id
                FROM offer INNER JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
                INNER JOIN dealer ON offer_access_dealer.dealer_id=dealer.id INNER JOIN users ON dealer.id=users.dealer_id  WHERE users.id='$user_id' AND  offer_access_dealer.status= 1"
            )->fetchAll();
        } elseif ($roule_id == 6) {
            $count = $this->offer->query(
                "SELECT 
                COUNT(offer.id) as count_id
                FROM offer INNER JOIN offer_access_retrailer ON offer.id=offer_access_retrailer.offer_id 
                INNER JOIN retailer ON offer_access_retrailer.retrailer_id=retailer.id INNER JOIN users ON retailer.id=users.dealer_id   WHERE users.id='$user_id' AND  offer_access_retrailer.status= 1  "
            )->fetchAll();
        } else {
            $count = null;
        }

        echo json_encode($count);
        exit;
    }
    public function individual_offer_notification()
    {
        $user_id = session('user_id');
        $roule_id = session('role_id');
        if ($roule_id == 5) {
            $notification = $this->offer->query(
                "SELECT
                offer.id,
                offer.offer_name,
                offer.offer_message,
                offer.create_date,
                ofp.offer_file
                FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
                LEFT JOIN (SELECT * FROM offer_file_path  GROUP BY offer_id) AS ofp   ON offer.id=ofp.offer_id 
                LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id LEFT JOIN users ON dealer.id=users.dealer_id WHERE users.id='$user_id' AND offer_access_dealer.status=1 ORDER BY offer.id DESC "
            )->fetchAll();
        } elseif ($roule_id == 6) {
            $notification = $this->offer->query(
                "SELECT
                offer.id,
                offer.offer_name,
                offer.offer_message,
                offer.create_date,
                ofp.offer_file
                FROM offer LEFT JOIN offer_access_retrailer ON offer.id=offer_access_retrailer.offer_id 
                LEFT JOIN (SELECT * FROM offer_file_path  GROUP BY offer_id) AS ofp   ON offer.id=ofp.offer_id 
                LEFT JOIN retailer ON offer_access_retrailer.retrailer_id=retailer.id LEFT JOIN users ON retailer.id=users.user_access_id WHERE users.id='$user_id' AND offer_access_retrailer.status=1 ORDER BY offer.id DESC "
            )->fetchAll();
        }
        //dd($notification);
        echo json_encode($notification);
        exit;
    }
    public function individual_offer_notification_show($id)
    {
        $user_id = session('user_id');
        $roule_id = session('role_id');
        if ($roule_id == 5) {
            if (!empty($id)) {
                $offer_access_id = $this->offer->query(
                    "SELECT  
                     offer_access_dealer.id
                     FROM offer INNER JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
                     INNER JOIN dealer ON offer_access_dealer.dealer_id=dealer.id 
                     INNER JOIN users ON dealer.id=users.dealer_id  WHERE users.id='$user_id' AND offer.id='$id'"
                )->fetch();

                $data = [
                    'status' => 0,
                ];
                $this->offer->table('offer_access_dealer', $offer_access_id['id'])->update($data, 'prepared');

                $individual_offer = $this->offer->query(
                    "SELECT offer.offer_name,
                    offer.id,
                    offer.offer_message,
                    offer.start_date,
                    offer.end_date,
                    dealer.name 
                    FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
                    INNER JOIN dealer ON offer_access_dealer.dealer_id=dealer.id 
                    INNER JOIN users ON dealer.id=users.dealer_id  WHERE users.id='$user_id' AND offer.id='$id'"
                )->fetch();


                $individual_offer_files = $this->offer->query(
                    "SELECT offer.offer_name,
                    offer.id,
                    offer.offer_message,
                    offer.start_date,
                    offer.end_date,
                    offer_file_path.id as offer_file_id ,
                    offer_file_path.offer_file ,
                    dealer.name 
                    FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
                    LEFT JOIN offer_file_path ON offer.id=offer_file_path.offer_id
                    LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id
                    INNER JOIN users ON dealer.id=users.dealer_id 
                    WHERE users.id='$user_id' AND offer.id='$id' ORDER BY offer.id DESC"

                )->fetchAll();
            }
        } elseif ($roule_id == 6) {
            if (!empty($id)) {
                $offer_access_id = $this->offer->query(
                    "SELECT  
                     offer_access_retrailer.id
                     FROM offer INNER JOIN offer_access_retrailer ON offer.id=offer_access_retrailer.offer_id 
                     INNER JOIN retailer ON offer_access_retrailer.retrailer_id=retailer.id 
                     INNER JOIN users ON retailer.id=users.dealer_id  WHERE users.id='$user_id' AND offer.id='$id'"

                )->fetch();

                $data = [
                    'status' => 0,
                ];
                $this->offer->table('offer_access_retrailer', $offer_access_id['id'])->update($data, 'prepared');

                $individual_offer = $this->offer->query(
                    "SELECT offer.offer_name,
                    offer.id,
                    offer.offer_message,
                    offer.start_date,
                    offer.end_date,
                    retailer.name 
                    FROM offer LEFT JOIN offer_access_retrailer ON offer.id=offer_access_retrailer.offer_id 
                    INNER JOIN retailer ON offer_access_retrailer.retrailer_id=retailer.id 
                    INNER JOIN users ON retailer.id=users.dealer_id  WHERE users.id='$user_id' AND offer.id='$id'"
                )->fetch();

                $individual_offer_files = $this->offer->query(
                    "SELECT offer.offer_name,
                    offer.id,
                    offer.offer_message,
                    offer.start_date,
                    offer.end_date,
                    offer_file_path.id as offer_file_id ,
                    offer_file_path.offer_file ,
                    retailer.name 
                    FROM offer LEFT JOIN  offer_access_retrailer ON offer.id= offer_access_retrailer.offer_id 
                    LEFT JOIN offer_file_path ON offer.id=offer_file_path.offer_id
                    LEFT JOIN  retailer ON offer_access_retrailer.retrailer_id= retailer.id
                    INNER JOIN users ON retailer.id=users.dealer_id  
                    WHERE users.id='$user_id' AND offer.id='$id' ORDER BY offer.id DESC"
                )->fetchAll();
            }
        } elseif ($roule_id == 1 || $roule_id == 2) {
            $individual_offer = $this->offer->query(
                "SELECT offer.offer_name,
                offer.id,
                offer.offer_message,
                offer.start_date,
                offer.end_date,
                dealer.name 
                FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
                LEFT JOIN dealer ON offer_access_dealer.dealer_id=dealer.id WHERE offer.id='$id' "
            )->fetch();
            $individual_offer_files = $this->offer->query(
                "SELECT offer.offer_name,
                offer.id,
                offer.offer_message,
                offer.start_date,
                offer.end_date,
                offer_file_path.id as offer_file_id ,
                offer_file_path.offer_file 
                FROM offer 
                LEFT JOIN offer_file_path ON offer.id=offer_file_path.offer_id
                WHERE offer.id='$id' ORDER BY offer.id DESC"
            )->fetchAll();
        }


        return view('offer/individual_notification_show', compact('individual_offer', 'individual_offer_files'));
    }
    public function individual_offer_pdf_show($id)
    {
        $pdf = $this->offer->query("SELECT * FROM offer_file_path WHERE id='$id' ")->fetch();

        return view('offer/show_pdf', compact('pdf'), [], false);
    }

    public function individual_offer_delete()
    {
        $roule_id = session('role_id');
        if ($_POST['id']) {
            if ($roule_id == 5) {
                $id = $_POST['id'] ?? null;
                $delete_access_dealer = $this->offer->table('offer_access_dealer')->where('id', $id)->delete();
            } elseif ($roule_id == 6) {
                $id = $_POST['id'] ?? null;
                $delete_access_dealer = $this->offer->table('offer_access_retrailer')->where('id', $id)->delete();
            }
            if (!empty($delete_access_dealer)) {
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            } else echo 0;
        }
    }
    public function individual_offer_notification_view()
    {
        return view('offer/individual_notification_show');
    }
    public function individual_offer_retrailer_show($id)
    {
        $individual_offer = $this->offer->query(
            "SELECT offer.offer_name,
            offer.id,
            offer.offer_message,
            offer.start_date,
            offer.end_date,
            retailer.name 
            FROM offer LEFT JOIN offer_access_retrailer ON offer.id=offer_access_retrailer.offer_id 
            LEFT JOIN  retailer ON offer_access_retrailer.retrailer_id=retailer.id WHERE offer.id='$id' "
        )->fetch();

        $individual_offer_files = $this->offer->query(
            "SELECT offer.offer_name,
            offer.id,
            offer.offer_message,
            offer.start_date,
            offer.end_date,
            offer_file_path.id as offer_file_id ,
            offer_file_path.offer_file ,
            retailer.name 
            FROM offer LEFT JOIN offer_access_retrailer ON offer.id=offer_access_retrailer.offer_id 
            LEFT JOIN offer_file_path ON offer.id=offer_file_path.offer_id
            LEFT JOIN retailer ON offer_access_retrailer.retrailer_id=retailer.id WHERE offer.id='$id' ORDER BY offer.id DESC"
        )->fetchAll();

        return view('offer/individual_retrailer_show', compact('individual_offer', 'individual_offer_files'));
    }
}