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
        echo "<p>Unit(s): $value[quantity]</p>";
        echo "</div>";
        echo "<div>";
        echo "</div>";
        echo "<form action='./checkout.php?remove_id=$value[product_id]' method='post'>";
        echo "<input class='remove_item' type='submit' name='remove_item' value='Remove Item'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "<h2>Your Shopping cart is empty!</h2>";
}

if (isset($_GET['remove_id'])) {
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        if ($value['product_id'] == $_GET['remove_id']) {
            unset($_SESSION['shopping_cart'][$key]);
            if (count($_SESSION['shopping_cart']) > 0) {
                $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
            }

            echo '<script>window.location = "./checkout.php"</script>';
        }
    }
}

// if the checkout form is completely filled out and the complete purchase button is click, 
// update the database removing the unit quantity from the in_stock column
if (isset($_POST['complete_purchase'])) {
    $connection = mysqli_connect('aawijljq6f83j1.cxnflfripfom.us-east-1.rds.amazonaws.com', 'SystemAdmin', 'groceryStore', 'assignment1');
    if (!$connection) {
        die("Could not connect to Server");
    }
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['address'] = $_POST['address'];

    // if shopping cart is not empty, update the database
    if (isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            $sql = "UPDATE products SET in_stock = in_stock - $value[quantity] WHERE product_id = $value[product_id]";
            $result = mysqli_query($connection, $sql);
        }
        echo '<script>window.location = "../orderDeets/orderConfirmation.php"</script>';
    } else {
        echo '<script>alert("Purchase unsuccessful, Your Shopping Cart is empty!")</script>';
    }
}