<?php include('header.php'); ?>

<div class="container my-5">
    <h2>Your Account</h2>

    <?php

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "<p>Please <a href='login.php'>login</a> to view your account.</p>";
    } else {
        $user_id = $_SESSION['user_id'];

        // Include database connection
        include('process/dbConnect.php');

        // Retrieve user's orders from the database
        $sql = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Your Orders</h3>";

            // Display a table of orders
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Product Type</th>";
            echo "<th>Quantity</th>";
            echo "<th>Fees</th>";
            echo "<th>Delivery</th>";
            echo "<th>Delivery Address</th>";
            echo "<th>Delivery Status</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Loop through each order
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . ucfirst($row['type']) . "</td>";
                echo "<td>" . $row['num'] . "</td>";
                echo "<td>" . $row['fees'] . " RWF</td>";
                echo "<td>" . ($row['delivery'] ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row['address'] ? $row['address'] : '-') . "</td>";
                echo "<td>" . ($row['order_status'] == 1 ? '<span class=text-success>Ordered!</span>' : '<span class=text-warning>Pending...</span>') . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No orders found.</p>";
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</div>

<?php include('footer.php'); ?>
