<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have form data
    $sn = $_POST['month_id'];
    $month = $_POST['Month_name_label'];
    $additional_amount = $_POST['monthrent_payment'];
    $today = $_POST['today'];

    // Fetch the current total_rent from the database
    $select_query = "SELECT paid FROM room WHERE sn='$sn' AND month='$month'";
    $result = $conn->query($select_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_total_rent = $row['paid'];
        $new_total_rent = $current_total_rent + $additional_amount;

        $update_query = "UPDATE room SET paid='$new_total_rent' WHERE sn='$sn' AND month='$month'";

        if ($conn->query($update_query) === TRUE) {

            $expencesql = "INSERT INTO `expance`(`name`,`userid`, `amount`, `place`, `date`) VALUES
             ('Room rent','$userid', '$additional_amount', 'room', '$today')";

            if ($conn->query($expencesql) === TRUE) {
                echo "true";
            } else {
                echo "Error inserting expense record: " . $conn->error;
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "No record found";
    }
}

$conn->close();
?>