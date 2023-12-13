<?php

$Colums_name = array('Name','Email','Password','Phonenumber','Address');

$length = count($Colums_name);

$header = 'Manage Parents';

$CreatButtonName = "Create Parents";

$TableName = 'v_parent';

$SearchAction = "/SchoolMangmentSystem/index.php/Users/ParentsSearch";

$PrimaryKeyofTable = 'parent_id';

$table_name_of_class_or_subject = 'student';

$null_column = ['parent_id'];

$create_action = "/SchoolMangmentSystem/index.php/Users/ParentsCreate";


$Index = new index($Colums_name,$header,$CreatButtonName,$TableName,$SearchAction,$PrimaryKeyofTable,"View/Admin/Users/Parent/view.index.php",$table_name_of_class_or_subject,$null_column);

    
if(isset($_GET['Error'])){

    $Index->error_process_data($_GET['Error']);

}

if(isset($_GET['ParentsCreated'])){

    $Index->correct_process_data($_GET['ParentsCreated']);

}

if(isset($_GET['ParentsDelete'])){

    $Index->correct_process_data($_GET['ParentsDelete']);

}

if(isset($_GET['ParentsUpdate'])){

    $Index->correct_process_data($_GET['ParentsUpdate']);

}

$Index->process_data();




?>
