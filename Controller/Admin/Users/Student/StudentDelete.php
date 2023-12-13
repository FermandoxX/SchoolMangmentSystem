<?php


class StudentDelete {

    private $student_id;

    public function __construct($student_id){

        $this->student_id = $student_id;

    }

    public function checking(){

        $this->delete_student();

    }


    private function get_user_id(){

        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);

        $user_id = $db->GetDataFromFromDatabase('student',['student_id__in' => $this->student_id])[0]['user_id'];


        return $user_id;

    }

    private function delete_student(){
        $connection = require BASE_PATH.'Model/DatabaseConnection.php';
        $db = new Database($connection);
        $user_id = $this->get_user_id();

        $db->DeleteDataFromDatabase(['student'],['student_id'],[(int)$this->student_id]);
        $db->DeleteDataFromDatabase(['users'],['id'],[$user_id]);
     
    }

}


$student_id = $_GET['result'];

$studentDelete = new StudentDelete($student_id);

$studentDelete->checking();

$confirm = 'Student Delete';

header("location:\SchoolMangmentSystem\index.php\Users\Student?StudentDelete=".urlencode($confirm));

