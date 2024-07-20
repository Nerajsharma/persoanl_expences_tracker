<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include "connect.php";

$billno = $_POST['frmbillno'];
$details = $_POST['frmbilldetails'];
$amount = $_POST['frmbillamt'];
$date = $_POST['date'];
$sql = "INSERT INTO `campus` (`billid`, `details`, `amount`, `date`) VALUES ('$billno', '$details', '$amount', date)";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
}
?>