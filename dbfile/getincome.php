<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include 'connect.php';

$sql = "SELECT name, purpose, amount, date FROM income WHERE userid = '$userid' ORDER BY sn DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="nb_col_9"><div class="nb_row nb_jcsb nb_aic">' .
            '<div class="nb_col_7">' .
            '<p class="sendername">' . $row['name'] . '</p>' .
            '<p class="sending_purpose">' . $row['purpose'] . '</p>' .
            '</div>' .
            '<div class="nb_col_3">Rs <span class="sending_amount">' . $row['amount'] . '</span><sub>' .
            $row['date'] . '</sub></div>' .
            '</div></div>';
    }
} else {
    echo "No record Found";
}

$conn->close();
}
?>