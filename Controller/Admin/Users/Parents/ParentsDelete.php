<?php


class ParentDelete {

    private $parent_id;

    public function __construct($parent_id)
    {
        $this->parent_id = $parent_id;   
    }

    private function get_user_id($parent_id){
       
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $user_id = $db->GetDataFromFromDatabase('parent',['parent_id__in'=>$parent_id])[0]['user_id'];

        return $user_id;

    }


    public function delete_parent(){
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $user_id = $this->get_user_id($this->parent_id);

        $db->UpdateDataFromDatabase('student',['parent_id'],[null],'parent_id',$this->parent_id);
        $db->DeleteDataFromDatabase(['parent'],['parent_id'],[$this->parent_id]);
        $db->DeleteDataFromDatabase(['users'],['id'],[$user_id]);


    }

}



$parent_id = $_GET['result'];

$studentDelete = new ParentDelete($parent_id);

$studentDelete->delete_parent();

$Confirm = 'Parent Delete';

header("location:/SchoolMangmentSystem/index.php/Users/Parents?ParentsDelete=".urlencode($Confirm));











?>