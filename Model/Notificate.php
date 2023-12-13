<?php

function ErrorText($Error,$path){

    $error = $Error;

    require BASE_PATH.$path;

    exit();

}

function ErrorNotificate($ErrorMessage){

    $error = $ErrorMessage;

    require BASE_PATH . 'View\partials\Notificate\Error.php';
    
}



function ConfirmText($Confirm,$path){

    $confirm = $Confirm;

    require BASE_PATH.$path;

    exit();

}

function ConfirmNotificate($ConfirmMessage){

    $confirm = $ConfirmMessage;

    require BASE_PATH . 'View\partials\Notificate\Confirm.php';
    
}










?>