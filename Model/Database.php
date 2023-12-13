<?php

require_once BASE_PATH.'Model\DatabaseHelperFunction.php';

$connection = $connection[0];

class Database{


    private $connection;

    private $query;

    // private $data = [];


    public function __construct($config){
        
        $connection = http_build_query($config,'',' ');
        // var_dump('host=localhost port=5432 dbname=school_mangment_system user=postgres password=andi1234');
        // dd($connection);
        $this->connection = pg_connect('host=localhost port=5432 dbname=school_mangment_system user=postgres password=andi1234');
    }

    public function GetDataFromFromDatabase($NameOfTabel,$Condition = [],$Limit = [],$NulCon = [],$Operators = 'and'){

        $staitment = "";

        $staitmentnull = "";

        $data = [];

        $this->query = "Select * from $NameOfTabel";


    if(!empty($Condition)){

        $number = 1;

        foreach($Condition as $key => $value){

           $ArrayOperatorsAndNewKey  = condtion($key);

           $Column = $ArrayOperatorsAndNewKey[1];

           $Operator = $ArrayOperatorsAndNewKey[0][$key];

            $staitment.= " $Column $Operator $$number $Operators ";

            $number++;
        

        }
     
        $staitment = 'where'.$staitment;

        $this->query = "Select * from $NameOfTabel ".$staitment;   
        
        $this->query = rtrim($this->query, "$Operators ");
        
       }
       

       if(!empty($NulCon)){

        foreach($NulCon as $value){

            $staitmentnull.=" $Operators $value is null";
 
         }
         $this->query = $this->query .$staitmentnull;  
         
         $this->query = rtrim($this->query, "$Operators ");



         }

       if(!empty($Limit)){

        $staitment = "";

        foreach($Limit as $key => $value){

           $staitment.= " $key $value";

        }
     
        $this->query = $this->query .$staitment;  


       }


       $query = explode(" ",$this->query);

     if(isset($query[4])){

     if($query[4] != 'where'){

         array_splice($query, 4, 0, 'where');
        
     }


    }

    if(isset($query[5])){

        if($query[5] == 'and' || $query[5] == 'or'){

            unset($query[5]);
            
        }
   
   
       }


    $query = implode(' ',$query);

    $this->query = $query;
   

        $result = pg_query_params($this->connection, $this->query, $Condition);

        
        while ($row = pg_fetch_assoc($result)) {

            $data[] = $row;

        }

        return $data;

    }

    public function UpdateDataFromDatabase($name_of_table , $array_colums = [] ,$array_values = [],$primary_key_column_name,$primary_key_vlaue){
        
        for($i = 0; $i <  count($array_colums) ;$i++ ){

        $sql_query = "update $name_of_table set $array_colums[$i] = $1 where $primary_key_column_name = $2";
        
        pg_query_params($this->connection, $sql_query, array($array_values[$i],$primary_key_vlaue));

        }

    }

    public function DeleteDataFromDatabase($name_of_tables = [],$colume_in_table = [],$value_in_table = []){

        for($i = 0;$i < count($value_in_table);$i++){

        $sql_query = "delete from $name_of_tables[$i] where $colume_in_table[$i] = $1 ";

        pg_query_params($this->connection, $sql_query, array($value_in_table[$i]));

        }
    }


    public function InsertDataToDatabase($NameOfTable,$ArrayColums = [],$ArrayValues = []){

        $staitment = '';

        $Columns = '"'.implode('","',$ArrayColums).'"';

        for($i = 1;$i <= count($ArrayValues); $i++){

                $staitment .= '$'.$i.',';

        }

        $staitment = rtrim($staitment, ",");

        $sql_query = "insert into $NameOfTable ($Columns)values($staitment)";

        pg_query_params($this->connection, $sql_query, $ArrayValues);
    }

}


























?>