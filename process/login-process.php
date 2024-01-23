<?php
include('dbConnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login form submission

    // Validate and sanitize input data
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];

    // Check user credentials
    $sql = "SELECT id, name, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password is correct, set session and redirect to dashboard (replace 'dashboard.php' with your desired destination)
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: ../account.php");
            exit();
        } else {
            // Incorrect password, redirect to login with error
            header("Location: ../login.php?login=error");
            exit();
        }
    } else {
        // User not found, redirect to login with error
        header("Location: ../login.php?login=error");
        exit();
    }
}

$conn->close();
?>
