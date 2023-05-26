<?php 
 include_once('config.php');
  
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $dob=mysqli_real_escape_string($conn,$_POST['dob']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);

  

  if(isset($_FILES['image'])){
  
}
else{
  echo "your file doesn't exist!";
}
?>
