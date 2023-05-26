<?php 
 include_once('config.php');
  
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $dob=mysqli_real_escape_string($conn,$_POST['dob']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);

  

  if(isset($_FILES['image'])){
  $file_name=$_FILES['image']['name'];
  $file_type=$_FILES['image']['type'];
  $temp_name=$_FILES['image']['temp_name'];
  
  $img_explode=explode('.',$file_name);
  $img_extension=end($img_explode);

  $extensions=['png','jpeg','jpg'];

  if(in_array($img_extension,$extensions)==true){
    $time=time();
    $new_file_name=$time.$file_name;
    move_uploaded_file($temp_name,"./chat project/images".$new_file_name);
    $status="Active now";
  }else{
    echo "Please select an Image file with extension -jpeg,png,jpg";
  }
  
}
else{
  echo "your file doesn't exist!";
}
?>
