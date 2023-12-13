<?php


$id = $_GET['result'];


$connection = require BASE_PATH.'Model/DatabaseConnection.php';
$db = new Database($connection);

$AdminData = $db->GetDataFromFromDatabase('Admins',['admin_id__in'=>$id]);

$UserUpdateLink = "/SchoolMangmentSystem/index.php/Users/AdminUpdateProfile";
$PasswordUpdatLink = "/SchoolMangmentSystem/index.php/Users/AdminUpdatePassword";

require BASE_PATH."View/Admin/Users/Admin/Update.php";


?>