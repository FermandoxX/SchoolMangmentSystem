<?php
    $connection = require BASE_PATH.'Model/DatabaseConnection.php';
    $db = new Database($connection);


    class AccountUpdate{

        private $Name;
        private $Email;
        private $Phone;
        private $Image;
        private $AllEmail = [];
        private $PictureName;
        private $Address;
        private $DataToUpdate;

       public function __construct($Name,$Email,$Phone,$Image,$Address){

        $this->Name = $Name;
        $this->Email = $Email;
        $this->Phone = $Phone;
        $this->Image = $Image;
        $this->Address = $Address;

        }

        public function Checking(){

            $this->CheckingName();
            $this->CheckingEmail();
            $this->CheckingPhoneNumber();
            $this->CheckingImage();
            $this->UpdateData();
            $this->InsterJson();


            
        }

        private function CheckingName(){

            if(!ctype_alpha($this->Name)){

                $error = 'The name need to be only with letters';

                require BASE_PATH.'Controller\Admin\account.php';

                exit();
            }
        }

        private function CheckingEmail(){

            $connection = require BASE_PATH.'Model/DatabaseConnection.php';
            $db = new Database($connection);

            if(!filter_var($this->Email,FILTER_VALIDATE_EMAIL)){

                ErrorText('The email isnt correct','Controller\Admin\account.php');

            }

           $email = GetDataFromJson('UserData')[0]['email'];
            
           $DataInDB = $db->GetDataFromFromDatabase('users',['email__not_in'=>$email]);
           $this->AllEmail = CreateArrayfromColumeinDB($DataInDB,'email');

           if(in_array($this->Email,$this->AllEmail)){

           ErrorText('Email exist','Controller\Admin\account.php');

           }
        }

        private function CheckingPhoneNumber() {

            if(!preg_match('/^(069|068|067)\d{7}$/',$this->Phone)){

                ErrorText('The phone number isnt correct','Controller\Admin\account.php');

            }
            
        }

        private function CheckingImage(){
            $img_exe = pathinfo($this->Image['name'],PATHINFO_EXTENSION);
            $img_exe_le = strtolower($img_exe);
            $allowed_exs = array("jpg","jpeg","png");

            if(!in_array($img_exe_le,$allowed_exs) || empty($img_exe)){
                $image = GetDataFromJson('UserData')[0]['image'];

                $this->PictureName = $image;

            }else{

                $this->Image($img_exe,$img_exe_le,$allowed_exs);
        
                
            }



        }
        private function Image($img_exe,$img_exe_le,$allowed_exs){

          

           
            if($this->Image['size'] > 225000){

                ErrorText('The file is to big','Controller\Admin\account.php');

                exit();
            }

            if(GetDataFromJson('UserData')[0]['image'] == null){
                $file_path ='Image/';
                $new_img_name = uniqid("IMG-",true).'.'.$img_exe_le;
                $image_upload_path = $file_path.$new_img_name;
                move_uploaded_file($this->Image['tmp_name'],$image_upload_path);

            }else{
                
                $file_path ='Image/';
                $new_img_name = uniqid("IMG-",true).'.'.$img_exe_le;
                unlink($file_path.GetDataFromJson('UserData')[0]['image']);
                $image_upload_path = $file_path.$new_img_name;
                move_uploaded_file($this->Image['tmp_name'],$image_upload_path);
            }

        

            $this->PictureName = $new_img_name;

        }



        
        private function UpdateData(){
            $connection = require BASE_PATH.'Model/DatabaseConnection.php';
            $db = new Database($connection);

            $PrimaryKeyValue = GetDataFromJson('UserData')[0]['id'];

            $this->DataToUpdate = [
               'NameOfTable'=>'users',
               'Columns'=>['name','email','image','phone_number','address'],
               'Values'=>[$this->Name,$this->Email,$this->PictureName,$this->Phone,$this->Address],
               'PrimaryKeyColumnName'=>'id',
               'PrimaryKeyValue'=> $PrimaryKeyValue
            ];

            $db->UpdateDataFromDatabase(
            $this->DataToUpdate['NameOfTable'],
            $this->DataToUpdate['Columns'],
            $this->DataToUpdate['Values'],
            $this->DataToUpdate['PrimaryKeyColumnName'],
            $this->DataToUpdate['PrimaryKeyValue']
            );
        }

        private function InsterJson(){
          
            RefrasheUserDataJson('email');

            ConfirmText('Account updated','Controller\Admin\account.php');

        }

    }

    if(!isset($_POST['Name']) || !isset($_POST['Email']) || !isset($_POST['Phone']) || !isset($_POST['Address'])){

        $error = 'One of the filed isnt present';

        require BASE_PATH.'View\Admin\account.view.php';

        exit();
    }

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $Image = $_FILES['my_img'];

    $Checking = new AccountUpdate($Name,$Email,$Phone,$Image,$Address);

    $Checking->Checking();




?>