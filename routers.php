<?php
$router->get('/SchoolMangmentSystem/','Controller/Login.php');
$router->get('/SchoolMangmentSystem/index.php/Home','Controller/Admin/index.php');
$router->get('/SchoolMangmentSystem/index.php/account','Controller/Admin/account.php');
$router->get('/SchoolMangmentSystem/index.php/accountupdate','Controller/Admin/accountupdate.php');
$router->get('/SchoolMangmentSystem/index.php/passwordupdate','Controller/Admin/passwordupdate.php');


$router->get('/SchoolMangmentSystem/index.php/Users/Admin','Controller/Admin/Users/Admin/index.php');
$router->get('/SchoolMangmentSystem/index.php/Users/AdminSearch','Controller/Admin/Users/Admin/AdminSearch.php');
$router->get('/SchoolMangmentSystem/index.php/Users/AdminDelete','Controller/Admin/Users/Admin/AdminDelete.php');
$router->get('/SchoolMangmentSystem/index.php/Users/AdminUpdate','Controller/Admin/Users/Admin/AdminUpdate.php');
$router->get('/SchoolMangmentSystem/index.php/Users/AdminCreate','Controller/Admin/Users/Admin/AdminCreate.php');
$router->get('/SchoolMangmentSystem/index.php/Users/AdminUpdateProfile','Controller/Admin/Users/Admin/AdminUpdateProfile.php');
$router->get('/SchoolMangmentSystem/index.php/Users/AdminUpdatePassword','Controller/Admin/Users/Admin/AdminUpdatePassword.php');


$router->get('/SchoolMangmentSystem/index.php/Users/Teacher','Controller/Admin/Users/Teacher/index.php');
$router->get('/SchoolMangmentSystem/index.php/Users/TeacherSearch','Controller/Admin/Users/Teacher/TeacherSearch.php');
$router->get('/SchoolMangmentSystem/index.php/Users/TeacherCreate','Controller/Admin/Users/Teacher/TeacherCreate.php');
$router->get('/SchoolMangmentSystem/index.php/Users/TeacherDelete','Controller/Admin/Users/Teacher/TeacherDelete.php');
$router->get('/SchoolMangmentSystem/index.php/Users/TeacherUpdate','Controller/Admin/Users/Teacher/TeacherUpdate.php');
$router->get('/SchoolMangmentSystem/index.php/Users/TeacherUpdateProfile','Controller/Admin/Users/Teacher/TeacherUpdateProfile.php');
$router->get('/SchoolMangmentSystem/index.php/Users/TeacherUpdatePassword','Controller/Admin/Users/Teacher/TeacherUpdatePassword.php');


$router->get('/SchoolMangmentSystem/index.php/Users/Student','Controller/Admin/Users/Student/index.php');
$router->get('/SchoolMangmentSystem/index.php/Users/StudentSearch','Controller/Admin/Users/Student/StudentSearch.php');
$router->get('/SchoolMangmentSystem/index.php/Users/StudentCreate','Controller/Admin/Users/Student/StudentCreate.php');
$router->get('/SchoolMangmentSystem/index.php/Users/StudentDelete','Controller/Admin/Users/Student/StudentDelete.php');
$router->get('/SchoolMangmentSystem/index.php/Users/StudentUpdate','Controller/Admin/Users/Student/StudentUpdate.php');
$router->get('/SchoolMangmentSystem/index.php/Users/StudentUpdateProfile','Controller/Admin/Users/Student/StudentUpdateProfile.php');
$router->get('/SchoolMangmentSystem/index.php/Users/StudentUpdatePassword','Controller/Admin/Users/Student/StudentUpdatePassword.php');


$router->get('/SchoolMangmentSystem/index.php/Users/Parents','Controller/Admin/Users/Parents/index.php');
$router->get('/SchoolMangmentSystem/index.php/Users/ParentsSearch','Controller/Admin/Users/Parents/ParentsSearch.php');
$router->get('/SchoolMangmentSystem/index.php/Users/ParentsCreate','Controller/Admin/Users/Parents/ParentsCreate.php');
$router->get('/SchoolMangmentSystem/index.php/Users/ParentsDelete','Controller/Admin/Users/Parents/ParentsDelete.php');
$router->get('/SchoolMangmentSystem/index.php/Users/ParentsUpdate','Controller/Admin/Users/Parents/ParentsUpdate.php');
$router->get('/SchoolMangmentSystem/index.php/Users/ParentsUpdateProfile','Controller/Admin/Users/Parents/ParentsUpdateProfile.php');
$router->get('/SchoolMangmentSystem/index.php/Users/ParentsUpdatePassword','Controller/Admin/Users/Parents/ParentsUpdatePassword.php');










?>