<?php

// ----------------------------- Tea Query ------------------------------------
$queryTea = "select * from products where product_id >= 4000 and product_id <= 4001";
$resultTea = mysqli_query($connection, $queryTea);
$num_rows_tea = mysqli_num_rows($resultTea);

// ----------------------------- Coffee Query ------------------------------------
$queryCfe = "select * from products where product_id >= 4003 and product_id <= 4004";
$resultCfe = mysqli_query($connection, $queryCfe);
$num_rows_cfe = mysqli_num_rows($resultCfe);

// ----------------------------- Other Query ------------------------------------
$queryOth = "select * from products where product_id= 4005";
$resultOth = mysqli_query($connection, $queryOth);
$num_rows_oth = mysqli_num_rows($resultOth);

?>

<div class="summary_content">
    <div>
        <h3>Tea</h3>
    </div>

    <?php
    if ($num_rows_tea > 0) {
        while ($row = mysqli_fetch_assoc($resultTea)) {
            echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
        }
    }
    ?>

    <div>
        <h3>Coffee</h3>
    </div>

    <?php
    if ($num_rows_cfe > 0) {
        while ($row = mysqli_fetch_assoc($resultCfe)) {
            echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
        }
    }
    ?>

    <div>
        <h3>Other</h3>
    </div>

    <?php
    if ($num_rows_oth > 0) {
        while ($row = mysqli_fetch_assoc($resultOth)) {
            echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
        }
    }
    ?>
</div>