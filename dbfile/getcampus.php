<?php
include 'connect.php';

$sql = "SELECT * FROM `campus`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="nb_col_9">
                <div class="nb_row nb_jcsb nb_card">
                    <p class="billdetails">' . $row['details'] . ' <sub class="billno">' . $row['billid'] . '</sub></p>
                    <p class="billamount">Rs. ' . $row['amount'] . ' <sub class="billdate">' . $row['date'] . '</sub></p>
                </div>
            </div>';
    }
} else {
    echo 'No data found';
}

$conn->close();
?>