<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

include 'connect.php';

$expence_things = $_POST['expence_things'];
$expance_amount = $_POST['expance_amount'];
$expance_place = $_POST['expance_place'];
$expance_date = $_POST['expance_date'];
// $income_date = $_POST['income_date'];

$sql = "INSERT INTO `expance` (`name`,`userid`, `amount`, `place`, `date`) 
        VALUES ('$expence_things','$userid', '$expance_amount', '$expance_place', '$expance_date')";

    if ($conn->query($sql) === TRUE) {
        echo "true";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>