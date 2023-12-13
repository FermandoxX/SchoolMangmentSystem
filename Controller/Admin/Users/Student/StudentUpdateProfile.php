<?php


class StudentUpdateProfile extends UpdateProfile{

    private $name;
    private $email;
    private $phone;
    private $address;
    private $student_id;
    private $student_classes;



    public function __construct($name,$email,$phone,$address,$student_id,$student_classes = []){

     
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->student_id = $student_id;
        $this->student_classes = $student_classes;

    }


    public function checking(){

        $this->CheckingName($this->name,'/SchoolMangmentSystem/index.php/Users/Student');
        $this->CheckingEmail($this->email,'teachers','/SchoolMangmentSystem/index.php/Users/Student');
        HeaderCheckingPhoneNumber($this->phone,'Controller\Admin\Users\Teacher\index.php');
        $this->update_student_profile();
        $this->update_classes();


    }

    private function update_student_profile(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $db->UpdateDataFromDatabase('student',["name","email","phone_number","address"],
        [$this->name,$this->email,$this->phone,$this->address],'student_id',$this->student_id);

        $user_id = $db->GetDataFromFromDatabase('student',['student_id__in'=>$this->student_id])[0]['user_id'];

        $db->UpdateDataFromDatabase('users',["name","email","phone_number","address"],
        [$this->name,$this->email,$this->phone,$this->address],'id',$user_id);

    }

    private function update_classes(){

        
        if(isset($this->student_classes)){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $db->UpdateDataFromDatabase('student',['classes_id'],[$this->student_classes],'student_id',$this->student_id);
        }
    }

}





$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Address = $_POST['Address'];
$student_id = $_POST['student_id'];
$student_classes = $_POST['student_classes'];

$StudentUpdateProfile = new StudentUpdateProfile($Name,$Email,$Phone,$Address,(int)$student_id,$student_classes);
$StudentUpdateProfile->checking();


$Confirm = 'Student updated successful';

header("location:/SchoolMangmentSystem/index.php/Users/Student?StudentUpdate=".urlencode($Confirm));







?>