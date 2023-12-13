<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Teacher</title>
    <link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/index.css'>
    <link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/account.css'>
    <link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/Users/Teacher/UpdateTeacher.css'>
    <script src = "/SchoolMangmentSystem/JS/SubjectHeader.js"></script>    



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
<label style="font-size: 30px; font-weight:bold; color:grey; ">Manage Teacher</label>
</div>
</div>
<div class="LowerBodyRight">
    <p style="color:#606060;">UPDATE TEACHER</p>

    <form method="post" action= <?= $UserUpdateLink ?> enctype="multipart/form-data">
    <div class="ProfileUpdate">

        <div style="display: none;">
        <input type="text" class="teacher_id"  name="teacher_id" value=<?= $TeacherData[0]['teacher_id']?> placeholder="Teacher_id" require>
        </div>
        <div>
        <label>Name</label>
        <input type="text" class="name"  name="Name" value=<?= $TeacherData[0]['name']?> placeholder="Name" require>
        </div>

        <div>
        <label>Email</label>
        <input type="text" class="Email"  name="Email" value=<?= $TeacherData[0]['email']?> placeholder="Email" required>
        </div>

        <div>
        <label>Phone</label>
        <input type="text" class="Phone"  name="Phone" value=<?= $TeacherData[0]['phone_number']?> placeholder="Phone" required>
        </div>

        <div>
        <label>Address</label>
        <input type="text" class="Address"  name="Address" value=<?= $TeacherData[0]['address']?> placeholder="Address" required>   
        </div> 

       </div>

       <?php
       echo  '<div class="SubjectDiv">
       <div>
               <div class="teacher_subjects">
               Teacher subjects
               </div>
               <div class="teacher_subjects_checkbox_div">
        ';
        foreach($teacher_subjects as $row){
       echo '<input type="checkbox" name=teacher_subjects[] value='.$row['subject_id'].'>
        <label for="vehicle1"> '.$row['subject_name'].'</label>
        <br>';
        }
       echo '</div>
       </div>';

       echo '<div>
       <div class="other_subjects">
               Other subjects
               </div>
               <div class="other_subjects_checkbox_div">
        ';
        foreach($other_subjects as $row){
       echo '<input type="checkbox" name=other_subjects[] value='.$row['subject_id'].'>
        <label for="vehicle1"> '.$row['subject_name'].'</label>
        <br>';
        }
       echo '</div>
       </div>';
       echo '</div>';


        ?>
        <div class = 'UpdatePasswordButtonDiv'>
        <button class="UpdateUser">Update Teacher</button>
        </div>
    </form>

</div>


<div class="LowerBodyRight2">
    <p style="color:#606060;">UPDATE TEACHER PASSWORD</p>
    <form method="post" action=<?= $PasswordUpdatLink ?> enctype="multipart/form-data">
<div class="PasswordUpdate">
<div style="display: none;">
        <input type="text" class="Teacher_id"  name="Teacher_id" value=<?= $TeacherData[0]['teacher_id']?> placeholder="Teacher_id" require>
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

        <button class="UpdatePassword">Update Teacher Password</button>
      
</div>
    </form>
</div>

</div>
</div> 


<script>
   $(document).ready(function(){
    $(".teacher_subjects").click(function(){
        $(this).next(".teacher_subjects_checkbox_div").slideToggle("slow");
    });

    $(".other_subjects").click(function(){
        $(this).next(".other_subjects_checkbox_div").slideToggle("slow");
    });
});
    </script>
</body>
</html>