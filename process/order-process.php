<?php
include('dbConnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle order form submission

    // Get and sanitize input data
    $user_id = $_POST['user_id'];
    $product = $_POST['product'];
    $address = $_POST['address'];
    $quantity = intval($_POST['quantity']);

    // Set product details based on user selection
    $productDetails = [];
    if ($product == 'EGGS') {
        $productDetails = [
            'name' => 'EGGS',
            'price' => 100,
            'delivery_threshold' => 2000,
            'delivery_fee' => 10000
        ];
    } elseif ($product == 'HEN') {
        $productDetails = [
            'name' => 'HEN',
            'price' => 5000,
            'delivery_threshold' => 2000,
            'delivery_fee' => 10000
        ];
    }

    // Check if the product details are set
    if ($productDetails) {
        // Calculate fees based on quantity
        $fees = $productDetails['price'] * $quantity;

        // Insert order data into the 'orders' table
        $sql = "INSERT INTO orders (user_id, type, num, fees, delivery, address) VALUES ('$user_id', '$product', '$quantity', '$fees', 1, '$address')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../account.php?order=added");
            exit();
        } else {
            header("Location: ../account.php?order=failed");
            exit();
        }
    } else {
        header("Location: ../account.php?order=fail");
            exit();
    }
}

$conn->close();
?>
