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
    }
    public function create()
    {
        $users = $this->offer->table('users')->where('role_id', 5)->fetchAll();
        return view('offer/create', compact('users'));
    }
    public function getDealer()
    {
        $user_id = $_GET['user_id'];
        if ($user_id == 0) {
            $relailer = $this->offer->query("SELECT offerdealer.name,offerdealer.id FROM  offerdealer LEFT JOIN users ON offerdealer.user_id=users.id WhERE  users.role_id=5 ")->fetchAll();
        } else {
            $relailer = $this->offer->query("SELECT offerdealer.name,offerdealer.id
             FROM  offerdealer LEFT JOIN users ON offerdealer.user_id=users.id WHERE user_id='$user_id'")->fetchAll();
        }
        echo json_encode($relailer);
        exit();
    }

    public function index()
    {
        $offers = $this->offer->query(
            "SELECT offer.offer_name,
             offer.id,
             offer.offer_message,
             offer.start_date,
             offer.end_date,
             offerdealer.name 
             FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
             LEFT JOIN offerdealer ON offer_access_dealer.dealer_id=offerdealer.id  ORDER BY offer.id DESC")->fetchAll();
      
        return view('offer/index', compact('offers'));
    }


    public function store()
    {

        //dd($_POST);
        if ($_POST) {
            $offer_name = $_POST['offer_name'] ?? null;
            $offer_message = $_POST['offer_message'] ?? null;
            $start_date = $_POST['start_date'] ?? null;
            $end_date = $_POST['end_date'] ?? null;
            // $file_name = $_FILES['offer_file']['name'];
            // $file_size = $_FILES['offer_file']['size'];
            // $file_temp = $_FILES['offer_file']['tmp_name'];
            // $div = explode('.', $file_name);
            // $file_ext = strtolower(end($div));
            // $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            // $uploaded_image = "public/assets/uploads/" . $unique_image;
            // $upload = "uploads/" . $unique_image;
            // move_uploaded_file($file_temp, $uploaded_image);
            $data = [
                'offer_name' => $offer_name,
                'offer_message' => $offer_message,
                'start_date' => $start_date,
                'end_date' =>  $end_date,
                'create_date' => date('Y-m-d'),
            ];
            $data = $this->offer->table('offer')->insert($data);
            $offer_id = $this->offer->lastInsertId();
            $offer_file = isset($_FILES['offer_file']) ? $_FILES['offer_file'] : '';
            if (!empty($offer_file)) {
                for ($i = 0; $i < count($offer_file['name']); $i++) {
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
                }
            }
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
            if ($da) notification(['type' => 'success', 'message' => 'Created Successfully']);
            else notification(['type' => 'warning', 'message' => 'Created Error']);
        }

        return redirect('regular/offer/index');
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
        $user_id = session('user_id');
        $individual_offer = $this->offer->query(
            "SELECT offer.offer_name,
             offer.id,
             offer.offer_message,
             offer.start_date,
             offer.end_date,
             offer.create_date,
             offerdealer.name,
             offer_access_dealer.id as offer_access_dealer_id
             FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
             LEFT JOIN offerdealer ON offer_access_dealer.dealer_id=offerdealer.id WHERE offerdealer.user_id='$user_id' ORDER BY offer.id DESC " )->fetchAll();
     
        // dd($individual_offer);

        return view('offer/individual_offer', compact('individual_offer'));
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
             LEFT JOIN offerdealer ON offer_access_dealer.dealer_id=offerdealer.id WHERE offerdealer.user_id='$user_id' " )->fetchAll();
       
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
        $count = $this->offer->query(
            "SELECT 
              COUNT(offer.id) as count_id
             FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
             LEFT JOIN offerdealer ON offer_access_dealer.dealer_id=offerdealer.id WHERE offerdealer.user_id='$user_id' AND  offer_access_dealer.status= 1 ")->fetchAll();
       

        echo json_encode($count);
        exit;
    }
    public function individual_offer_notification()
    {
        $user_id = session('user_id');
        $notification = $this->offer->query(
            "SELECT
             offer.id,
             offer.offer_name,
             offer.offer_message,
             offer.create_date,
             ofp.offer_file
             FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
             LEFT JOIN (SELECT * FROM offer_file_path  GROUP BY offer_id) AS ofp   ON offer.id=ofp.offer_id 
             LEFT JOIN offerdealer ON offer_access_dealer.dealer_id=offerdealer.id WHERE offerdealer.user_id='$user_id' AND offer_access_dealer.status=1 ORDER BY offer.id DESC  " )->fetchAll();
      
        //dd($notification);
        echo json_encode($notification);
        exit;
    }
    public function individual_offer_notification_show($id)
    {
        $user_id = session('user_id');

        if (!empty($id)) {
            $offer_access_id = $this->offer->query(
                "SELECT  
                 offer_access_dealer.id
                 FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
                 LEFT JOIN offerdealer ON offer_access_dealer.dealer_id=offerdealer.id WHERE offerdealer.user_id='$user_id' AND offer.id=' $id'  "
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
                offerdealer.name 
                FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
                LEFT JOIN offerdealer ON offer_access_dealer.dealer_id=offerdealer.id WHERE offer.id='$id' AND  offerdealer.user_id='$user_id' ")->fetch();
           
            $individual_offer_files = $this->offer->query(
            "SELECT offer.offer_name,
             offer.id,
             offer.offer_message,
             offer.start_date,
             offer.end_date,
             offer_file_path.offer_file ,
             offerdealer.name 
             FROM offer LEFT JOIN offer_access_dealer ON offer.id=offer_access_dealer.offer_id 
             LEFT JOIN offer_file_path ON offer.id=offer_file_path.offer_id
             LEFT JOIN offerdealer ON offer_access_dealer.dealer_id=offerdealer.id WHERE offer.id='$id' AND  offerdealer.user_id='$user_id' ORDER BY offer.id DESC")->fetchAll();
            
         
        }
        return view('offer/individual_notification_show', compact('individual_offer', 'individual_offer_files'));
    }
    public function individual_offer_pdf_show($id){
        $pdf = $this->offer->query("SELECT * FROM offer_file_path WHERE  id='$id' ")->fetch();
      
        return view('offer/show_pdf',compact('pdf'),[],false);
      

    }
    public function individual_offer_delete()
    {
        if ($_POST['id']) {

            $id = $_POST['id'] ?? null;
            $delete_access_dealer = $this->offer->table('offer_access_dealer')->where('id', $id)->delete();
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
}
