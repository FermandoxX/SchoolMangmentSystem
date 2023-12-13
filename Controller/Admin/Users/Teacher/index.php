<?php

// class index {

//     private $ColumnNameofCreate = [];
//     private $Header;
//     private $CreatButtonName;
//     private $TableName;
//     private $SearchAction;
//     private $PrimaryKeyofTable;
//     private $Subjcets;
//     private $ViewPath;


//     public function __construct($ColumnNameofCreate,$Header,$CreatButtonName,$TableName,$SearchAction,$PrimaryKeyofTable,$ViewPath){
        
//         $this->ColumnNameofCreate = $ColumnNameofCreate;
//         $this->Header = $Header;
//         $this->TableName = $TableName;
//         $this->SearchAction = $SearchAction;
//         $this->PrimaryKeyofTable = $PrimaryKeyofTable;
//         $this->ViewPath = $ViewPath;
//         $this->CreatButtonName = $CreatButtonName;

//     }

//     public function processData(){

//         $connection = require BASE_PATH.'Model/DatabaseConnection.php';
//         $db = new Database($connection);

//         $Colums_name = $this->ColumnNameofCreate;

//         $CreatButtonName = $this->CreatButtonName;
    
//         $SearchAction = $this->SearchAction;
    
//         $length = count($Colums_name);
     
//         $pagi = new Pagi();
     
//         $Pagination = $pagi->pagination_for_admins($this->TableName,5);
        
//         $endpoint = endpoint($_SERVER['PATH_INFO']);
    
//         $header = $this->Header;
    
//         $Subject = $this->Subjects();
    
//         $PrimaryKeyofTable = $this->PrimaryKeyofTable;
         
//         require BASE_PATH.$this->ViewPath;
     
//         exit();


//     }


//     public function CorrectProcessData($Notificate){

//         $connection = require BASE_PATH.'Model/DatabaseConnection.php';
//         $db = new Database($connection);

//         $Colums_name = $this->ColumnNameofCreate;

//         $CreatButtonName = $this->CreatButtonName;
    
//         $SearchAction = $this->SearchAction;
    
//         $length = count($Colums_name);
     
//         $pagi = new Pagi();
     
//         $Pagination = $pagi->pagination_for_admins($this->TableName,5);
        
//         $endpoint = endpoint($_SERVER['PATH_INFO']);
    
//         $header = $this->Header;
    
//         $Subject = $this->Subjects();
    
//         $PrimaryKeyofTable = $this->PrimaryKeyofTable;

//         $confirm = $Notificate;
         
//         require BASE_PATH.$this->ViewPath;
     
//         exit();


//     }


//     public function ErrorProcessData($Notificate){

//         $connection = require BASE_PATH.'Model/DatabaseConnection.php';
//         $db = new Database($connection);

//         $Colums_name = $this->ColumnNameofCreate;

//         $CreatButtonName = $this->CreatButtonName;
    
//         $SearchAction = $this->SearchAction;
    
//         $length = count($Colums_name);
     
//         $pagi = new Pagi();
     
//         $Pagination = $pagi->pagination_for_admins($this->TableName,5);
        
//         $endpoint = endpoint($_SERVER['PATH_INFO']);
    
//         $header = $this->Header;
    
//         $Subject = $this->Subjects();
    
//         $PrimaryKeyofTable = $this->PrimaryKeyofTable;

//         $error = $Notificate;
         
//         require BASE_PATH.$this->ViewPath;
     
//         exit();


//     }


//     private function get_subjects_or_classes(){
//         $connection = require BASE_PATH.'Model/DatabaseConnection.php';
//         $db = new Database($connection);

//         $Data = $db->GetDataFromFromDatabase('subject',[],[],['teacher_id']);

//         return $Data;
//     }



// }



$Colums_name = array('Name','Email','Password','Phonenumber','Address');

$length = count($Colums_name);

$header = 'Manage Teachers';

$CreatButtonName = "Create Teachers";

$TableName = 'v_teachers_and_subjects';

$SearchAction = "/SchoolMangmentSystem/index.php/Users/TeacherSearch";

$PrimaryKeyofTable = 'teacher_id';

$table_name_of_class_or_subject = 'subject';

$null_column = ['teacher_id'];

$Index = new index($Colums_name,$header,$CreatButtonName,$TableName,$SearchAction,$PrimaryKeyofTable,"View/Admin/Users/Teacher/view.index.php",$table_name_of_class_or_subject,$null_column);




if(isset($_GET['Error'])){

    $Index->error_process_data($_GET['Error']);

}

if(isset($_GET['TeacherCreated'])){

    $Index->correct_process_data($_GET['TeacherCreated']);

}

if(isset($_GET['TeacherDelete'])){

    $Index->correct_process_data($_GET['TeacherDelete']);

}

if(isset($_GET['TeacherUpdate'])){

    $Index->correct_process_data($_GET['TeacherUpdate']);

}

$Index->process_data();


// processData($Colums_name,$header,$CreatButtonName,$SearchAction,null,"View/Admin/Users/Teacher/view.index.php",$TableName,$PrimaryKeyofTable);



?>