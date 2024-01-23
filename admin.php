<?php include('header.php'); ?>

<div class="container my-5">
    <h2>Admin Dashboard</h2>

    <?php
    // Check if the admin is logged in
    if (!isset($_SESSION['adminId'])) {
        echo "<p>Access denied. Please <a href='admin-login.php'>login</a> as an administrator.</p>";
    } else {
        $adminId = $_SESSION['adminId'];

        // Include database connection
        include('process/dbConnect.php');

        // Retrieve all orders from the database
        $sql = "SELECT * FROM orders ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>All Orders</h3>";

            // Display a table of all orders
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>User ID</th>";
            echo "<th>Product Type</th>";
            echo "<th>Quantity</th>";
            echo "<th>Fees</th>";
            echo "<th>Delivery</th>";
            echo "<th>Delivery Address</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Loop through each order
            while ($row = $result->fetch_assoc()) {
                $form = '
                    <form action="process/order-approve.php" method="POST">
                        <input type="hidden" name="order_id" value="' . $row['id'] . '"/>
                        <button type="submit" name="submit" class="btn btn-primary">Mark As Ordered</button>
                    </form>
                    ';
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . ucfirst($row['type']) . "</td>";
                echo "<td>" . $row['num'] . "</td>";
                echo "<td>" . $row['fees'] . " RWF</td>";
                echo "<td>" . ($row['delivery'] ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row['address'] ? $row['address'] : '-') . "</td>";
                echo "<td>" . ($row['order_status'] == 1 ? '<span class=text-success>Ordered!</span>' : $form) . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";

            // Logout button
            echo "<a href='process/admin-logout.php' class='btn btn-danger'>Logout</a>";
        } else {
            echo "<p>No orders found.</p>";
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</div>

<?php include('footer.php'); ?>
