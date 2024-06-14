<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JT Music Store</title>
    <link rel="stylesheet" href="css/styles.css">
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
    <section class="hero">
        <div class="container">
            <div id="carousel">
                <?php
                $conn = new mysqli('localhost', 'root', '', 'music_store');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $carousel_sql = "SELECT * FROM Products ORDER BY RAND() LIMIT 5"; // Assuming carousel shows random products
                $carousel_result = $conn->query($carousel_sql);

                if ($carousel_result->num_rows > 0) {
                    while($carousel_item = $carousel_result->fetch_assoc()) {
                        echo "<div class='carousel-item'>";
                        echo "<img src='images/" . $carousel_item['ProductID'] . ".jpg' alt='" . $carousel_item['Name'] . "'>";
                        echo "<div class='carousel-caption'>" . $carousel_item['Name'] . "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No carousel items found.";
                }
                ?>
            </div>
        </div>
    </section>
    <section class="featured-products">
        <div class="container">
            <h2>Featured Products</h2>
            <div class="product-grid">
                <?php
                $featured_sql = "SELECT * FROM Products WHERE StockLevel > 0 ORDER BY ProductID DESC LIMIT 4";
                $featured_result = $conn->query($featured_sql);

                if ($featured_result->num_rows > 0) {
                    while($product = $featured_result->fetch_assoc()) {
                        echo "<div class='product-item'>";
                        echo "<img src='images/" . $product['ProductID'] . ".jpg' alt='" . $product['Name'] . "'>";
                        echo "<h3>" . $product['Name'] . "</h3>";
                        echo "<p>" . $product['Description'] . "</p>";
                        echo "<p>$" . $product['Price'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "No featured products found.";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <section class="categories">
        <div class="container">
            <h2>Categories</h2>
            <div class="category-links">
                <a href="Instruments.php">Instruments</a>
                <a href="SheetMusic.php">Sheet Music</a>
                <a href="Accessories.php">Accessories</a>
                <a href="AudioEquipment.php">Audio Equipment</a>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
        </div>
    </footer>
</body>
</html>
