<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
$today = $_POST["today"];
    // Update the expance table
  $debetername = $_POST["debetername"];
  $debetideclear = $_POST["debetideclear"];
    $debetpaying_amount = $_POST["debetpaying_amount"];
// $today = $_POST['today'];
    // Update the expance table
    $sql = "UPDATE expance SET paid = paid + $debetpaying_amount WHERE sn = $debetideclear";

    if ($conn->query($sql) === TRUE) {
        // echo "Record updated successfully";
        $expcsqul = "INSERT INTO `income` (`name`,`userid`, `amount`,`purpose`, `method`, `date`) 
        VALUES ('$debetername','$userid', '$debetpaying_amount','refund', 'refund', '$today')";

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