<?php

session_start();

$Colums_name = array('Name','Email','Password','Phonenumber','Address');

$length = count($Colums_name);

$header = 'Manage Parent';

$CreatButtonName = "Create Parent";

$TableName = 'v_parent';

$SearchAction = "/SchoolMangmentSystem/index.php/Users/ParentsSearch";

$PrimaryKeyofTable = 'parent_id';

$table_name_of_class_or_subject = 'student';

$null_column = ['parent_id'];

if(isset($_POST['SerchInput'])){

SearchprocessData($Colums_name,$header,$CreatButtonName,$SearchAction,$_POST['SerchInput'],'View\Admin\Users\Parent\view.index.php',$TableName,$PrimaryKeyofTable,$table_name_of_class_or_subject,$null_column);

}else{

$Search = $_SESSION['SerchInput'];

SearchprocessData($Colums_name,$header,$CreatButtonName,$SearchAction,$Search,'View\Admin\Users\Parent\view.index.php',$TableName,$PrimaryKeyofTable,$table_name_of_class_or_subject,$null_column);


}


?>