<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $newpassword = $_POST['newpassword'];
    $hasedpassword = password_hash($newpassword, PASSWORD_BCRYPT);
    $sql = "UPDATE `user` SET password = '$hasedpassword' WHERE username = '$username' AND sn='$userid'";
    if ($conn->query($sql) === TRUE) {
  echo "true";
} else {
  echo "Error updating record: " . $conn->error;
}
}
?>