<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect.php';

    // Calculate total income
    $income_query = "SELECT SUM(amount) as total_income FROM income WHERE userid = '$userid'";
    $income_result = $conn->query($income_query);
    $total_income = 0;

    if (!$income_result) {
        die("Error in income query: " . $conn->error);
    }

    if ($income_result->num_rows > 0) {
        $income_row = $income_result->fetch_assoc();
        $total_income = ($income_row['total_income'] !== null) ? $income_row['total_income'] : 0;
    }

    // Calculate total expense
    $expense_query = "SELECT SUM(amount) as total_expense FROM expance WHERE userid = '$userid'";
    $expense_result = $conn->query($expense_query);
    $total_expense = 0;

    if (!$expense_result) {
        die("Error in expense query: " . $conn->error);
    }

    if ($expense_result->num_rows > 0) {
        $expense_row = $expense_result->fetch_assoc();
        $total_expense = ($expense_row['total_expense'] !== null) ? $expense_row['total_expense'] : 0;
    }

    // Calculate net income
    $net_income = $total_income - $total_expense;

    // Prepare data for JSON
    $data = array(
        'totalIncome' => $total_income,
        'totalExpense' => $total_expense,
        'netIncome' => $net_income
    );

    // Convert data to JSON format
    $json_data = json_encode($data);

    // Directly echo the JSON data
    echo $json_data;

    $conn->close();
}
?>