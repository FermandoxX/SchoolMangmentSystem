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
<label style="font-size: 30px; font-weight:bold; color:grey; ">Manage Profile</label>
</div>
</div>
<div class="LowerBodyRight">
    <p style="color:#606060;">UPDATE PROFILE</p>

    <form method="post" action="/SchoolMangmentSystem/index.php/accountupdate" enctype="multipart/form-data">
    <div class="ProfileUpdate">
        <div>
        <label>Name</label>
        <input type="text" class="name"  name="Name" value=<?= GetDataFromJson('UserData')[0]['name']?> placeholder="Name" require>
        </div>

        <div>
        <label>Email</label>
        <input type="text" class="Email"  name="Email" value=<?= GetDataFromJson('UserData')[0]['email']?> placeholder="Email" required>
        </div>

        <div>
        <label>Phone</label>
        <input type="text" class="Phone"  name="Phone" value=<?= GetDataFromJson('UserData')[0]['phone_number']?> placeholder="Phone" required>
        </div>

        <div>
        <label>Address</label>
        <input type="text" class="Address"  name="Address" value=<?= GetDataFromJson('UserData')[0]['address']?> placeholder="Address" required>   
        </div> 

        <div class="accounting_image">
        <p class="image_paragraphe">Profile Image</p>
        <label for="my_img" class="custom_label">Upload Image</label>
        <input class="hidden_input" type="file" name="my_img" id="my_img" style="display:none;">
        </div>

        <button class="UpdateUser">Update Account</button>
    </div>
    </form>

</div>


<div class="LowerBodyRight2">
    <p style="color:#606060;">UPDATE PASSWORD</p>
    <form method="post" action="/SchoolMangmentSystem/index.php/passwordupdate" enctype="multipart/form-data">
<div class="PasswordUpdate">
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

        <button class="UpdatePassword">Update Password</button>
</div>
    </form>
</div>

</div>
</div>    
</body>
</html>