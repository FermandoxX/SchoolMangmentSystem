<?php

$Colums_name = array('Name','Email','Password','Phonenumber','Address');

$length = count($Colums_name);

$header = 'Manage Admin';

$CreatButtonName = "Create Admin";

$TableName = 'admins';

$SearchAction = "/SchoolMangmentSystem/index.php/Users/AdminSearch";

$PrimaryKeyofTable = 'admin_id';


if(isset($_GET['Delete'])){

processData($Colums_name,$header,$CreatButtonName,$SearchAction,$_GET['Delete'],"View\Admin\Users\Admin\index.php",$TableName,$PrimaryKeyofTable);

 
}

if(isset($_GET['Update'])){

processData($Colums_name,$header,$CreatButtonName,$SearchAction,$_GET['Update'],"View\Admin\Users\Admin\index.php",$TableName,$PrimaryKeyofTable);

}


if(isset($_GET['Create'])){

processData($Colums_name,$header,$CreatButtonName,$SearchAction,$_GET['Create'],"View\Admin\Users\Admin\index.php",$TableName,$PrimaryKeyofTable);

}


if(isset($_GET['Error'])){

errorprocessData($Colums_name,$header,$CreatButtonName,$SearchAction,$_GET['Error'],"View\Admin\Users\Admin\index.php",$TableName,$PrimaryKeyofTable);

}



processData($Colums_name,$header,$CreatButtonName,$SearchAction,null,"View\Admin\Users\Admin\index.php",$TableName,$PrimaryKeyofTable);


?>