<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JT Music Store - Instruments</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/category.css">
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
    <section class="category-name">
        <div class="container">
            <h1>Instruments</h1>
        </div>
    </section>
    <section class="products">
        <div class="container">
            <div class="product-grid">
                <?php
                $conn = new mysqli('localhost', 'root', '', 'music_store');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $instruments_sql = "SELECT * FROM Products WHERE CategoryID = 1 AND StockLevel > 0";
                $instruments_result = $conn->query($instruments_sql);

                if ($instruments_result->num_rows > 0) {
                    while($product = $instruments_result->fetch_assoc()) {
                        echo "<div class='product-item'>";
                        echo "<img src='images/" . $product['ProductID'] . ".jpg' alt='" . $product['Name'] . "'>";
                        echo "<h3>" . $product['Name'] . "</h3>";
                        echo "<p>" . $product['Description'] . "</p>";
                        echo "<p>$" . $product['Price'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "No products found in this category.";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
        </div>
    </footer>
</body>
</html>
