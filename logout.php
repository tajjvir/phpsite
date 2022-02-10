<?php 
    include_once 'includes/session.php'?>
    
<?php 
    session_destroy();
    header("location: index.php");
?>