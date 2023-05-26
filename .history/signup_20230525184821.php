<?php
session_start();
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $temp_name = $_FILES['image']['tmp_name'];

        $img_explode = explode('.', $file_name);
        $img_extension = strtolower(end($img_explode));

        $extensions = ['png', 'jpeg', 'jpg'];

        if (in_array($img_extension, $extensions)) {
            $time = time();
            $new_file_name = $time . '_' . $file_name;
            $destination = `"/images/".$new_file_name`;

            if (move_uploaded_file($temp_name, $destination)) {
                $status = "Active now";
                $random_id = rand(time(), 10000000);
           
                $stmt = $conn->prepare("INSERT INTO users_table (user_id, name, email, dob, password, image, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssss", $random_id, $name, $email, $dob, $password, $new_file_name, $status);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // Successful insertion
    $sql2 = mysqli_query($conn, "SELECT * FROM users_table WHERE email='$email'");
    if (mysqli_fetch_row($sql2)) {
        $row = mysqli_fetch_assoc($sql2);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['msg']="Successfully Signed up!";
        // echo "success";
    }
} else {
    // Error in insertion
    $_SESSION['msg']="Something went wrong with the sign-up!";
    // echo ;
}


header('Location:http://localhost/chat_project/signuppage.php');

exit;



$stmt->close();

            } else {
                $_SESSION['msg']="Failed to upload the image.";
                // echo ;
            }
        } else {
            $_SESSION['msg']="Please select an image file with extensions: jpeg, png, jpg.";
            // echo ;
        }
    } else {
        $_SESSION['msg']="Image file not found.";
        // echo "Image file not found.";
    }
} else {
    echo "Invalid request.";
}
?>
