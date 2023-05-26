<?php 
 include_once('config.php');
  
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $dob=$_REQUEST['dob'];
  $email=$_REQUEST['email'];
  $password=$_REQUEST['password'];

  


?>
