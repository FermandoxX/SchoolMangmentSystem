<?php

    $connection = require BASE_PATH.'Model/DatabaseConnection.php';

    $email = $_POST['email'];
    $password = $_POST['Password'];

    $db = new Database($connection);
    class CheckUser{

        private $DatainDB = [];
        private $email;
        private $password;
        


        public function __construct($DatainDB,$email,$password) {
            $this->DatainDB = $DatainDB;
            $this->email = $email;
            $this->password = $password;
        }

        public function Check(){

            $this->CheckingEmail();
            $this->CheckPassword();
            
        }


        private function CheckingEmail() {

            $email = CreateArrayfromColumeinDB($this->DatainDB,'email');

            if(!in_array($this->email,$email)){

                $error = "Email isnt right";

                require BASE_PATH. "\View\Login.view.php";
                
                exit();
            }
        }

        private function CheckPassword() {
            
            $password = CreateArrayfromColumeinDB($this->DatainDB,'passwords');

            if(!in_array($this->password,$password)){

                $error = "Password isnt right";

                require BASE_PATH. "\View\Login.view.php";

                exit();
            }
        }

    }




    $users = $db->GetDataFromFromDatabase('users');

    $User = new CheckUser($users,$email,$password);

    $User->Check();

    $UserData = $db->GetDataFromFromDatabase('users',['email__in'=>$email,'passwords__in'=>$password]);

    InsertDataInJson($UserData,'UserData');

    $UserData = GetDataFromJson('UserData');
    

    require BASE_PATH .'View/Admin/index.view.php';


?>