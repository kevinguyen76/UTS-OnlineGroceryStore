<?php
session_start();

$connection = mysqli_connect('aawijljq6f83j1.cxnflfripfom.us-east-1.rds.amazonaws.com', 'SystemAdmin', 'groceryStore', 'assignment1');
if (!$connection) {
    die("Could not connect to Server");
}

$_SESSION['total_price'] = 0;
foreach ($_SESSION['shopping_cart'] as $key => $value) {
    $_SESSION['total_price'] += $value['unit_price'] * $value['quantity'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>On-Line Grocery Store</title>
    <link rel="stylesheet" href="checkout.css">
    <script src='.././scripts/main.js' defer></script>
</head>

<body>
    <div class="wrapper">
        <!-- <div class="item_category" style="width: 700px;"> -->
        <div class="item_category">
            <div>
                <h1>Your Shopping Cart</h1>
            </div>
            <div class="shopping_cart_wrapper">
                <?php
                include 'checkoutItems.php';
                ?>
            </div>
        </div>

        <div class="item_description" style="height: 750px;">
            <h1>Checkout Form</h1>
            <div class="checkout_form">
                <div>
                    <h2> Total Purchase Cost: $<?php echo $_SESSION['total_price'] ?></h2>
                    <form action='' method='post'>
                        <table>
                            <tr>
                                <!-- first name -->
                                <td>
                                    <label for="first_name">First Name:</label>
                                </td>
                                <td>
                                    <label for="last_name" id="label_ln">Last Name:</label>
                                </td>
                            <tr>
                                <td>
                                    <input type="text" name="first_name" id="first_name" required>
                                </td>
                                <!-- last name -->
                                <td>
                                    <input type="text" name="last_name" id="last_name" required>
                                </td>
                            </tr>

                            </tr>
                            <tr>
                                <!-- email address -->
                                <td>
                                    <label for="email">Email Address:</label>
                                </td>
                            <tr>
                                <td colspan="2">
                                    <input type="email" name="email" id="email" required>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <!-- address -->
                                <td>
                                    <label for="address">Address:</label>
                                </td>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="address" id="address" required>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <!-- country -->
                                <td>
                                    <label for="country">Country:</label>
                                </td>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="country" id="country" required>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <!-- suburb -->
                                <td>
                                    <label for="suburb">Suburb:</label>
                                </td>
                                <!-- state dropdown select -->
                                <td>
                                    <label for="state" id="label_state">State:</label>
                                </td>
                            <tr>
                                <td>
                                    <input type="text" name="suburb" id="suburb" required>
                                </td>
                                <td>
                                    <select name="state" id="state" required>
                                        <option value="">Select State</option>
                                        <option value="NSW">New South Wales</option>
                                        <option value="QLD">Queensland</option>
                                        <option value="VIC">Victoria</option>
                                        <option value="TAS">Tasmania</option>
                                        <option value="WA">Western Australia</option>
                                        <option value="SA">South Australia</option>
                                        <option value="NT">Northern Territory</option>
                                        <option value="ACT">Australian Capital Territory</option>
                                    </select>
                                </td>
                            </tr>
                            </tr>
                        </table>
                        <div>
                            <!-- post method complete purchase -->
                            <input id="complete_purchase_btn" type="submit" name="complete_purchase" value="Purchase">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>