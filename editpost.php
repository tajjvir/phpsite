<?php

require_once 'db/conn.php';

//Get values from post operation

if(isset($_POST['submit'])){
    //extract values from the $_POST array\
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dateofbirth = $_POST['dob'];
    $emailaddress = $_POST['email'];
    $contactnumber = $_POST['phone'];
    $specialty_id = $_POST['specialty'];

//Call crud function
$result = $crud->editAttendee($id, $firstname, $lastname, $dateofbirth, $emailaddress, $contactnumber, $specialty_id);

//Redirect to index.php
if($result){
    header("Location: viewrecords.php");
    }
    else{

        echo 'error';
    }
}
else{

    echo 'error';

}


?>