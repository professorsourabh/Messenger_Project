<?php 

session_start();
include_once('config.php');
$searchItem = mysqli_real_escape_string($conn, $_POST['seachTerm']);
echo $searchItem;
$sql = mysqli_query($conn, "SELECT * FROM users_table WHERE name LIKE '%{$searchItem}%'");
$output = "";

if(mysqli_num_rows($sql)==1){
    $output.=" No users found in your search list!";
}elseif(mysqli_num_rows($sql)>0){
   
    while($row=mysqli_fetch_assoc($sql)){
        $output.='
                    <a href="chatpage1.php?user_id='.$row['user_id'].'">
                    <div class="content">
                        <img src="http://localhost/chat_project/images'. $row['image'].' " alt="">
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