<?php
$connection = mysqli_connect('aawijljq6f83j1.cxnflfripfom.us-east-1.rds.amazonaws.com', 'SystemAdmin', 'groceryStore', 'assignment1');
if (!$connection) {
    die("Could not connect to Server");
}

$product_id = $_GET['product_id'];

// get product from product_id in products table
$product_description_query = "select * from products where product_id = $product_id";
$product_result = mysqli_query($connection, $product_description_query);
$product = mysqli_fetch_assoc($product_result);

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['shopping_cart'])) {
        $item_array_id = array_column($_SESSION['shopping_cart'], 'product_id');
        if (!in_array($product_id, $item_array_id)) {
            $count = count($_SESSION['shopping_cart']);
            $item_array = array(
                'product_id' => $product_id,
                'product_name' => $product['product_name'],
                'unit_price' => $product['unit_price'],
                'unit_quantity' => $product['unit_quantity'],
                'in_stock' => $product['in_stock'],
                'quantity' => $_POST['quantity']
            );
            $_SESSION['shopping_cart'][$count] = $item_array;
        } 
        else {
            // if the product is already in the shopping cart, update the quantity of the product
            for ($i = 0; $i < count($_SESSION['shopping_cart']); $i++) {
                if ($_SESSION['shopping_cart'][$i]['product_id'] == $product_id) {
                    //if quantity is more than 20 don't allow to add more
                    if ($_SESSION['shopping_cart'][$i]['quantity'] + $_POST['quantity'] > 20) {
                        echo '<script>alert("You can only have max 20 units in your cart!")</script>';
                        echo '<script>window.location = "./itemDescription.php?product_id=' . $product_id . '"</script>';
                    } else {
                        $_SESSION['shopping_cart'][$i]['quantity'] += $_POST['quantity'];
                    }
                    $_SESSION['shopping_cart'][$i]['unit_price'] = $product['unit_price'];
                    $_SESSION['shopping_cart'][$i]['unit_quantity'] = $product['unit_quantity'];
                    $_SESSION['shopping_cart'][$i]['in_stock'] = $product['in_stock'];
                }
            }
        }
    } else {
        $item_array = array(
            'product_id' => $product_id,
            'product_name' => $product['product_name'],
            'unit_price' => $product['unit_price'],
            'unit_quantity' => $product['unit_quantity'],
            'in_stock' => $product['in_stock'],
            'quantity' => $_POST['quantity']
        );
        $_SESSION['shopping_cart'][0] = $item_array;
    }
}

// if $_SESSION['shopping_cart'] isset and $_SESSION['shopping_cart']
if (isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        echo "<div class=product_card>";
        echo "<div class=prod_img>";
        echo "<img src='images/" . $value['product_id'] . ".jpg'>";
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
        echo "<form action='./itemDescription.php?product_id=$product_id&remove_id=$value[product_id]' method='post'>";
        echo "<input class='remove_item' type='submit' name='remove_item' value='Remove Item'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    //if shopping cart is empty clearCartBtn is hidden
    echo "<script>document.getElementById('clearCartBtn').style.display = 'none';</script>";

    //if shopping cart is checkoutBtn is hidden
    echo "<script>document.getElementById('checkoutBtn').style.display = 'none';</script>";

    // Empty Cart Message
    echo "<h2>Your Shopping cart is Empty!</h2>";
}

// unset($_SESSION['shopping_cart'][$key]) and also update unset($_SESSION['shopping_cart'][$key-1];
if (isset($_GET['remove_id'])) {
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        if ($value['product_id'] == $_GET['remove_id']) {
            unset($_SESSION['shopping_cart'][$key]);
            if (count($_SESSION['shopping_cart']) > 0) {
                $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
            }
    
            echo '<script>window.location = "./itemDescription.php?product_id=' . $product_id . '"</script>';
        }
    }
}

// clear entire $_SESSION['shopping_cart']
if (isset($_POST['clear_cart']) && isset($_SESSION['shopping_cart'])) {
    unset($_SESSION['shopping_cart']);
    //relocate to the same page
    echo '<script>window.location = "./itemDescription.php?product_id=' . $product_id . '"</script>';
}

// print out $_SESSION['shopping_cart']
echo "<pre>";
print_r($_SESSION['shopping_cart']);
echo "</pre>";

?>


