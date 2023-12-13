<?php

session_start();

$Colums_name = array('Name','Email','Password','Phonenumber','Address');

$length = count($Colums_name);

$CreatButtonName = "Create Admin";

$SearchAction = "/SchoolMangmentSystem/index.php/Users/AdminSearch";

$header = 'Manage Admin';

$TableName = 'admins';

$PrimaryKeyofTable = 'admin_id';

if(isset($_POST['SerchInput'])){

SearchprocessData($Colums_name,$header,$CreatButtonName,$SearchAction,$_POST['SerchInput'],"View\Admin\Users\Admin\index.php",$TableName,$PrimaryKeyofTable);

}else{

$Search = $_SESSION['SerchInput'];

SearchprocessData($Colums_name,$header,$CreatButtonName,$SearchAction,$Search,"View\Admin\Users\Admin\index.php",$TableName,$PrimaryKeyofTable);


}


?>