<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profile</title>
    <link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/index.css'>
    <link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/account.css'>


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

<div class="body">

<?php require BASE_PATH."View\partials\Admin\LeftBody.php" ?>

<div class="rightbody">

<div class="rightbodyUper">
<div>   
<i class="fas fa-cog" style="font-size: 35px; color:grey"></i>
<label style="font-size: 30px; font-weight:bold; color:grey; ">Manage Admin</label>
</div>
</div>
<div class="LowerBodyRight">
    <p style="color:#606060;">UPDATE ADMIN</p>

    <form method="post" action= <?= $UserUpdateLink ?> enctype="multipart/form-data">
    <div class="ProfileUpdate">

        <div style="display: none;">
        <input type="text" class="admin_id"  name="admin_id" value=<?= $AdminData[0]['admin_id']?> placeholder="admin_id" require>
        </div>
        <div>
        <label>Name</label>
        <input type="text" class="name"  name="Name" value=<?= $AdminData[0]['name']?> placeholder="Name" require>
        </div>

        <div>
        <label>Email</label>
        <input type="text" class="Email"  name="Email" value=<?= $AdminData[0]['email']?> placeholder="Email" required>
        </div>

        <div>
        <label>Phone</label>
        <input type="text" class="Phone"  name="Phone" value=<?= $AdminData[0]['phone_number']?> placeholder="Phone" required>
        </div>

        <div>
        <label>Address</label>
        <input type="text" class="Address"  name="Address" value=<?= $AdminData[0]['address']?> placeholder="Address" required>   
        </div> 


        <button class="UpdateUser">Update Admin</button>
    </div>
    </form>

</div>


<div class="LowerBodyRight2">
    <p style="color:#606060;">UPDATE ADMIN PASSWORD</p>
    <form method="post" action=<?= $PasswordUpdatLink ?> enctype="multipart/form-data">
<div class="PasswordUpdate">
<div style="display: none;">
        <input type="text" class="admin_id"  name="admin_id" value=<?= $AdminData[0]['admin_id']?> placeholder="admin_id" require>
        </div>
        <div>
        <label>Current Password</label>
        <input type="password" class="CurrentPassword"  name="CurrentPassword" placeholder="Current Password" required>
        </div>

        <div>
        <label>New Password</label>
        <input type="password" class="NewPassword"  name="NewPassword" placeholder="New Password" required>
        </div>

        <div>
        <label>Confirm Password</label>
        <input type="password" class="ConfirmPassword"  name="ConfirmPassword" placeholder="Confirm Password" required>
        </div>

        <button class="UpdatePassword">Update Admin Password</button>
</div>
    </form>
</div>

</div>
</div>    
</body>
</html>