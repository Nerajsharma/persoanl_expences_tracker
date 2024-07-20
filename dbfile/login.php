<?php // Start the session for user authentication

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Retrieve user data from the database based on the entered username
    $sql = "SELECT * FROM user WHERE username = '$enteredUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the entered password against the hashed password
        if (password_verify($enteredPassword, $hashedPassword)) {
            // Password is correct, set session variables and redirect to a secure page
            $_SESSION['login']="true";
                    $_SESSION['username']=$row['name'];
                    $_SESSION['userid'] = $row['sn'];
                    echo 'sucessfully';
            // Redirect to dashboard/index.php after successful login
            // header('Location: ../dashboard/index.php');
            exit();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}
$conn->close();
?>