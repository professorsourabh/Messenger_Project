<?php 

session_start();
include_once('config.php');
$sql=mysqli_query($conn,"SELECT * FROM users_table");
$output="";
if(mysqli_num_rows($sql)==1){
    $output.="No users are available to chat";
}elseif(mysqli_num_rows($sql)>0){
   
    while($row=mysqli_fetch_assoc($sql)){
        $output.='
                    <a href="#">
                    <div class="content">
                        <img src="./image.jpg" alt="">
                        <div class="details">
                            <span>'.$row['name'].'</span>
                            <p>This is a test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>
        ';
    }
}

echo $output;
?>