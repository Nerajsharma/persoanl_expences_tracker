<?php
include 'connect.php';

$sql = "SELECT name, amount, place, date FROM expance WHERE userid = '$userid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="nb_col_9"><div class="nb_row nb_jcsb nb_aic">' .
            '<div class="nb_col_7">' .
            '<p class="expancethingsname">' . $row['name'] . '</p>' .
            '<p class="expance_place">' . $row['place'] . '</p>' .
            '</div>' .
            '<div class="nb_col_3">Rs <span class="sending_amount">' . $row['amount'] . '</span><sub>' .
            $row['date'] . '</sub></div>' .
            '</div></div>';
    }
} else {
    echo "No record Found";
}

$conn->close();
?>