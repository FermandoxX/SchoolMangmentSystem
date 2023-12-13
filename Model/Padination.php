<?php
class Pagi{

    public function pagination_for_admins($table_name,$number_per_page)
    {
    $email = GetDataFromJson('UserData')[0]['email'];   

    $connection = require BASE_PATH.'Model/DatabaseConnection.php';
    $db = new Database($connection);

    $data1 = $db->GetDataFromFromDatabase($table_name,['email__not_in'=> $email]);

    $number_of_rows = count($data1) ;

    
    if(isset($_GET['page'])){
    
        $page = $_GET['page'];
        
    }else{
        $page = 1;
    }
    
    $row_per_page = $number_per_page ;
    
    $start = ($page - 1) * $row_per_page;
    
    $page_of_table = ceil($number_of_rows/$row_per_page);
    
    $data = $db->GetDataFromFromDatabase($table_name,['email__not_in'=> $email],['limit'=>$row_per_page,'offset'=>$start]);
  
    $data = array('page' => $page ,'page_of_table' =>$page_of_table,'data' =>$data);
    
    return $data;

    }


    // public function pagination($dbname,$table_name,$number_per_page)
    // {

    // $Data = new Database();

    // $data1 = $Data->Get_Data_From_Database('select * from '.$table_name.'');   

    // $number_of_rows = count($data1) ;
    
    // if(isset($_GET['page'])){
    
    //     $page = $_GET['page'];
        
    // }else{
    //     $page = 1;
    // }
    
    // $row_per_page = $number_per_page ;
    
    // $start = ($page - 1) * $row_per_page;
    
    // $page_of_table = ceil($number_of_rows/$row_per_page);
    
    // $query = 'select * from '.$table_name.' limit '.$row_per_page.' offset '.$start.'';

    // $data = $Data->Get_Data_From_Database($query); 
    
    // $data = array('page' => $page ,'page_of_table' =>$page_of_table,'data' =>$data);
    

    // return $data;

    // }


    public function search_pagination($table_name,$number_per_page,$search = '')
    {

    $email = GetDataFromJson('UserData')[0]['email'];   

    $connection = require BASE_PATH.'Model/DatabaseConnection.php';
    $db = new Database($connection);

    $data1 = $db->GetDataFromFromDatabase($table_name,['email__not_in'=> $email,"{$table_name}.*::varchar__ilike"=>"%{$search}%"]);

    $number_of_rows = count($data1);
    
    if(isset($_GET['page'])){
    
        $page = $_GET['page'];
        
    }else{
        $page = 1;
    }
    
    $row_per_page = $number_per_page ;
    
    $start = ($page - 1) * $row_per_page;
    
    $page_of_table = ceil($number_of_rows/$row_per_page);
    
    $data = $db->GetDataFromFromDatabase($table_name,['email__not_in'=> $email,"{$table_name}.*::varchar__ilike"=>"%{$search}%"],['limit'=>$row_per_page,'offset'=>$start]);
    
    $data = array('page' => $page ,'page_of_table' =>$page_of_table,'data' =>$data);

    return $data;

    }
    
}

   

 


?>