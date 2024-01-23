<?php
include('dbConnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $sql = "UPDATE orders SET order_status=1 WHERE id=$order_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin.php?order=ordered");
        exit();
    } else {
        header("Location: ../admin.php?order=failed");
        exit();
    }
}

$conn->close();
?>
