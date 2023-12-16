<?php
include '../includes/db.php';
include '../includes/functions.php';

// Assuming you have a session-based authentication system
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['user_id'];

// Fetch the latest vendors list
$latestVendors = getLatestVendors();

// Fetch items in the user's cart
$cartItems = getCartItems($userID);

// Fetch items in the user's guest list
$guestListItems = getGuestListItems($userID);

// Fetch order status for the user
$orderStatus = getOrderStatus($userID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Welcome, User!</h2>

        <h3>Latest Vendors</h3>
        <ul>
            <?php foreach ($latestVendors as $vendor) : ?>
                <li><?php echo $vendor['VendorName']; ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Cart</h3>
        <ul>
            <?php foreach ($cartItems as $cartItem) : ?>
                <li><?php echo $cartItem['ItemName']; ?></li>
            <?php endforeach; ?>
        </ul>
        <button onclick="addToCart()">Add to Cart</button>

        <h3>Guest List</h3>
        <ul>
            <?php foreach ($guestListItems as $guestItem) : ?>
                <li><?php echo $guestItem['ItemName']; ?></li>
            <?php endforeach; ?>
        </ul>
        <button onclick="addToGuestList()">Add to Guest List</button>

        <h3>Order Status</h3>
        <p><?php echo $orderStatus; ?></p>
    </div>

    <script>
        function addToCart() {
            // Implement the logic to add items to the cart using JavaScript
            // You may need to make an AJAX request to the server to update the cart
            // Example: fetch('addToCart.php', { method: 'POST', body: { itemID: 'your_item_id' } });
        }

        function addToGuestList() {
            // Implement the logic to add items to the guest list using JavaScript
            // You may need to make an AJAX request to the server to update the guest list
            // Example: fetch('addToGuestList.php', { method: 'POST', body: { itemID: 'your_item_id' } });
        }
    </script>
</body>
</html>
