<?php


class TeacherUpdatePassword extends UpdatePassword {

    private $current_password;
    private $new_password;
    private $confirm_password;
    private $teacher_id;


    public function __construct($current_password,$new_password,$confirm_password,$teacher_id) {
        $this->current_password = $current_password;
        $this->new_password = $new_password;
        $this->confirm_password = $confirm_password;
        $this->teacher_id = $teacher_id;
        $this->error_path = "/SchoolMangmentSystem/index.php/Users/Teacher";

    }

    public function checking()
    {

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);
        $this->CheckingPassword('teachers','teacher_id',$this->teacher_id,$this->current_password);
        $this->CheckingNewPassword($this->new_password);
        $this->CheckingNewPasswordandConfirmPassword($this->new_password,$this->confirm_password);
        $user_id = $db->GetDataFromFromDatabase('teachers',['teacher_id__in'=>$this->teacher_id])[0]['user_id'];
        $this->UpdatePassword(['password','passwords'],$this->new_password,['teachers','users'],['teacher_id','id'],[$this->teacher_id,$user_id]);
        
    }


}

$CurrentPassword = $_POST['CurrentPassword'];
$NewPassword = $_POST['NewPassword'];
$ConfirmePassword = $_POST['ConfirmPassword'];
$teacher_id = $_POST['Teacher_id'];

$TeacherUpdatePassword = new TeacherUpdatePassword($CurrentPassword,$NewPassword,$ConfirmePassword,$teacher_id);

$TeacherUpdatePassword->checking();

$Confirm = 'Teacher password updated successful';

header("location:/SchoolMangmentSystem/index.php/Users/Teacher?TeacherUpdate=".urlencode($Confirm));

?>