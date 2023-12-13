<?php


class ParentUpdateProfile extends UpdateProfile{

    private $name;
    private $email;
    private $phone_number;
    private $address;
    private $parent_id;
    private $student_with_this_parent;
    private $student_with_no_parent;

    public function __construct($name,$email,$phone_number,$address,$parent_id,$student_with_this_parent,$student_with_no_parent){

        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->address = $address;
        $this->parent_id = $parent_id;
        $this->student_with_this_parent = $student_with_this_parent;
        $this->student_with_no_parent = $student_with_no_parent;

    }

    public function checking(){

        $this->CheckingName($this->name,'/SchoolMangmentSystem/index.php/Users/Parents');
        $this->CheckingEmail($this->email,'parent','/SchoolMangmentSystem/index.php/Users/Parents');
        HeaderCheckingPhoneNumber($this->phone_number,'Controller/Admin/Users/Parents/index.php');
        // $this->update_parent_profile();
        $this->student_with_this_parent();


    }


    private function update_parent_profile(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $db->UpdateDataFromDatabase('parent',["name","email","phone_number","address"],
        [$this->name,$this->email,$this->phone_number,$this->address],'parent_id',$this->parent_id);

        $user_id = $db->GetDataFromFromDatabase('parent',['parent_id__in'=>$this->parent_id])[0]['user_id'];

        $db->UpdateDataFromDatabase('users',["name","email","phone_number","address"],
        [$this->name,$this->email,$this->phone_number,$this->address],'id',$user_id);

    }


    private function student_with_this_parent(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        if(isset($this->student_with_this_parent)){

            foreach($this->student_with_this_parent as $student_with_this_parent){

                // $db->UpdateDataFromDatabase('student',[])

            }

        }

    }

}



$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Address = $_POST['Address'];
$parent_id = $_POST['parent_id'];
$student_with_this_parent = $_POST['student_with_this_parent'];
$student_with_no_parent = $_POST['student_with_no_parent'];

$ParentUpdateProfile = new ParentUpdateProfile($Name,$Email,$Phone,$Address,$parent_id,$student_with_this_parent,$student_with_no_parent);

$ParentUpdateProfile->checking();

// dp($parent_id);



?>