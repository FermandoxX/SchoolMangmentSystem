<?php
class AdminDelete{

    private $AdminId;
    private $UserId;


    public function __construct($AdminId) {

        $this->AdminId = $AdminId;
        
    }

    public function CheckingDelete(){

        $this->GetUserId();
        $this->DeleteData();


    }


    private function GetUserId() {
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $Admin = $db->GetDataFromFromDatabase('admins',['admin_id__in'=>$this->AdminId]);

        $this->UserId = $Admin[0]['user_id'];
       
    }

    private function DeleteData() {

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $db->DeleteDataFromDatabase(['admins','users'],['admin_id','id'],[$this->AdminId,$this->UserId]);

    }


    
}



$AdminId = $_GET['result'];

$AdminDelete = new AdminDelete($AdminId);

$AdminDelete->CheckingDelete();

$Confirm = 'Admin Delete';

header("location:/SchoolMangmentSystem/index.php/Users/Admin?Delete=".urlencode($Confirm));




?>