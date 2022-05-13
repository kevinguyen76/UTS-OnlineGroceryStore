<?php 
$frozenFoodQuery = "select * from products where product_id >= 5000 and product_id <= 5004";
$result = mysqli_query($connection, $frozenFoodQuery);
$num_rows = mysqli_num_rows($result);
?>

<div class="summary_content">
<?php
if ($num_rows>0){
    while($row = mysqli_fetch_assoc($result)){
        //GET method to itemDescription.php
        echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
    }
}
?>
</div>