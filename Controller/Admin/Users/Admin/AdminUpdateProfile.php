<?php




class AdminUpdateProfile extends UpdateProfile{

    private $name;
    private $email;
    private $phone;
    private $address;

    private $admin_id;

    public function __construct($name,$email,$phone,$address,$admin_id){

        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->admin_id = $admin_id;

    }

    public function Checking(){

        $this->CheckingName($this->name,'/SchoolMangmentSystem/index.php/Users/Admin');
        $this->CheckingEmail($this->email,'Admins','/SchoolMangmentSystem/index.php/Users/Admin');
        HeaderCheckingPhoneNumber($this->phone,'Controller\Admin\Users\Admin\index.php');
        $this->UpdateAdmin();


    }


    private function UpdateAdmin(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $user_id = $db->GetDataFromFromDatabase('Admins',['admin_id__in'=>$this->admin_id])[0]['user_id'];

        $Columns = ['name','email','address','phone_number'];

        $Values = [$this->name,$this->email,$this->address,$this->phone];

        $db->UpdateDataFromDatabase('Admins',$Columns,$Values,'admin_id',$this->admin_id);

        $db->UpdateDataFromDatabase('users',$Columns,$Values,'id',$user_id);


    }



}



$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Address = $_POST['Address'];
$Admin_id = $_POST['admin_id'];


$AdminUpdateProfile = new AdminUpdateProfile($Name,$Email,$Phone,$Address,$Admin_id);

$AdminUpdateProfile->Checking();


$Confirm = 'Admin updated successful';

header("location:/SchoolMangmentSystem/index.php/Users/Admin?Update=".urlencode($Confirm));
?>