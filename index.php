<?php
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getspecialties();

?>

    <h1 class="text-center">Registration Form for IT Conference</h1>

    <form method="post" action="success.php">
        
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname">
    </div>

    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob">
    </div>

    <div class="mb-3">
    <label for="specialty" class="form-label">Field of Expertise</label>
    <select class="form-select form-select-sm" id="specialty" name="specialty" aria-label=".form-select-sm example">
        
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php echo $r ['specialty_id'] ?>"><?php echo $r ['name']; ?></option>

            <?php }?>
        
    </select>
    </div>

  <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <div class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="contactnumber">
        <div class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="d-grid gap-2">
  <button type="submit" name ="submit" class="btn btn-primary btn-block">Submit</button>
  </div>

  

</form>
<br>
<br>
<br>

    <?php require_once 'includes/footer.php'?>

   