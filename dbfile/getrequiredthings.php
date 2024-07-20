<?php
include 'connect.php';

$sql = "SELECT sn,things, status, date FROM required";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="nb_col_9" draggable="true">' .
            '<div class="nb_row nb_aic nb_jcsb">' .
            '<input type="text" value="'. $row['sn'] .'" class="requiresnholderclas" hidden>'.
            '<p class="rename" status="' . $row['status'] . '"><i class="nb"></i>' .
            $row['things'] . '</p>' .
            '<p><sub>' . $row['date'] . '</sub> <i class="nb nb_hamburger"></i></p>' .
            '</div></div>';
    }
} else {
    echo "No record found";
}

$conn->close();
?>