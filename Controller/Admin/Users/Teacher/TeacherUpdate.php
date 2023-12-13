<?php

$teacher_id = $_GET['result'];

$connection = require BASE_PATH.'Model/DatabaseConnection.php';
$db = new Database($connection);

$TeacherData = $db->GetDataFromFromDatabase('teachers',['teacher_id__in'=>$teacher_id]);

$teacher_subjects = $db->GetDataFromFromDatabase('subject',['teacher_id__in'=>$teacher_id]);
$other_subjects = $db->GetDataFromFromDatabase('subject',['teacher_id__not_in'=>$teacher_id],[],['teacher_id'],'or');

$UserUpdateLink = '/SchoolMangmentSystem/index.php/Users/TeacherUpdateProfile';
$PasswordUpdatLink = "/SchoolMangmentSystem/index.php/Users/TeacherUpdatePassword";

require BASE_PATH."View/Admin/Users/Teacher/view.update.php";


?>