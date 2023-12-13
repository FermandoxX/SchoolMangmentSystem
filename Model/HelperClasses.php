<?php


class UpdateProfile{


    protected function CheckingName($name,$path){

        

        if(!ctype_alpha($name)){
            $ErrorMessage = 'The name need to be only with letters';

            header("location:$path?Error=".urlencode($ErrorMessage));

            exit();
        }
        
    }

    protected function CheckingEmail($user_email,$table_name,$path){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

       $DataInDB = $db->GetDataFromFromDatabase($table_name,['email__not_in'=>$user_email]);
       $email = CreateArrayfromColumeinDB($DataInDB,'email');

       
      if(!filter_var($user_email,FILTER_VALIDATE_EMAIL)){

        $ErrorMessage = 'The email isnt correct';

        header("location:$path?Error=".urlencode($ErrorMessage));

        exit();
     }


       if(in_array($user_email,$email)){
        $ErrorMessage = 'Email exist';

        header("location:$path?Error=".urlencode($ErrorMessage));

        exit();

       }



    }


}


class UpdatePassword {


    protected function CheckingPassword($table,$user_id_column,$user_id_value,$current_password){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $DataInDB = $db->GetDataFromFromDatabase($table,[$user_id_column.'__in'=>$user_id_value]);

        if($DataInDB[0]['password'] != $current_password){

               $ErrorMessage = 'The current password isnt correct';

            header("location:$this->error_path?Error=".urlencode($ErrorMessage));

            exit();

        }       


    }

    protected function CheckingNewPassword($new_password){

        if(!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/',$new_password)){

               $ErrorMessage = 'The Password need to have at least 7 letters one of them upper case and one symblo';
   
            header("location:$this->error_path?Error=".urlencode($ErrorMessage));

            exit();
           }
    }

    protected function CheckingNewPasswordandConfirmPassword($new_password,$confirm_password){

        if($new_password != $confirm_password){

            $ErrorMessage = 'New Password and confirm password isnt the same';
   
            header("location:$this->error_path?Error=".urlencode($ErrorMessage));

            exit();
        }
        
    }

    protected function UpdatePassword($password_column_name = [] ,$new_password ,$tables = [],$user_id_column = [],$user_id_value = []){
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);


        for($i=0; $i<count($tables); $i++){           

        $Columns = [$password_column_name[$i]];

        $Values = [$new_password];

        $db->UpdateDataFromDatabase($tables[$i],$Columns,$Values,$user_id_column[$i],$user_id_value[$i]);
        
        }
    }

}




class CreateUser{

    
    protected function CheckingPassword($password){

        if(!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/',$password)){

               $error = 'The Password need to have at least 7 letters one of them upper case and one symblo';
   
            header("location:$this->error_link?Error=".urlencode($error));

            exit();
           }
    }


    protected function CheckingEmail($email){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);


       $GetAllData = $db->GetDataFromFromDatabase('users');
       $emails = CreateArrayfromColumeinDB($GetAllData,'email');

       if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $error = 'The email isnt correct';

        header("location:$this->error_link?Error=".urlencode($error));

        exit();

    }

       if(in_array($email,$emails)){

        $error = 'The email exist';

        header("location:$this->error_link?Error=".urlencode($error));

        exit();

       }
        
    }



    protected function CheckingPhoneNumber($phonenumber){
    
        if(!preg_match('/^(069|068|067)\d{7}$/',$phonenumber)){
    
            $error = 'The phone number isnt correct';
    
            header("location:".$this->error_link."?Error=".urlencode($error));
    
        }
        
    }

}















class index {

    private $ColumnNameofCreate = [];
    private $Header;
    private $CreatButtonName;
    private $TableName;
    private $SearchAction;
    private $PrimaryKeyofTable;
    private $Subjcets;
    private $ViewPath;
    private $table_name_of_subject_or_class;
    private $null_column = [];


    public function __construct($ColumnNameofCreate,$Header,$CreatButtonName,$TableName,$SearchAction,$PrimaryKeyofTable,$ViewPath,$table_name_of_subject_or_class,$null_column){
        
        $this->ColumnNameofCreate = $ColumnNameofCreate;
        $this->Header = $Header;
        $this->TableName = $TableName;
        $this->SearchAction = $SearchAction;
        $this->PrimaryKeyofTable = $PrimaryKeyofTable;
        $this->ViewPath = $ViewPath;
        $this->CreatButtonName = $CreatButtonName;
        $this->table_name_of_subject_or_class = $table_name_of_subject_or_class;
        $this->null_column = $null_column;

    }

    public function process_data(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $Colums_name = $this->ColumnNameofCreate;

        $CreatButtonName = $this->CreatButtonName;
    
        $SearchAction = $this->SearchAction;
    
        $length = count($Colums_name);
     
        $pagi = new Pagi();
     
        $Pagination = $pagi->pagination_for_admins($this->TableName,5);
        
        $endpoint = endpoint($_SERVER['PATH_INFO']);
    
        $header = $this->Header;
    
        $Subject = $this->get_subjects_or_classes();
    
        $PrimaryKeyofTable = $this->PrimaryKeyofTable;
         
        require BASE_PATH.$this->ViewPath;
     
        exit();


    }


    public function correct_process_data($Notificate){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $Colums_name = $this->ColumnNameofCreate;

        $CreatButtonName = $this->CreatButtonName;
    
        $SearchAction = $this->SearchAction;
    
        $length = count($Colums_name);
     
        $pagi = new Pagi();
     
        $Pagination = $pagi->pagination_for_admins($this->TableName,5);
        
        $endpoint = endpoint($_SERVER['PATH_INFO']);
    
        $header = $this->Header;
    
        $Subject = $this->get_subjects_or_classes();
    
        $PrimaryKeyofTable = $this->PrimaryKeyofTable;

        $confirm = $Notificate;
         
        require BASE_PATH.$this->ViewPath;
     
        exit();


    }


    public function error_process_data($Notificate){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $Colums_name = $this->ColumnNameofCreate;

        $CreatButtonName = $this->CreatButtonName;
    
        $SearchAction = $this->SearchAction;
    
        $length = count($Colums_name);
     
        $pagi = new Pagi();
     
        $Pagination = $pagi->pagination_for_admins($this->TableName,5);
        
        $endpoint = endpoint($_SERVER['PATH_INFO']);
    
        $header = $this->Header;
    
        $Subject = $this->get_subjects_or_classes();
    
        $PrimaryKeyofTable = $this->PrimaryKeyofTable;

        $error = $Notificate;
         
        require BASE_PATH.$this->ViewPath;
     
        exit();


    }


    private function get_subjects_or_classes(){
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $Data = $db->GetDataFromFromDatabase($this->table_name_of_subject_or_class,[],[],$this->null_column);

        return $Data;
    }



}
















?>
