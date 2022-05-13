<?php
session_start();

$connection = mysqli_connect('aawijljq6f83j1.cxnflfripfom.us-east-1.rds.amazonaws.com', 'SystemAdmin', 'groceryStore', 'assignment1');
if (!$connection) {
    die("Could not connect to Server");
}

$query = "select * from products";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
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
            <h1>Product Description</h1>
        </div>

        <div class="shopping_cart">
            <div>
                <div>
                    <h1>Shopping Cart</h1>
                </div>
                <div>
                    <h2>Your Shopping cart is Empty!</h2>
                </div>
            </div>
        </div>
</body>

</html>