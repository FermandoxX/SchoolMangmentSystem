<?php

session_start();

$Colums_name = array('Name','Email','Password','Phonenumber','Address');

$length = count($Colums_name);

$header = 'Teachers';

$CreatButtonName = "Create Teachers";

$TableName = 'v_teachers_and_subjects';

$SearchAction = "/SchoolMangmentSystem/index.php/Users/TeacherSearch";

$PrimaryKeyofTable = 'teacher_id';

$table_name_of_class_or_subject = 'subject';

$null_column = ['teacher_id'];

if(isset($_POST['SerchInput'])){

SearchprocessData($Colums_name,$header,$CreatButtonName,$SearchAction,$_POST['SerchInput'],'View\Admin\Users\Teacher\view.index.php',$TableName,$PrimaryKeyofTable,$table_name_of_class_or_subject,$null_column);

}else{

$Search = $_SESSION['SerchInput'];

SearchprocessData($Colums_name,$header,$CreatButtonName,$SearchAction,$Search,'View\Admin\Users\Teacher\view.index.php',$TableName,$PrimaryKeyofTable,$table_name_of_class_or_subject,$null_column);


}


?>