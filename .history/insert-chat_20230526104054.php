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

    // Retrieve user details for displaying in chat
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    $userSql = "SELECT * FROM users_table WHERE user_id = {$user_id}";
    $userResult = mysqli_query($conn, $userSql);

    if (mysqli_num_rows($userResult) > 0) {
        $row = mysqli_fetch_assoc($userResult);
    } else {
        // Handle the case when no user is found
        $row = null;
    }
}
?>
