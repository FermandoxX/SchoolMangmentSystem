

<head> 
<link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/Users/Admin/index.css'>
</head>




<div>
<table class = "conteineradmin">
         
         <thead>
         <tr class = "tableheader">
 
             <th>Name</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Address</th>
             <th>Classes</th>
             <th>Subject</th>
             <th>Edit</th>

 
 
         </tr>
         </thead>
 
        <tbody class="admintablebody"> 

         <?php         
         
         foreach($Pagination['data'] as $row){
           echo "<tr>
                <td>{$row["name"]}</td>
                <td>{$row["email"]}</td>
                <td>{$row["phone_number"]}</td>
                <td>{$row["address"]}</td>
                <td>{$row["classes_name"]}</td>
                <td>{$row["subjects_name"]}</td>";
            echo'<td><a href ="/SchoolMangmentSystem/index.php/Users/StudentDelete?result='.$row[$PrimaryKeyofTable].'"><i class="fa fa-trash" style="font-size:18px; color:red; margin-right:5px; cursor:pointer;"></i></a><span>or</span><a 
            href ="/SchoolMangmentSystem/index.php/Users/StudentUpdate?result='.$row[$PrimaryKeyofTable].'"><i class="fa fa-edit"
                  style="font-size:18px; color:blue; margin-left:5px; cursor:pointer;"></i></a></td>';
         }
        ?>
        </tbody>
        </table>
          <div class='butones_arraow_div' style="display:flex; flex-flow:row; justify-content:flex-end; gap:15px; align-items:center; margin-top:40px; margin-right:40px">
            
            <?php

           if($Pagination['page']>1){
           
            echo "<div class='left_arrow'><a href='{$endpoint}?page=".($Pagination['page']-1)."'><i class='fas fa-angle-left' style = 'margin-right:0; cursor:pointer;'></i></a></div>";
            
           }

            ?>
            

            <?php

            for($i=1;$i<=$Pagination['page_of_table'];$i++){

             echo "<a href = '{$endpoint}?page=".$i."'><button style = 'width:30px; height:30px;  cursor:pointer; background-color:#57b846; border:none; color:white; border-radius:15px'>$i</button></a>";

            }

            ?>           
           
            
                
            <?php

             if($Pagination['page']<$i - 1){

             echo "<div class='right_arrow'><a href = '{$endpoint}?page=".($Pagination['page']+1)."'><i class='fas fa-angle-right' style = 'margin-right:0; cursor:pointer;'></i></a></div> ";
 
              }

            ?>
        
        </div>

</div>