<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

include 'connect.php';

$incomefrom = $_POST['income_from'];
$income_purpose = $_POST['income_purpose'];
$income_amount = $_POST['income_amount'];
$income_post = $_POST['income_post'];
$income_date = $_POST['income_date'];

$sql = "INSERT INTO `income` (`name`,`userid`, `amount`, `purpose`, `method`, `date`) 
        VALUES ('$incomefrom','$userid', '$income_amount', '$income_purpose', '$income_post', '$income_date')";

    if ($conn->query($sql) === TRUE) {
        echo "true";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>