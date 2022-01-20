<?php
    $title = 'View Attendees';
    
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Get all attendees\
    
    $results = $crud->getAttendees();
   
?>


<table class="table table-hover">

<tr>
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date of Birth</th>
    <th>Email Address</th>
    <th>Contact Number</th>
    <th>Specialty</th>
    <th>Action</th>
</tr>

    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>

        <tr>
            <td><?php echo $r['attendee_id'] ?></td>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['lastname'] ?></td>
            <td><?php echo $r['dateofbirth'] ?></td>
            <td><?php echo $r['emailaddress'] ?></td>
            <td><?php echo $r['contactnumber'] ?></td>
            <td><?php echo $r['name'] ?></td>
            <td>
                <a href="singleview.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
            </td> 
        </tr>


    <?php }?>


    
</table>


















<br>
<br>
<br>

    <?php require_once 'includes/footer.php' ?>