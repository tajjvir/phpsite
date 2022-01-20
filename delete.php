<?php

require_once 'db/conn.php';

if(!$_GET['id']){

    echo 'error';
}else{
    //Get ID Values
    $id = $_GET['id'];

    //Call Delete function

    $result = $crud->deleteAttendee($id);

    //Redirect to list
    if($result)
    {
        header("Location: viewrecords.php");
    }
    else{
        echo 'echo';
    }
}


?>