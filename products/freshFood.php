<?php
// ----------------------------- Dairy Query ------------------------------------
$queryDy = "select * from products where product_id >= 3000 and product_id <= 3001";
$resultDy = mysqli_query($connection, $queryDy);
$num_rows_Dy = mysqli_num_rows($resultDy);

// ----------------------------- Meats Query ------------------------------------
$queryMt = "select * from products where product_id = 3002";
$resultMt = mysqli_query($connection, $queryMt);
$num_rows_Mt = mysqli_num_rows($resultMt);


// ----------------------------- Fruit Query ------------------------------------
$queryFt = "select * from products where product_id >= 3003 and product_id <= 3007";
$resultFt = mysqli_query($connection, $queryFt);
$num_rows_Ft = mysqli_num_rows($resultFt);
?>

<div class="summary_content">
    <div>
        <h3>Dairy</h3>
    </div>

    <?php
    if ($num_rows_Dy > 0) {
        while ($row = mysqli_fetch_assoc($resultDy)) {
            echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
        }
    }
    ?>

    <div>
        <h3>Meats</h3>
    </div>

    <?php
    if ($num_rows_Mt > 0) {
        while ($row = mysqli_fetch_assoc($resultMt)) {
            echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
        }
    }
    ?>

    <div>
        <h3>Fruit</h3>
    </div>

    <?php
    if ($num_rows_Ft > 0) {
        while ($row = mysqli_fetch_assoc($resultFt)) {
            echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
        }
    }
    ?>
</div>