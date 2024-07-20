<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';

    $month = $_POST["monthrentselect"];
    $status = $_POST["monthrentday"];

    $total_rent = 0;
$sn = 1;

    $user_query = "SELECT room_rent FROM user WHERE sn = $sn";
    $user_result = $conn->query($user_query);

    if ($user_result->num_rows > 0) {
        $user_row = $user_result->fetch_assoc();

        $total_rent_from_user = $user_row["room_rent"];
        if ($status == "Half") {
            $total_rent = $total_rent_from_user / 2;
        } else {
            $total_rent = $total_rent_from_user;
        }

        $sql = "INSERT INTO room (month,userid, total_rent,paid) VALUES ('$month','$userid', '$total_rent', '0')";

        if ($conn->query($sql) === TRUE) {
            echo "true";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "No records found in the user table for sn = $sn";
    }
}
$conn->close();
?>