<?php



class AdminCreate {

    private $name;
    private $email; 
    private $password;
    private $phonenumber;
    private $address;

    public function __construct($name,$email,$password,$phonenumber,$address){

        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phonenumber = $phonenumber;
        $this->address = $address;
        
    }

    public function Checking(){

        $this->CheckingEmail();
        HeaderCheckingPhoneNumber($this->phonenumber,'Controller\Admin\Users\Admin\index.php');
        $this->InsertData();
        $this->GetUserId();
        $this->CreateAdmin();

    }

    private function CheckingEmail(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);


       $GetAllData = $db->GetDataFromFromDatabase('users');
       $email = CreateArrayfromColumeinDB($GetAllData,'email');

       if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){

        $error = 'The email isnt correct';

        header("location:/SchoolMangmentSystem/index.php/Users/Admin?Error=".urlencode($error));

        exit();

    }

       if(in_array($this->email,$email)){

        $error = 'The email exist';

        header("location:/SchoolMangmentSystem/index.php/Users/Admin?Error=".urlencode($error));

        exit();

       }
        
    }

    private function InsertData(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);


        $ArrayColumns = array('name','email','passwords','address','phone_number');

        $ArrayValues = array($this->name,$this->email,$this->password,$this->address,$this->phonenumber);

        $db->InsertDataToDatabase('users',$ArrayColumns,$ArrayValues);


    }

    private function GetUserId(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

       $InsertedUser = $db->GetDataFromFromDatabase('users',['email__in'=> $this->email]);

       $id = CreateArrayfromColumeinDB($InsertedUser,'id')[0];
   
       return $id;
        
    }

    private function CreateAdmin(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $UserId = $this->GetUserId();

        $ArrayColumns = array('user_id','party_type_id','name','email','password','address','phone_number');

        $ArrayValues = array($UserId,1,$this->name,$this->email,$this->password,$this->address,$this->phonenumber);

        $db->InsertDataToDatabase('Admins',$ArrayColumns,$ArrayValues);



    }


  

}


$name = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$phonenumber = $_POST['Phonenumber'];
$address = $_POST['Address'];


$AdminCreated = new AdminCreate($name,$email,$password,$phonenumber,$address);

$AdminCreated->Checking();

$Confirm = 'Admin created successful';

header("location:/SchoolMangmentSystem/index.php/Users/Admin?Create=".urlencode($Confirm));


?>