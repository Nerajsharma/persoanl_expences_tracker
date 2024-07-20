<?php
include 'connect.php';

$data = array("Personal" => 0, "education" => 0, "room" => 0);

$sql = "SELECT * FROM expance WHERE userid = '$userid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['place'] === 'Personal' || $row['place'] === 'refund') {
            $data["Personal"] += $row['amount'];
        } else if ($row['place'] === 'education') {
            $data["education"] += $row['amount'];
        } else if ($row['place'] === 'room') {
            $data["room"] += $row['amount'];
        }
    }
} else {
    echo "No record Found";
}
echo json_encode($data);

$conn->close();
?>