<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profile</title>
    <link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/Users/Admin/index.css'>



</head>
<body>
<?php
      if(isset($error)){
       
        ErrorNotificate($error);
    }

    if(isset($confirm)){
       
        ConfirmNotificate($confirm);
    }
    
     ?>

<?php require BASE_PATH."View\partials\Admin\Head_UserDeafult.php"?>

<?php require BASE_PATH."View/partials/Admin/Users/CreateTeacher.php"?>


<div class="body">

<?php require BASE_PATH."View\partials\Admin\LeftBody.php" ?>

<div class="rightbody">

<div class="rightbodyUper">
<div>   
<i class="fas fa-cog" style="font-size: 35px; color:grey"></i>
<label style="font-size: 30px; font-weight:bold; color:grey; "><?=$header?></label>
</div>
<button class = "CreateAdminButton"><i class="fa-solid fa-plus" style="margin-right:10px;"></i><span><?= $CreatButtonName ?></span></button>
</div>

<div class="rightbodylowerAdmin">

<form class="search" action =<?= $SearchAction ?> method = "POST">
<div class="SerchDiv">
<label class="SearchLable">Search:</label>
<input type="text" name="SerchInput"></input>
<button class="SearchButton">Search</button>
</div>
</form>

<?php require BASE_PATH."View\partials\Admin\Users\TeacherTable.php" ?>

</div>

</div>
</div>    
</body>
</html>