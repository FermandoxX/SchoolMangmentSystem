<head>
<link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/Partials/Create.css'>
<link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/Users/Teacher/CreateTeacher.css'>
<script src = "/SchoolMangmentSystem/JS/Create.js"></script>    
<script src = "/SchoolMangmentSystem/JS/SubjectHeader.js"></script>    


</head>
<body>

<div class="CreateDiv">
<div class="DivCreateHeader">
        <h2 class="CreateAdminHeaderParagraph">Create <?=$header?></h2>
        <i class="fa fa-close close" style="color:white; cursor:pointer;"></i>
        
</div>
<?php

         for ($i=0; $i < $length ; $i++) { 
        echo "<form class='DivCreateAdminBody' method='post' action='/SchoolMangmentSystem/index.php/Users/TeacherCreate'>";
         echo
         "<div class='CreateAdminBodyDiv'>
         <p class='CreateAdminBodyParagraph'>$Colums_name[$i]</p>
         <input type='text' class='CreateAdminBodyInput'  name='$Colums_name[$i]' required>
         <p class='CreateAdminBodyLowParagraph'>Provide Teacher $Colums_name[$i]</p>
         </div>";
        }
        echo  '<div class="SubjectDiv">
               <div class="SubjectHeader">
               Subject
               </div>
               <div class="CheckboxDiv">
        ';
        foreach($Subject as $row){
       echo '<input type="checkbox" name=Subject[] value='.$row['subject_id'].'>
        <label for="vehicle1"> '.$row['subject_name'].'</label>
        <br>';
        }
       echo '</div>
       </div>';

        echo  "<button class='CreateAdminBodyButton'>Create Teacher</button>
        </form>";

    ?>

</div>


</body>
</html>