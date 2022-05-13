<?php
// ----------------------------- Sea Food Query ------------------------------------
$querySf = "select * from products where product_id >= 1000 and product_id <= 1003 and product_id != 1002";
$resultSf = mysqli_query($connection, $querySf);
$num_rows_Sf = mysqli_num_rows($resultSf);

// --------------------------- Milk Products Query ----------------------------------
$queryMlk = "select * from products where product_id >= 1004 and product_id <= 1005";
$resultMlk = mysqli_query($connection, $queryMlk);
$num_rows_Mlk = mysqli_num_rows($resultMlk);

// -------------------------- Other Products Query ----------------------------------
$queryOth = "select * from products where product_id = 1002";
$resultOth = mysqli_query($connection, $queryOth);
$num_rows_Oth = mysqli_num_rows($resultOth);
?>

<div class="summary_content">
    <div>
        <h3>Sea Food</h3>
    </div>

    <?php
    if ($num_rows_Sf > 0) {
        while ($row = mysqli_fetch_assoc($resultSf)) {
            echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
        }
    }
    ?>

    <div>
        <h3>Milk Products</h3>
    </div>

    <?php
    if ($num_rows_Sf > 0) {
        while ($row = mysqli_fetch_assoc($resultMlk)) {
            echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
        }
    }
    ?>

    <div>
        <h3>Other</h3>
    </div>

    <?php
    if ($num_rows_Sf > 0) {
        while ($row = mysqli_fetch_assoc($resultOth)) {
            echo "<div><a href='itemDescription.php?product_id=" . $row['product_id'] . "'>" . $row['product_name'] . " " . $row['unit_quantity'] . "</a></div><br/>";
        }
    }
    ?>
</div>