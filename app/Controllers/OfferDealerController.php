<?php

namespace App\Controllers;

use App\Models\OfferDealer;
use App\Traits\GenerateList;
use Vendor\Valitron\Validator;

class OfferDealerController extends Controller
{
    use GenerateList;

    public $dealer;
    public function __construct()
    {
        parent::__construct();
        $this->dealer = new OfferDealer();
        if(session('user_lavel')==1){
            true;
        }else{
            redirect('auth/login');
        }
        
    }
    public function create()
    {
        $branchs = $this->dealer->table('branch')->fetchAll();
        $data = $this->dealer->table('offer_dealer_type')->fetchAll();


        return view('offer_dealer/create', compact('data','branchs'));
    }

    public function index()
    {
        $data = $this->dealer->dealer();
        $branchs = $this->dealer->table('branch')->fetchAll();
        return view('offer_dealer/index', compact('data','branchs'));
    }

    public function store()
    {
        if ($_POST) {
            $id = $_POST['id'] ?? null;
            $DealerAlise = $_POST['DealerAlias'] ?? null;
            $Dealer_Company_Name = $_POST['DealerName'] ?? null;
            $DealerDetails = $_POST['DealerDetails'] ?? null;
            $Address = $_POST['Address'] ?? null;
            $area=$_POST['area']?? null;
            $branch_id=$_POST['branch_id']?? NULL;
            $Thana = $_POST['thana'] ?? null;
            $District = $_POST['District'] ?? null;
            $Email = $_POST['Email'] ?? null;
            $Phone1 = $_POST['Phone1'] ?? null;
            $Phone2 = $_POST['Phone2'] ?? null;
            $Fax = $_POST['Fax'] ?? null;
            $data = [
                'id' => $id,
                'user_id' => session('user_id'),
                'dealeralise' => $DealerAlise,
                'name' => $Dealer_Company_Name,
                'dealerdetails' => $DealerDetails,
                'address' => $Address,
                'area'=>$area,
                'branch_id'=>$branch_id,
                'thana' => $Thana,
                'district' => $District,
                'email' => $Email,
                'Phone1' => $Phone1,
                'Phone1' => $Phone1,
                'Phone2' => $Phone2,
                'fax' => $Fax,
            ];



            if (!empty($id)) {
                $update = $this->dealer->table('offerdealer')->where('id', $id)->update($data);

                if (!empty($update)) {
                    notification(['type' => 'success', 'message' => 'Updated Successfully']);
                    echo json_encode($update);
                    exit();
                } else echo 0;
            } else {
                $data = $this->dealer->table('offerdealer')->insert($data);
                if ($data) notification(['type' => 'success', 'message' => 'Created Successfully']);
                else notification(['type' => 'warning', 'message' => 'Created Error']);
                return redirect('offer/dealer/index');
            }
        }

        return redirect('offer/dealer/index');
    }


    public function edit()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $where = "WHERE d.id = $id";
            $data = $this->dealer->dealeredit($where);


            if (!empty($data)) {
                echo json_encode($data);
            } else echo 0;
        } else {
            return view('offer/dealer/index');
        }
    }
    public function data()
    {
        $data = $this->dealer->table('offerdealer')->fetchAll();
        dd($data);
        echo json_encode($data);
    }

    public function delete()
    {
        if ($_POST['id']) {
            $id = $_POST['id'] ?? null;
            $delete = $this->dealer->table('offerdealer')->where('id', $id)->delete();
            if(!empty($delete)){
                notification(['type' => 'success', 'message' => 'Delete Successfully']);
                echo 1;
            }
            else echo 0;
        }
    }
}
