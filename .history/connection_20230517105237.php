<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db="form_registration";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

//   $sql = "CREATE TABLE MyGuests (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(30) NOT NULL,
//     -- lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50) NOT NULL,
//     password VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
//     if ($conn->query($sql) === TRUE) {
//         // echo "Table MyGuests created successfully";
//       } else {
//         echo "Error creating table: " . $conn->error;
//       }
      
//       $conn->close();


?>
