<?php

class StudentCreate extends CreateUser{

    protected $error_link;
    protected $name;
    protected $password;
    protected $email;
    protected $phonenumber;
    protected $address;
    protected $classes;

    public function __construct($error_link,$name,$password,$email,$phonenumber,$address,$classes){

        $this->error_link = $error_link;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->address = $address;
        $this->classes = $classes;

    }

    public function checking(){


        $this->CheckingEmail($this->email);
        $this->CheckingPassword($this->password);
        $this->CheckingPhoneNumber($this->phonenumber);
        $this->insert_data_to_user();
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
        $party_type_id = 4;

        $db->InsertDataToDatabase('users',['name','email','passwords','phone_number','address','party_type_id'],
        [$name,$email,$password,$phonenumber,$address,$party_type_id]);

        
    }


    private function insert_data_to_student(){

        
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $user_id = $db->GetDataFromFromDatabase('users',['email__in' => $this->email])[0]['id'];
        $name = $this->name;
        $email = $this->email;
        $password = $this->password;
        $phonenumber = $this->phonenumber;
        $address = $this->address;
        $class_id = $this->classes;

        $db->InsertDataToDatabase('student',[

            'name',
            'email',
            'password',
            'phone_number',
            'address',
            'user_id',
            'class_id'

        ],
        [

            $name,
            $email,
            $password,
            $phonenumber,
            $address,
            $user_id,
            $class_id

        ]);


        $confirm = 'Student created successful';

        header("location:/SchoolMangmentSystem/index.php/Users/Student?StudentCreated=".urlencode($confirm));



        

    }







}



$name = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$phonenumber = $_POST['Phonenumber'];
$address = $_POST['Address'];
$classes = $_POST['Classes'][0];
$error_link = '/SchoolMangmentSystem/index.php/Users/Student';

$StudentCreate = new StudentCreate($error_link,$name,$password,$email,$phonenumber,$address,$classes);

$StudentCreate->checking();





?>