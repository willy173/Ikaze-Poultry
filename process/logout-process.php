<?php
// Start the session
session_start();

// Unset the adminId session variable
unset($_SESSION['user_id']);

// Redirect to the admin login page (replace 'admin-login.php' with your desired destination)
header("Location: ../login.php");
exit();
?>
