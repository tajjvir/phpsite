<?php
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getspecialties();

    if(!isset($_GET['id']))
    {
        echo 'error';
    }
    else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);



?>

    <h1 class="text-center">Edit Records</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>">
        
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
    </div>

    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>"id="dob" name="dob">
    </div>

    <div class="mb-3">
    <label for="specialty" class="form-label">Field of Expertise</label>
    <select class="form-control" id="specialty" name="specialty">
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php echo $r['specialty_id'] ?>"> <?php if($r['specialty_id'] == 
          $attendee['specialty_id']) echo 'selected' ?>
            <?php echo $r['name']; ?>
        </option>
            <?php }?>
    </select>
    </div>

  <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>"id="email" name="email" aria-describedby="emailHelp">
        <div class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone" aria-describedby="contactnumber">
        <div class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="d-grid gap-2">
  <button type="submit" name ="submit" class="btn btn-success btn-block">Save Changes</button>
  </div>

</form>

<?php } ?>

<br>
<br>
<br>

    <?php require_once 'includes/footer.php'?>

   