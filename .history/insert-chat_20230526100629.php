<?php 

session_start();
if(isset($_SESSION['user_id'])){
include_once "config.php";
$outgoing_id=mysqli_real_escape_string($conn,base64_decode($_POST['outgoing_id']));
$incoming_id=mysqli_real_escape_string($conn,base64_decode($_POST['incoming_id']));
$message=mysqli_real_escape_string($conn,$_POST['message']);

if(!empty($message)){
    $sql=mysqli_real_escape_string($conn,"INSERT INTO messages (incoming_msg_id,outgoing_msg_id,message) 
    values ({$incoming_id},{$outgoing_id},{$message})") or die();
}else{
    header("../login.php");
}}
?>