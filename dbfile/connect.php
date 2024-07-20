<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aapna_khalti";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Set $userid to $_SESSION['userid'] or null if not defined
$userid = $_SESSION['userid'] ?? null;
?>