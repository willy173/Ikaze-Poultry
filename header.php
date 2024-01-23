<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Willy Poultry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Ikaze Poultry</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order.php">Order</a>
            </li>
            <?php
            // Simple session logic
            session_start();
            if (isset($_SESSION['user_id'])) {
                // If user is logged in, show account and logout
                echo '<li class="nav-item">
                          <a class="nav-link" href="account.php">Account</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="process/logout-process.php">Logout</a>
                      </li>';
            } else {
                // If user is not logged in, show login and register
                echo '<li class="nav-item">
                          <a class="nav-link" href="login.php">Login</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="register.php">Register</a>
                      </li>';
            }
            ?>
        </ul>
    </div>
</nav>
