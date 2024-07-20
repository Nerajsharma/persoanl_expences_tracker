<?php
include 'connect.php';

$sql = "SELECT sn, month, total_rent, paid FROM room WHERE userid = '$userid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $st = $row['total_rent'] - $row['paid'];
        echo '<div class="nb_col_9" rentid="'. $row['sn'] .'">
            <div class="nb_row nb_jcsb">
                <p class="room_month_name">' . $row['month'] . '</p>
                <p class="room_month_rent">Rs. ' . $row['total_rent'] . ' <sub class=""><i class="nb"></i><span>' . $st . '</span></sub></p>
            </div>
        </div>';
        $st = 000; // Reset $st for the next iteration
    }
} else {
    echo "No record found";
}

$conn->close();
?>