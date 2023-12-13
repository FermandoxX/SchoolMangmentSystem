<?php

$student_id = $_GET['result'];

$connection = require BASE_PATH.'Model/DatabaseConnection.php';
$db = new Database($connection);

$student_data = $db->GetDataFromFromDatabase('student',['student_id__in'=>$student_id]);
$student_classes = $db->GetDataFromFromDatabase('classes',['classes_id__not_in'=>$student_data[0]['class_id']]);

$UserUpdateLink = '/SchoolMangmentSystem/index.php/Users/StudentUpdateProfile';
$PasswordUpdatLink = "/SchoolMangmentSystem/index.php/Users/StudentUpdatePassword";

require BASE_PATH."View/Admin/Users/Student/view.update.php";


?>