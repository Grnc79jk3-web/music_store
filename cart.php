<?php
session_start();

// EXAMPLE REMOVE LATER DONT FORGET
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [
        ['ProductID' => 1, 'Name' => 'Guitar', 'Price' => 299.99, 'Quantity' => 1],
        ['ProductID' => 2, 'Name' => 'Piano', 'Price' => 899.99, 'Quantity' => 1],
    ];
}
function calculateTotal($cart) {
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['Price'] * $item['Quantity'];
    }
    return $total;
}

$cart = $_SESSION['cart'];
$totalPrice = calculateTotal($cart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JT Music Store - Cart</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">JT Music</div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Instruments.php">Instruments</a></li>
                    <li><a href="SheetMusic.php">Sheet Music</a></li>
                    <li><a href="Accessories.php">Accessories</a></li>
                    <li><a href="AudioEquipment.php">Audio Equipment</a></li>
                </ul>
            </nav>
            <div class="cart"><a href="cart.php">Shopping Cart</a></div>
            <div class="user">User Account</div>
        </div>
    </header>
    <section class="cart-items">
        <div class="container">
            <h1>Shopping Cart</h1>
            <div class="cart-grid">
                <?php
                if (!empty($cart)) {
                    foreach ($cart as $item) {
                        echo "<div class='cart-item'>";
                        echo "<h3>" . $item['Name'] . "</h3>";
                        echo "<p>Price: R" . $item['Price'] . "</p>";
                        echo "<p>Quantity: " . $item['Quantity'] . "</p>";
                        echo "<p>Total: R" . ($item['Price'] * $item['Quantity']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Your cart is empty.</p>";
                }
                ?>
            </div>
        </div>
    </section>
    <section class="cart-summary">
        <div class="container">
            <h2>Cart Summary</h2>
            <p>Total Price: R<?php echo number_format($totalPrice, 2); ?></p>
        </div>
    </section>
    <div class="container">
        <button class="checkout-button">Proceed to Checkout</button>
    </div>

    <footer>
        <div class="container">
        </div>
    </footer>
</body>
</html>
