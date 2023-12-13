<?php

$parent_id = $_GET['result'];

$connection = require BASE_PATH.'Model/DatabaseConnection.php';
$db = new Database($connection);

$parent_data = $db->GetDataFromFromDatabase('parent',['parent_id__in'=>$parent_id]);
$student_with_no_parent = $db->GetDataFromFromDatabase('student',['parent_id__not_in'=>$parent_id]);
$student_with_this_parent = $db->GetDataFromFromDatabase('student',['parent_id__in'=>$parent_id]);


$UserUpdateLink = '/SchoolMangmentSystem/index.php/Users/ParentsUpdateProfile';
$PasswordUpdatLink = "/SchoolMangmentSystem/index.php/Users/ParentsUpdatePassword";

require BASE_PATH."View/Admin/Users/Parent/view.update.php";


?>