<?php 

class TeacherCreate {

    private $Name;
    private $Email;
    private $Password;
    private $PhoneNumber;
    private $Address;
    private $Subjcet = [];



    public function __construct($Name,$Email,$Password,$PhoneNumber,$Address,$Subjcet = []){



        $this->Name = $Name;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->PhoneNumber = $PhoneNumber;
        $this->Address = $Address;
        $this->Subjcet = $Subjcet;

    }

    public function Checking(){

        $this->CheckingSubject();
        HeaderCheckingPhoneNumber($this->PhoneNumber,'Controller\Admin\Users\Teacher\index.php');
        $this->CheckingPassword();
        $this->CheckingEmail();
        $this->insert_data_to_user();
        $this->insert_data_to_teacher();
        $this->insert_data_to_subject();


    }

    private function CheckingSubject(){

        if(empty($this->Subjcet)){

            $error = 'You havent check any class';

            header("location:/SchoolMangmentSystem/index.php/Users/Teacher?Error=".urlencode($error));

        }

    }

    

    private function CheckingPassword(){

        if(!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/',$this->Password)){

               $ErrorMessage = 'The Password need to have at least 7 letters one of them upper case and one symblo';
   
            header("location:location:/SchoolMangmentSystem/index.php/Users/Teacher?Error=".urlencode($ErrorMessage));

            exit();
           }
    }


    private function CheckingEmail(){
     
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);


       $GetAllData = $db->GetDataFromFromDatabase('users');
       $email = CreateArrayfromColumeinDB($GetAllData,'email');

       if(!filter_var($this->Email,FILTER_VALIDATE_EMAIL)){

        $error = 'The email isnt correct';

        header("location:/SchoolMangmentSystem/index.php/Users/Teacher?Error=".urlencode($error));

        exit();

    }

       if(in_array($this->Email,$email)){

        $error = 'The email exist';

        header("location:/SchoolMangmentSystem/index.php/Users/Teacher?Error=".urlencode($error));

        exit();

       }
        
    }

    private function insert_data_to_user(){
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $name = $this->Name;
        $email = $this->Email;
        $password = $this->Password;
        $phonenumber = $this->PhoneNumber;
        $address = $this->Address;
        $party_type_id = 2;

        $db->InsertDataToDatabase('users',['name','email','passwords','phone_number','address','party_type_id'],
        [$name,$email,$password,$phonenumber,$address,$party_type_id]);

    }

    private function get_user_id(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $name = $this->Name;
        $email = $this->Email;
        $password = $this->Password;
        $phonenumber = $this->PhoneNumber;
        $address = $this->Address;

        $user_id = $db->GetDataFromFromDatabase('users',['name__in'=>$name,'email__in'=>$email,
        'passwords__in'=>$password,'phone_number__in'=>$phonenumber,'address__in'=>$address])[0]['id'];

        return $user_id;

    }

    private function insert_data_to_teacher(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $name = $this->Name;
        $email = $this->Email;
        $password = $this->Password;
        $phonenumber = $this->PhoneNumber;
        $address = $this->Address;
        $user_id = $this->get_user_id();
        $party_type_id = 2;

        $db->InsertDataToDatabase('teachers',['name','email','password','phone_number','address','party_type_id','user_id'],
        [$name,$email,$password,$phonenumber,$address,$party_type_id,$user_id]);


    }

    private function get_teacher_id(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $name = $this->Name;
        $email = $this->Email;
        $password = $this->Password;
        $phonenumber = $this->PhoneNumber;
        $address = $this->Address;

        $teacher_id = $db->GetDataFromFromDatabase('teachers',['name__in'=>$name,'email__in'=>$email,
        'password__in'=>$password,'phone_number__in'=>$phonenumber,'address__in'=>$address])[0]['teacher_id'];

        return $teacher_id;

    }

    private function insert_data_to_subject(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $subjects = $this->Subjcet;
        $teacher_id = $this->get_teacher_id();


        foreach($subjects as $subject){

        $db->UpdateDataFromDatabase('subject',['teacher_id'],[$teacher_id],'subject_id',$subject);

        }

        $confirm = 'Teacher created successful';

        header("location:/SchoolMangmentSystem/index.php/Users/Teacher?TeacherCreated=".urlencode($confirm));



    }






}

$name = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$phonenumber = $_POST['Phonenumber'];
$address = $_POST['Address'];
$Subjcet = $_POST['Subject'];


$CreateTeacher = new TeacherCreate($name,$email,$password,$phonenumber,$address,$Subjcet);

$CreateTeacher->Checking();


?>