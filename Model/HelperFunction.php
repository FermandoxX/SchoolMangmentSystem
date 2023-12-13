<?php



function dd($value){

    echo "<pre>";
    
    var_dump($value);
    
    echo "</pre>";
    
    die();
    
    }


function dp($value){

    echo "<pre>";
        
    var_dump($value);
        
    echo "</pre>";
            
    }


function CreateArrayfromColumeinDB($DataFromDB=[],$ColumeName){

    $a = [];

    foreach($DataFromDB as $row){

      array_push($a,$row[$ColumeName]);

    }

        return $a;
}    


function GetDataFromJson($FileName){

    $JsonData = file_get_contents('Json/'.$FileName.'.json');

    $Data = json_decode($JsonData,true);

    return $Data;


}

function InsertDataInJson($Data,$FileName){
    
    $TunrDataIntoJson = json_encode($Data,JSON_PRETTY_PRINT);

    file_put_contents('Json/'.$FileName.'.json',$TunrDataIntoJson);

}
        

function RefrasheUserDataJson($UniqColumn){
    $connection = require BASE_PATH.'Model/DatabaseConnection.php';
    $db = new Database($connection);

    $User = GetDataFromJson('UserData')[0]["$UniqColumn"];

    $UserData = (array)$db->GetDataFromFromDatabase('users',["{$UniqColumn}__in"=>$User]);

    InsertDataInJson($UserData,'UserData');

}




function endpoint($PathInfo){
    $path = $PathInfo;

    $parts = explode('/',$path);

   $length = count($parts);

   return $parts[$length - 1];
}



function SearchprocessData($Column_name = [],$Header,$CreatButton,$SearchActionPath,$SearchInput = null,$PathofView,$TableNameForPagination,$PrimaryKey,$table_name_of_subject_or_class = null,$null_column = null){

if(isset($table_name_of_subject_or_class)){    
$connection = require BASE_PATH.'Model/DatabaseConnection.php';
$db = new Database($connection);

$Subject = $db->GetDataFromFromDatabase($table_name_of_subject_or_class,[],[],$null_column);   

}

$Colums_name = $Column_name;

$CreatButtonName = $CreatButton;

$SearchAction = $SearchActionPath;

$length = count($Column_name);
    
$_SESSION['SerchInput'] = $SearchInput;

$Search = $_SESSION['SerchInput'];

$header = $Header;

$pagi = new Pagi();

$Pagination = $pagi->search_pagination($TableNameForPagination,5,$Search);

$endpoint = endpoint($_SERVER['PATH_INFO']);

$PrimaryKeyofTable = $PrimaryKey;
     
require BASE_PATH.$PathofView;


}

function processData($Column_name = [],$Header,$CreatButton,$SearchActionPath,$ConfirmeMessage = null,$PathofView,$TableNameForPagination,$PrimaryKey){

    $Colums_name = $Column_name;

    $CreatButtonName = $CreatButton;

    $SearchAction = $SearchActionPath;

    $length = count($Column_name);
 
    $pagi = new Pagi();
 
    $Pagination = $pagi->pagination_for_admins($TableNameForPagination,5);
    
    $endpoint = endpoint($_SERVER['PATH_INFO']);

    $header = $Header;

    $confirm = $ConfirmeMessage;

    $PrimaryKeyofTable = $PrimaryKey;
     
    require BASE_PATH.$PathofView;
 
    exit();
 
 }


 function errorprocessData($Column_name = [],$Header,$CreatButton,$SearchActionPath,$ErrorMessage,$PathofView,$TableNameForPagination,$PrimaryKey){

    $header = 'Manage Admin';

   $CreatButtonName = $CreatButton;

   $SearchAction = $SearchActionPath;

    $Colums_name  = $Column_name;

    $length = count($Column_name);
 
    $pagi = new Pagi();
 
    $Pagination = $pagi->pagination_for_admins($TableNameForPagination,5);
    
    $endpoint = endpoint($_SERVER['PATH_INFO']);

    $header = $Header;

    $error = $ErrorMessage;

    $PrimaryKeyofTable = $PrimaryKey;
     
    require BASE_PATH.$PathofView;
 
    exit();
 
 }


 function CheckingPhoneNumber($phonenumber,$PathForError) {

    if(!preg_match('/^(069|068|067)\d{7}$/',$phonenumber)){

        ErrorText('The phone number isnt correct',$PathForError);

    }
    
}


function HeaderCheckingPhoneNumber($phonenumber,$PathForError){

    
    if(!preg_match('/^(069|068|067)\d{7}$/',$phonenumber)){

        $error = 'The phone number isnt correct';

        header("location:".$PathForError."?Error=".urlencode($error));

    }
    
}








?>
