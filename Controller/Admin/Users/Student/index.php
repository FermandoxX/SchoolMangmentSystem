<?php

$Colums_name = array('Name','Email','Password','Phonenumber','Address');

$length = count($Colums_name);

$header = 'Manage Student';

$CreatButtonName = "Create Student";

$TableName = 'v_student';

$SearchAction = "/SchoolMangmentSystem/index.php/Users/StudentSearch";

$PrimaryKeyofTable = 'student_id';

$table_name_of_class_or_subject = 'classes';

$null_column = [];

$create_action = "/SchoolMangmentSystem/index.php/Users/StudentCreate";


$Index = new index($Colums_name,$header,$CreatButtonName,$TableName,$SearchAction,$PrimaryKeyofTable,"View/Admin/Users/Student/view.index.php",$table_name_of_class_or_subject,$null_column);

    
if(isset($_GET['Error'])){

    $Index->error_process_data($_GET['Error']);

}

if(isset($_GET['StudentCreated'])){

    $Index->correct_process_data($_GET['StudentCreated']);

}

if(isset($_GET['StudentDelete'])){

    $Index->correct_process_data($_GET['StudentDelete']);

}

if(isset($_GET['StudentUpdate'])){

    $Index->correct_process_data($_GET['StudentUpdate']);

}

$Index->process_data();




?>