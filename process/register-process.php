<?php
include('dbConnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission

    // Validate and sanitize input data
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST["phone"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Insert user data into the 'users' table
    $sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        header("Location: ../login.php?register=success");
        exit();
    } else {
        // Registration failed
        header("Location: ../register.php?register=fail");
        exit();
    }
}

$conn->close();
?>
