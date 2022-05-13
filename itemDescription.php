<?php
session_start();
$connection = mysqli_connect('aawijljq6f83j1.cxnflfripfom.us-east-1.rds.amazonaws.com', 'SystemAdmin', 'groceryStore', 'assignment1');
if (!$connection) {
    die("Could not connect to Server");
}
$product_id = $_GET['product_id'];

// get product from product_id in products table
$product_description_query = "select * from products where product_id = $product_id";
$product_result = mysqli_query($connection, $product_description_query);
$product = mysqli_fetch_assoc($product_result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>On-Line Grocery Store</title>
    <link rel="stylesheet" href="./styles.css">
    <script src='./scripts/main.js' defer></script>
</head>

<body>
    <div class="wrapper">
        <div class="item_category">
            <div>
                <h1>Online Grocery Store</h1>
            </div>
            <div>
                <h2>Food Categories</h2>
            </div>
            <ul>
                <li>
                    <button id="frozenFoodBtn" class="viewProductBtn">View Products</button>
                    <!-- <h3 class="category-menu" id="frozenFoodCat">Frozen Food</h3> -->

                    <details class="menu-view" id="frozenFoods">
                        <summary>
                            <img id="frozenIcon" src='./images/frozenFoodsIcon.jpg'>
                            <h3>Frozen Food</h3>
                        </summary>
                        <?php
                        include 'products/frozenFood.php';
                        ?>
                    </details>
                </li>
                <li>
                    <button id="freshFoodBtn" class="viewProductBtn">View Products</button>
                    <!-- <h3 class="category-menu" id="freshFoodCat">Fresh Food</h3> -->

                    <details class="menu-view" id="freshFoods">
                        <summary>
                            <img id="freshFoodsIcon" src="./images/freshFoodsIcon.jpg">
                            <h3>Fresh Food</h3>
                        </summary>
                        <?php
                        include 'products/freshFood.php';
                        ?>
                    </details>
                </li>
                <li>
                    <button id="beveragesBtn" class="viewProductBtn">View Products</button>
                    <!-- <h3 class="category-menu" id="beveragesCat">Beverages</h3> -->

                    <details class="menu-view" id="beverages">
                        <summary>
                            <img id="bevIcon" src="./images/bevIcon.jpg">
                            <h3>Beverages</h3>
                        </summary>
                        <?php
                        include 'products/beverages.php';
                        ?>
                    </details>
                </li>
                <li>
                    <button id="homeHealthBtn" class="viewProductBtn">View Products</button>
                    <!-- <h3 class="category-menu" id="homeHealthCat">Home Health</h3> -->

                    <details class="menu-view" id="homeHealth">
                        <summary>
                            <img id="homeHealthIcon" src="./images/homeHealthIcon.jpg">
                            <h3>Home Health</h3>
                        </summary>
                        <?php
                        include 'products/homeHealth.php';
                        ?>
                    </details>
                </li>
                <li>
                    <button id="petFoodBtn" class="viewProductBtn">View Products</button>
                    <!-- <h3 class="category-menu" id="petFoodCat">Pet Food</h3> -->

                    <details class="menu-view" id="petFoods">
                        <summary>
                            <img id="petFoodIcon" src="./images/petFoodIcon.jpg">
                            <h3>Pet Food</h3>
                        </summary>
                        <?php
                        include 'products/petFood.php';
                        ?>
                    </details>
                </li>
            </ul>
        </div>

        <div class="item_description">
            <div>
                <?php
                echo "<h1>" . $product['product_name'] . " Product Description</h1>";
                ?>
            </div>

            <div id="productDescriptionCard">
                <div class="product_deets">
                    <div class="img">
                        <?php
                        echo "<img src='images/" . $product['product_id'] . ".jpg'>";
                        ?>
                    </div>
                    <div>
                        <?php
                        echo "<h3>" . $product['product_name'] . "</h3>";
                        echo "<p>Price: $" . $product['unit_price'] . "</p>";
                        echo "<p>Quantity: " . $product['unit_quantity'] . "</p>";
                        echo "<p>Current Stock: " . $product['in_stock'] . "</p>";
                        ?>
                        <form action='' method='post'>
                            <table>
                                <tr>
                                    <td>
                                        <button type="button" class="minus" onclick="decrementValue()">-</button>
                                        <input class="quantity" type="number" name="quantity" id="quantity" value="1" min="1" max="20" placeholder="Quantity">
                                        <button type="button" class="plus" onclick="incrementValue()">+</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="addToCart" class="add_to_cart" type="submit" name="add_to_cart" value="Add to Cart">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="shopping_cart">
            <div>
                <h1>Shopping Cart</h1>
                <!-- clearCart button -->
                <form action='' method='post'>
                    <input id="clearCartBtn" class="clearCartBtn" type="submit" name="clear_cart" value="Clear Entire Cart">
                </form>

                <!-- checkout button -->
                <form action='' method='post'>
                    <a>
                        <button id="checkoutBtn" class="checkoutBtn" onclick="window.open('./checkout/checkout.php')">Checkout</button>
                    </a>
                </form>
            </div>

            <div class="shopping_cart_wrapper">
                <?php
                include 'shoppingCart.php';
                ?>
            </div>
        </div>
</body>

</html>