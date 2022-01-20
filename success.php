<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
      //extract values from the $_POST array\
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $dateofbirth = $_POST['dob'];
      $emailaddress = $_POST['email'];
      $contactnumber = $_POST['phone'];
      $specialty_id = $_POST['specialty'];
      

      //call function to insert and track if success or not\
      $isSuccess = $crud->insertAttendees($firstname, $lastname, $dateofbirth, $emailaddress, $contactnumber, $specialty_id);

      if($isSuccess){
        echo '<h1 class="text-center text-success">Your Have Been Successfully Registered!</h1>';
      }
      else{
        echo '<h1 class="text-center text-danger">There was an Error in Processing!</h1>';
      }
    
    
    }


?>





<!-- The Following code is used for POST Method-->

<div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Name: <?php echo $_POST['firstname'] . ' '. $_POST['lastname'];?></h5>
  <h5 class="card-title">Date of Birth: <?php echo $_POST['dob'];?></h5>
  <h5 class="card-title">Field of Expertise: <?php echo $_POST['specialty'];?></h5>
  <h5 class="card-title">Email: <?php echo $_POST['email'];?></h5>
  <h5 class="card-title">Contact Number: <?php echo $_POST['phone'];?></h5>
  </div>
</div>




