<head>
<link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/Partials/Create.css'>
<script src = "/SchoolMangmentSystem/JS/Create.js"></script>    
</head>
<body>

<div class="CreateDiv">
<div class="DivCreateHeader">
        <h2 class="CreateAdminHeaderParagraph">Create <?=$header?></h2>
        <i class="fa fa-close close" style="color:white; cursor:pointer;"></i>
        
</div>
<?php

         for ($i=0; $i < $length ; $i++) { 
        echo "<form class='DivCreateAdminBody' method='post' action='/SchoolMangmentSystem/index.php/Users/AdminCreate'>";
         echo
         "<div class='CreateAdminBodyDiv'>
         <p class='CreateAdminBodyParagraph'>$Colums_name[$i]</p>
         <input type='text' class='CreateAdminBodyInput'  name='$Colums_name[$i]' required>
         <p class='CreateAdminBodyLowParagraph'>Provide Admin $Colums_name[$i]</p>
         </div>";
        }
        echo  "<button class='CreateAdminBodyButton'>Create Admin</button>
        </form>";

    ?>

</div>


</body>
</html>