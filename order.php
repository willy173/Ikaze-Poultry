<?php include('header.php'); ?>

<div class="container my-5">
    <h2>Order Details</h2>

    <?php
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "<p>Please <a href='login.php'>login</a> to place an order.</p>";
    } else {
        $user_id = $_SESSION['user_id'];

        // Get the product from the URL parameter
        $product = isset($_GET['product']) ? $_GET['product'] : '';

        // Set the product details
        $productDetails = [];
        if ($product == 'eggs') {
            $productDetails = [
                'name' => 'EGGS',
                'price' => 200,
                'delivery_threshold' => 20000,
                'delivery_fee' => 10000
            ];
        } elseif ($product == 'chickens') {
            $productDetails = [
                'name' => 'HEN',
                'price' => 5000,
                'delivery_threshold' => 20000,
                'delivery_fee' => 10000
            ];
        }

        // Check if the product details are set
        if ($productDetails) {
            echo "<div class='row'>";
            echo "<div class='col-10 col-md-7 mx-auto'>";
           
            echo "<form method='post' action='process/order-process.php' id='orderForm' class='shadow p-5'>";
            echo "<input type='hidden' name='user_id' value='$user_id'>";
            echo "<input type='hidden' name='product' value='" . $productDetails['name'] . "'>";

            // Input for quantity
            echo "<div class='form-group'>";
            echo "<label for='quantity'>Quantity:</label>";
            echo "<input type='number' class='form-control' id='quantity' name='quantity' required>";
            echo "</div>";

            // Display the fees and delivery details
            echo "<p>Price per unit: " . $productDetails['price'] . " RWF</p>";
            echo "<p>Delivery Threshold: " . $productDetails['delivery_threshold'] . " RWF</p>";
            echo "<p>Delivery Fee: <span id='deliveryFee'>" . $productDetails['delivery_fee'] . "</span> RWF</p>";

            // Display the total amount to pay
            echo "<p>Total Amount to Pay: <span id='totalAmount'>0</span> RWF</p>";

            // Input for Delivery Address
            echo "<div class='form-group'>";
            echo "<label for='address'>Address:</label>";
            echo "<input type='text' class='form-control' id='address' name='address' required>";
            echo "</div>";


            // Submit button
            echo "<button type='submit' class='btn btn-primary'>Confirm Order</button>";
            echo "</form>";

            echo "</div>";
            echo "</div>";

        } else {
            // If the product is not recognized, display a message
            echo "<p>Product not recognized. Please choose between eggs and chickens.</p>
                   <p class='text-center'><a href='products.php' class='btn btn-primary'>Choose Product</a></p> ";
        }
    }
    ?>
</div>

<script>
    // JavaScript to update delivery fee and total amount based on quantity
    document.getElementById('quantity').addEventListener('input', function () {
        // Get quantity input value
        var quantity = parseInt(this.value) || 0;

        // Update delivery fee and total amount
        var deliveryFeeElement = document.getElementById('deliveryFee');
        var totalAmountElement = document.getElementById('totalAmount');

        <?php
        // Set JavaScript variables based on PHP values
        echo "var deliveryThreshold = " . $productDetails['delivery_threshold'] . ";\n";
        echo "var deliveryFee = " . $productDetails['delivery_fee'] . ";\n";
        echo "var pricePerUnit = " . $productDetails['price'] . ";\n";
        ?>

        // Calculate total amount
        var totalAmount = (quantity * pricePerUnit) + ((quantity * pricePerUnit) >= deliveryThreshold ? 0 : deliveryFee);

        // Update the HTML elements
        deliveryFeeElement.innerText = (quantity * pricePerUnit) >= deliveryThreshold ? '0' : deliveryFee;
        totalAmountElement.innerText = totalAmount;
    });
</script>

<?php include('footer.php'); ?>
