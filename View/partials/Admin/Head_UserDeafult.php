
<?php

$UserData = GetDataFromJson('UserData');

?>

<head>
<link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/index.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" charset="utf-8"></script>
<script src = "/SchoolMangmentSystem/JS/Admin.js"></script>    
</head>
<div class="head">
    <div>
    <img src="/SchoolMangmentSystem/Image/school-logo-graduation-icon-education-college-school-logo-school-logo-graduation-icon-education-college-school-logo-white-137290284.jpg" class="SchoolImage">
    <p style="color:white; font-size:23px">School name</p>
    </div>


    <div>
    <img src="/SchoolMangmentSystem/Image/<?= $UserData[0]['image'] ?>" class="PersonImage">
    <div class="AdminName">
    <p style="color:white;">Admin:<?= $UserData[0]['name'] ?></p>
    </div>
    </div>
</div>

<div class="UserDefault" style="display:none">
<a href="/SchoolMangmentSystem/index.php/account"><i class="fas fa-user-circle"></i>Account</a>
<a href="/SchoolMangmentSystem/"><i class="fas fa-right-from-bracket"></i>Log out</a>
</div>