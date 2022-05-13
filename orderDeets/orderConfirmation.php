<?php
session_start();

$connection = mysqli_connect('aawijljq6f83j1.cxnflfripfom.us-east-1.rds.amazonaws.com', 'SystemAdmin', 'groceryStore', 'assignment1');
if (!$connection) {
    die("Could not connect to Server");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On-Line Grocery Store</title>
    <link rel="stylesheet" href="confirmation.css">
    <script src='../scripts/main.js' defer></script>
</head>

<body>
    <div class="order_details">
        <h1>Order Details</h1>
        <?php
        echo "<text> Thank you for your order " . $_SESSION['first_name'] . "!</text><br>";
        echo "<text> Your order will be delivered to " . $_SESSION['address'] . "</text>";
        ?>
        <div class="shopping_cart_wrapper">
            <?php
            if (isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    echo "<div class=product_card>";
                    echo "<div class=prod_img>";
                    echo "<img src='../images/" . $value['product_id'] . ".jpg'>";
                    echo "</div>";
                    echo "<div class=prod_descript>";
                    echo "<h3>$value[product_name]</h3>";
                    echo "<p>Price: $value[unit_price]</p>";
                    echo "<p>Quantity: $value[unit_quantity]</p>";
                    echo "<p>Current Stock: $value[in_stock]</p>";
                    echo "<p>Unit(s) Bought: $value[quantity]</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>

            <div>
                <!-- post method complete purchase -->
                <form action='' method='post'>
                    <input id="back_to_home" type="submit" name="order_deets" value="Home">
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['order_deets'])) {
    // unset shopping cart
    unset($_SESSION['shopping_cart']);
    // redirect to home page
    header("Location: ../index.php");
}
?>