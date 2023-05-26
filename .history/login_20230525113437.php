<?php 
 
 session_start();
 include_once('config.php');
 $email = mysqli_real_escape_string($conn,$_POST['email']); 
 $password =mysqli_real_escape_string($conn,$_POST['password']);
  
 if(!empty($email) && !empty($password)){}
 else{
    echo "All fields are required!";
 }

?>