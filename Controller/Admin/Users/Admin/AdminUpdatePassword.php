<?php

class AdminUpdatePassword {

    private $Password;
    private $NewPassword;
    private $ConfirmPassword;
    private $AdminId;

    public function __construct($Password,$NewPassword,$ConfirmPassword,$AdminId){

        $this->Password = $Password;
        $this->NewPassword = $NewPassword;
        $this->ConfirmPassword = $ConfirmPassword;
        $this->AdminId = $AdminId;
    
    }

    public function Checking(){

        $this->CheckingPassword();
        $this->CheckingNewPassword();
        $this->CheckingNewPasswordandConfirmPassword();
        $this->UpdatePassword();

    }

    private function CheckingPassword(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $DataInDB = $db->GetDataFromFromDatabase('Admins',['admin_id__in'=>$this->AdminId]);

        if($DataInDB[0]['password'] != $this->Password){

               $ErrorMessage = 'The current password isnt correct';

            header("location:/SchoolMangmentSystem/index.php/Users/Admin?Error=".urlencode($ErrorMessage));

            exit();

        }       


    }

    private function CheckingNewPassword(){

        if(!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/',$this->NewPassword)){

               $ErrorMessage = 'The Password need to have at least 7 letters one of them upper case and one symblo';
   
            header("location:/SchoolMangmentSystem/index.php/Users/Admin?Error=".urlencode($ErrorMessage));

            exit();
           }
    }

    private function CheckingNewPasswordandConfirmPassword(){

        if($this->NewPassword != $this->ConfirmPassword){

            $ErrorMessage = 'New Password and confirm password isnt the same';
   
            header("location:/SchoolMangmentSystem/index.php/Users/Admin?Error=".urlencode($ErrorMessage));

            exit();
        }
        
    }

    private function UpdatePassword(){
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $Columns = ['password'];

        $Values = [$this->NewPassword];

        $db->UpdateDataFromDatabase('Admins',$Columns,$Values,'admin_id',$this->AdminId);
        $user_id = $db->GetDataFromFromDatabase('Admins',['admin_id__in'=>$this->AdminId])[0]['user_id'];
        $db->UpdateDataFromDatabase('users',$Columns,$Values,'id',$user_id);


        
    }

}

$CurrentPassword = $_POST['CurrentPassword'];
$NewPassword = $_POST['NewPassword'];
$ConfirmePassword = $_POST['ConfirmPassword'];
$AdminId = $_POST['admin_id'];

$AdminUpdatePassword = new AdminUpdatePassword($CurrentPassword,$NewPassword,$ConfirmePassword,$AdminId);

$AdminUpdatePassword->Checking();

$Confirm = 'Admin updated successful';

header("location:/SchoolMangmentSystem/index.php/Users/Admin?Update=".urlencode($Confirm));
?>