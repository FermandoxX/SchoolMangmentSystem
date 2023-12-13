<?php


class UpdatePassword{

    private $CurrentPassword;
    private $NewPassword;
    private $ConfirmePassword;
    private $DataToUpdate;

    public function __construct($CurrentPassword,$NewPassword,$ConfirmePassword) {
        
        $this->CurrentPassword = $CurrentPassword;
        $this->NewPassword = $NewPassword;
        $this->ConfirmePassword = $ConfirmePassword;

    }

    public function Checking(){


        $this->CheckingCurrentPassword();
        $this->CheckingNewPassword();
        $this->CheckingConfirmePassword();
        $this->UpdatePasswordUser();
        $this->UpdatePasswordAdmin();
        $this->RefreshJson();
        
    }

    private function CheckingCurrentPassword() {


       $Password = GetDataFromJson('UserData')[0]['passwords'];
       
       if($this->CurrentPassword != $Password){

        ErrorText('The current password isnt correct','Controller\Admin\account.php');

        exit();

       }
        
    }

    private function CheckingNewPassword(){

        if(!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/',$this->NewPassword)){

         ErrorText('The Password need to have at least 7 letters one of them upper case and one symblo','Controller\Admin\account.php');

         exit();

        }
    }

    private function CheckingConfirmePassword(){

        if($this->NewPassword != $this->ConfirmePassword){

            ErrorText('The confirme password isnt like new password','Controller\Admin\account.php');

            exit();

        }
        
    }

    private function UpdatePasswordUser(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $ValuesOfPrimaryKey = GetDataFromJson('UserData')[0]['id'];

        $this->DataToUpdate = [
            'NameOfTable' => 'users',
            'ArrayColumns' => ['passwords'],
            'ArrayValues' =>[$this->NewPassword],
            'PrimaryKeyColumnName'=>'id',
            'PrimaryKeyValue' => $ValuesOfPrimaryKey
        ];

        $db->UpdateDataFromDatabase($this->DataToUpdate['NameOfTable'],$this->DataToUpdate['ArrayColumns']
        ,$this->DataToUpdate['ArrayValues'],$this->DataToUpdate['PrimaryKeyColumnName'],
        $this->DataToUpdate['PrimaryKeyValue']);

    }

    private function UpdatePasswordAdmin(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $ValuesOfPrimaryKey = GetDataFromJson('UserData')[0]['id'];

        $this->DataToUpdate = [
            'NameOfTable' => 'admins',
            'ArrayColumns' => ['password'],
            'ArrayValues' =>[$this->NewPassword],
            'PrimaryKeyColumnName'=>'user_id',
            'PrimaryKeyValue' => $ValuesOfPrimaryKey
        ];

        $db->UpdateDataFromDatabase($this->DataToUpdate['NameOfTable'],$this->DataToUpdate['ArrayColumns']
        ,$this->DataToUpdate['ArrayValues'],$this->DataToUpdate['PrimaryKeyColumnName'],
        $this->DataToUpdate['PrimaryKeyValue']);

    } 

    private function RefreshJson() {

        
        RefrasheUserDataJson('email');
        

        ConfirmText('Password Update','Controller\Admin\account.php');

        exit();

    }


}

$CurrentPassword = $_POST['CurrentPassword'];
$NewPassword = $_POST['NewPassword'];
$ConfirmePassword = $_POST['ConfirmPassword'];



$ChekingPassword = new UpdatePassword($CurrentPassword,$NewPassword,$ConfirmePassword);

$ChekingPassword->Checking();

?>