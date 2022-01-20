<?php
    $title = 'Single View Record';
    
    require_once 'includes/header.php';
    require_once 'db/conn.php';
   
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $result = $crud->getAttendeeDetails($id);
} else{
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
}

?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Name: <?php echo $result['firstname'] . ' '. $result['lastname'];?></h5>
  <h5 class="card-title">Date of Birth: <?php echo $result['dateofbirth'];?></h5>
  <h5 class="card-title">Field of Expertise: <?php echo $result['name'];?></h5>
  <h5 class="card-title">Email: <?php echo $result['emailaddress'];?></h5>
  <h5 class="card-title">Contact Number: <?php echo $result['contactnumber'];?></h5>
  </div>
</div>
<br>

<a href="viewrecords.php" class="btn btn-info">Back to List</a>
<a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
<a onclick="return confirm('Are you sure you want to delete?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>








<br>
<br>
<br>

    <?php require_once 'includes/footer.php' ?>