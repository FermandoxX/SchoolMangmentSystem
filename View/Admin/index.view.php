<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/index.css'>

</head>
<body>

<?php require BASE_PATH."View\partials\Admin\Head_UserDeafult.php"?>

<div class="body">

<?php require BASE_PATH."View\partials\Admin\LeftBody.php" ?>

<div class="rightbody">

<div class="rightbodyUper">
<div>
<i class="fa-solid fa-chart-line" style="font-size: 35px; color:grey; padding-right:20px;"></i>
<label style="font-size: 30px; font-weight:bold; color:grey; ">Dashboard</label>
</div>
</div>


<div class="rightbodyLower">
<div style="display: flex; flex-direction: column; gap: 30px;">
<div class="student">
<div>
<i class="fa-solid fa-users" style="font-size:23px; color:gray; "></i>
<label style="color:gray; font-size:23px;">Student</label>
</div> 
<p style="font-size: 50px;color:gray; display:contents;">7</p>   
<p style="font-size: 20px;color:gray;">Number of Student</p>   
</div> 

<div class="teacher">
<div>
<i class="fa-solid fa-users" style="font-size:23px; color:gray"></i>
<label style="color:gray; font-size:23px;">Teacher</label>
</div>
<p style="font-size: 50px;color:gray; display:contents;">7</p>   
<p style="font-size: 20px;color:gray;">Number of Teachers</p>   

</div> 
</div>    

<div style="display: flex; flex-direction: column; gap: 30px;">
<div class="parent">
<div> 
<i class="fa-solid fa-users" style="font-size:23px; color:gray"></i>
<label style="color:gray; font-size:23px;">Parent</label>
</div>
<p style="font-size:50px; color:gray; display:contents;">7</p>   
<p style="font-size: 20px;color:gray;">Number of Parent</p>   

</div> 


<div class="staff">
<div>
<i class="fa-solid fa-users" style="font-size:23px; color:gray"></i>
<label style="color:gray; font-size:23px;">Staff</label>
</div>  
<p style="font-size: 50px; color:gray; display:contents;">7</p>  
<p style="font-size: 20px;color:gray;">Number of Staff</p>   

</div> 
</div>    


</div>


</div>


</div>    


</body>
</html>