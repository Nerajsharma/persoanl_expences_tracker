<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect.php';
    $sql = "SELECT * FROM income WHERE method = 'lend' AND userid = '$userid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Convert values to numeric to avoid string concatenation
            $amount = floatval($row['amount']);
            $paid = floatval($row['paid']);

            // Determine the subtext based on the condition
            $subtext = ($paid == $amount) ? 'clear' : ($amount - $paid);

            echo '<div class="nb_col_9" lendid="'.$row['sn'].'">
                        <div class="nb_row nb_aic nb_jcsb">
                            <p>'.$row['name'].' <sub>'.$subtext.'</sub></p>
                            <p>Rs. '.$amount.' <sub>'.$row['date'].'</sub></p>
                        </div>
                    </div>';
        }
    } else {
        echo "No record Found";
    }

    $conn->close();
}
?>