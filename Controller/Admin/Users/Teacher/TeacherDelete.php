<?php


class TeacherDelete {

    private $teacher_id;

    public function __construct($teacher_id){

        $this->teacher_id = $teacher_id;

    }

    public function checking(){

        $this->delete_teacher();

    }


    private function get_user_id(){
  
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $user_id = $db->GetDataFromFromDatabase('teachers',['teacher_id__in' => $this->teacher_id])[0]['user_id'];

        return $user_id;

    }

    private function delete_teacher(){
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);
        $user_id = $this->get_user_id();

        $db->UpdateDataFromDatabase('subject',['teacher_id'],[null],'teacher_id',$this->teacher_id);
        $db->DeleteDataFromDatabase(['teachers'],['teacher_id'],[(int)$this->teacher_id]);
        $db->DeleteDataFromDatabase(['users'],['id'],[$user_id]);
     
    }

}


$teacher_id = $_GET['result'];

$TeacherDelete = new TeacherDelete($teacher_id);

$TeacherDelete->checking();

$Confirm = 'Teacher Delete';

header("location:\SchoolMangmentSystem\index.php\Users\Teacher?TeacherDelete=".urlencode($Confirm));

