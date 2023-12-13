<?php

session_start();

$Colums_name = array('Name','Email','Password','Phonenumber','Address');

$length = count($Colums_name);

$header = 'Manage Student';

$CreatButtonName = "Create Student";

$TableName = 'v_student';

$SearchAction = "/SchoolMangmentSystem/index.php/Users/StudentSearch";

$PrimaryKeyofTable = 'student_id';

$table_name_of_class_or_subject = 'classes';

$null_column = [];


if(isset($_POST['SerchInput'])){

SearchprocessData($Colums_name,$header,$CreatButtonName,$SearchAction,$_POST['SerchInput'],'View\Admin\Users\Student\view.index.php',$TableName,$PrimaryKeyofTable,$table_name_of_class_or_subject,$null_column);

}else{

$Search = $_SESSION['SerchInput'];

SearchprocessData($Colums_name,$header,$CreatButtonName,$SearchAction,$Search,'View\Admin\Users\Student\view.index.php',$TableName,$PrimaryKeyofTable,$table_name_of_class_or_subject,$null_column);


}


?>