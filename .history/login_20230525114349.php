<?php 
 
 session_start();
 include_once('config.php');
 $email = mysqli_real_escape_string($conn,$_POST['email']); 
 $password =mysqli_real_escape_string($conn,$_POST['password']);
  
 if(!empty($email) && !empty($password)){
    $sql=mysqli_query($conn,"SELECT * FROM users_table WHERE email='{$email}' AND password='{$password}'");
    if(mysqli_num_rows($sql)>0){
        $row=mysqli_fetch_assoc($sql);
        $_SESSION['user_id']=$row['user_id'];
        header('Location:http://localhost/chat_project/chatpage.php');
    }
    else{
        echo "Email or Password is incorrect";
        
    }
 }
 else{
    echo "All fields are required!";
 }

?>