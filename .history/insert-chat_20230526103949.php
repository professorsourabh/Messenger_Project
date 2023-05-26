<?php
session_start();
if (isset($_SESSION['user_id'])) {
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, base64_decode($_POST['outgoing_id']));
    $incoming_id = mysqli_real_escape_string($conn, base64_decode($_POST['incoming_id']));
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($message)) {
        $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, message) 
                VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    } else {
        header("Location: ../login.php");
        exit();
    }
}
?>
