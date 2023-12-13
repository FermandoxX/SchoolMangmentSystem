<?php

class ParentCreate extends CreateUser{

    protected $error_link;
    protected $name;
    protected $password;
    protected $email;
    protected $phonenumber;
    protected $student_ids;
    protected $address;


    public function __construct($error_link,$name,$password,$email,$phonenumber,$address,$student_ids){

        $this->error_link = $error_link;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->address = $address;
        $this->student_ids = $student_ids;

    }

    public function checking(){


        $this->CheckingEmail($this->email);
        $this->CheckingPassword($this->password);
        $this->CheckingPhoneNumber($this->phonenumber);
        $this->insert_data_to_user();
        $this->insert_data_to_parent();
        $this->insert_data_to_student();


    }

    private function insert_data_to_user() {

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $name = $this->name;
        $email = $this->email;
        $password = $this->password;
        $phonenumber = $this->phonenumber;
        $address = $this->address;
        $party_type_id = 3;

        $db->InsertDataToDatabase('users',['name','email','passwords','phone_number','address','party_type_id'],
        [$name,$email,$password,$phonenumber,$address,$party_type_id]);

        
    }


    private function insert_data_to_parent(){

        
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $user_id = $db->GetDataFromFromDatabase('users',['email__in' => $this->email])[0]['id'];
        $name = $this->name;
        $email = $this->email;
        $password = $this->password;
        $phonenumber = $this->phonenumber;
        $address = $this->address;

        $db->InsertDataToDatabase('parent',[

            'name',
            'email',
            'password',
            'phone_number',
            'address',
            'user_id'
        ],
        [

            $name,
            $email,
            $password,
            $phonenumber,
            $address,
            $user_id

        ]);

    }


    private function insert_data_to_student(){


        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $parent_id = $db->GetDataFromFromDatabase('parent',['email__in' => $this->email])[0]['parent_id'];

        foreach($this->student_ids as $student_id){

        $db->UpdateDataFromDatabase('student',['parent_id'],[$parent_id],'student_id',$student_id);

        }
        $Confirm = 'Parent created successful';

        header("location:/SchoolMangmentSystem/index.php/Users/Parents?ParentsCreated=".urlencode($Confirm));


    }






}



$name = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$phonenumber = $_POST['Phonenumber'];
$address = $_POST['Address'];
$student_id = $_POST['Student'];
$error_link = '/SchoolMangmentSystem/index.php/Users/Parents';

$StudentCreate = new ParentCreate($error_link,$name,$password,$email,$phonenumber,$address,$student_id);

$StudentCreate->checking();

?>