<?php
// Start the session
session_start();

// Include database connection
include('dbConnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle admin login form submission

    // Validate and sanitize input data
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];

    // Check admin credentials
    $sql = "SELECT id FROM admins WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Admin found, set adminId session variable
        $row = $result->fetch_assoc();
        $_SESSION['adminId'] = $row['id'];

        // Redirect to the admin dashboard (replace 'admin.php' with your desired destination)
        header("Location: ../admin.php");
        exit();
    } else {
        // Incorrect credentials, redirect to login with error
        header("Location: ../admin-login.php?login=error");
        exit();
    }
}

$conn->close();
?>
