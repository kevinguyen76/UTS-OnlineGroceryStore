<?php
//list item details from path: products/itemDescription.php?product_id=5000
$connection = mysqli_connect('aawijljq6f83j1.cxnflfripfom.us-east-1.rds.amazonaws.com', 'SystemAdmin', 'groceryStore', 'assignment1');
$product_id = $_GET['product_id'];

// get product from product_id in products table
$product_description_query = "select * from products where product_id = $product_id";
$product_result = mysqli_query($connection, $product_description_query);
$product = mysqli_fetch_assoc($product_result);

echo "<div class='item_description_header'>";
echo "<h2>" . $product['product_name'] . " Description</h2>";

// display product name
// echo "<div>" . $product['product_name'] . "</div>";
// display product picture
echo "<div class='item_description_picture'><img src='../images/" . $product['product_id'] . ".jpg'></div>";

// display product unit_price
echo "<div>Price: $" . $product['unit_price'] . "</div>";

// display product unit_quantity
echo "<div>Quantity: " . $product['unit_quantity'] . "</div>";

// display product unit_price
echo "<div>Price: $" . $product['unit_price'] . "</div>";

// siplay unit stock
echo "<div>Unit Stock: " . $product['in_stock'] . "</div>";

echo "</div>";

?>