<?php
require 'connect.php';

$username = 'admin';
$rawPassword = 'admin';
$name = "Binita sharma";

// Hash the password using a secure hashing algorithm like bcrypt
// $hashedPassword = password_hash($rawPassword, PASSWORD_BCRYPT);

  // $sql = "INSERT INTO user (name, username, password) 
  //         VALUES ('$name', '$username', '$hashedPassword')";

  $updatehachedpass = password_hash($rawPassword, PASSWORD_BCRYPT);
$sql = "UPDATE user SET password ='$updatehachedpass' WHERE `username` = '$username'";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>