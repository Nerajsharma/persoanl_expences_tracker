<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect.php';

    $requiredthings_status = $_POST['required_complete'];
    $requiresnholder = $_POST['requiresnholder'];
    $sql = "UPDATE `required` SET `status` = '$requiredthings_status' WHERE `sn` = '$requiresnholder'";

    if ($conn->query($sql) === TRUE) {
        echo "true";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>