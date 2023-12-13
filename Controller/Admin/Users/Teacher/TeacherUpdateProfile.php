<?php

class TeacherUpdateProfile extends UpdateProfile{

    private $name;
    private $email;
    private $phone;
    private $address;
    private $teacher_id;
    private $teacher_subjects;
    private $other_subjects;



    public function __construct($name,$email,$phone,$address,$teacher_id,$teacher_subjects = [],$other_subjects = []){

     
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->teacher_id = $teacher_id;
        $this->teacher_subjects = $teacher_subjects;
        $this->other_subjects = $other_subjects;

    }


    public function checking(){

        $this->CheckingName($this->name,'/SchoolMangmentSystem/index.php/Users/Teacher');
        $this->CheckingEmail($this->email,'teachers','/SchoolMangmentSystem/index.php/Users/Teacher');
        HeaderCheckingPhoneNumber($this->phone,'Controller\Admin\Users\Teacher\index.php');
        $this->update_teacher_profile();
        $this->update_subject();


    }

    private function update_teacher_profile(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $db->UpdateDataFromDatabase('teachers',["name","email","phone_number","address"],
        [$this->name,$this->email,$this->phone,$this->address],'teacher_id',$this->teacher_id);

        $user_id = $db->GetDataFromFromDatabase('teachers',['teacher_id__in'=>$this->teacher_id])[0]['user_id'];

        $db->UpdateDataFromDatabase('users',["name","email","phone_number","address"],
        [$this->name,$this->email,$this->phone,$this->address],'id',$user_id);
    }


    private function update_subject(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);



        if(isset($this->teacher_subjects)){

            foreach($this->teacher_subjects as $teacher_subject){

                $db->UpdateDataFromDatabase('subject',['teacher_id'],[null],'subject_id',$teacher_subject);
    
            }

        }


        if(isset($this->other_subjects)){

          foreach($this->other_subjects as $other_subject){

            $db->UpdateDataFromDatabase('subject',['teacher_id'],[$this->teacher_id],'subject_id',$other_subject);
 
          }
        }



    }


}



$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Address = $_POST['Address'];
$teacher_id = $_POST['teacher_id'];
$teacher_subjects = $_POST['teacher_subjects'];
$other_subjects = $_POST['other_subjects'];

$TeacherUpdateProfile = new TeacherUpdateProfile($Name,$Email,$Phone,$Address,(int)$teacher_id,$teacher_subjects,$other_subjects);


$TeacherUpdateProfile->checking();

$Confirm = 'Teacher updated successful';

header("location:/SchoolMangmentSystem/index.php/Users/Teacher?TeacherUpdate=".urlencode($Confirm));



?>
