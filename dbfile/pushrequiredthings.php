<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

include 'connect.php';

$requiredthings = $_POST['requiredthings'];
$requiredthings_status = "false";

$requiredthings_date = $_POST['today'];
// $income_date = $_POST['income_date'];

$sql = "INSERT INTO `required` (`things`,`userid`, `status`, `date`) 
        VALUES ('$requiredthings','$userid', '$requiredthings_status', '$requiredthings_date')";

    if ($conn->query($sql) === TRUE) {
        echo "true";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>