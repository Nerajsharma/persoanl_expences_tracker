<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
$today = $_POST["today"];
    // Update the expance table
  $lendername = $_POST["lendername"];
  $lendideclear = $_POST["lendideclear"];
    $lendpaying_amount = $_POST["lendpaying_amount"];

$today = $_POST['today'];
    // Update the expance table
    $sql = "UPDATE income SET paid = paid + $lendpaying_amount WHERE sn = $lendideclear";

    if ($conn->query($sql) === TRUE) {
        // echo "Record updated successfully";
        $expcsqul = "INSERT INTO `expance` (`name`,`userid`, `amount`, `place`, `date`) 
        VALUES ('$lendername','$userid', '$lendpaying_amount', 'refund', '$today')";

        if ($conn->query($expcsqul) === TRUE) {
        echo "true";
        } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>