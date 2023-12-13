<?php


class StudentUpdatePassword extends UpdatePassword {

    private $current_password;
    private $new_password;
    private $confirm_password;
    private $student_id;
    // private $error_path;

    public function __construct($current_password,$new_password,$confirm_password,$student_id) {
        $this->current_password = $current_password;
        $this->new_password = $new_password;
        $this->confirm_password = $confirm_password;
        $this->student_id = $student_id;
        $this->error_path = "/SchoolMangmentSystem/index.php/Users/Student";

    }

    public function checking()
    {

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);
        $this->CheckingPassword('student','student_id',$this->student_id,$this->current_password);
        $this->CheckingNewPassword($this->new_password);
        $this->CheckingNewPasswordandConfirmPassword($this->new_password,$this->confirm_password);
        $user_id = $db->GetDataFromFromDatabase('student',['student_id__in'=>$this->student_id])[0]['user_id'];
        $this->UpdatePassword(['password','passwords'],$this->new_password,['student','users'],['student_id','id'],[$this->student_id,$user_id]);
        
    }


}

$CurrentPassword = $_POST['CurrentPassword'];
$NewPassword = $_POST['NewPassword'];
$ConfirmePassword = $_POST['ConfirmPassword'];
$student_id = $_POST['student_id'];

$StudentUpdatePassword = new StudentUpdatePassword($CurrentPassword,$NewPassword,$ConfirmePassword,$student_id);

$StudentUpdatePassword->checking();

$Confirm = 'Student password updated successful';

header("location:/SchoolMangmentSystem/index.php/Users/Student?StudentUpdate=".urlencode($Confirm));

?>