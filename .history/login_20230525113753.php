<?php 
 
 session_start();
 include_once('config.php');
 $email = mysqli_real_escape_string($conn,$_POST['email']); 
 $password =mysqli_real_escape_string($conn,$_POST['password']);
  
 if(!empty($email) && !empty($password)){
    $sql=mysqli_query($conn,"SELECT * FROM users_table WHERE email='{$email}' AND password='{$password}'");
 }
 else{
    echo "All fields are required!";
 }

?>