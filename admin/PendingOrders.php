<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="color-scheme" content="dark light"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
</head>
<body>
    <header>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>
    </header>

    <main class="dash-main">
        <h2>Pending Orders</h2>  

        <table class="table">
            <tr class="bg-blue">
                <td>Order ID</td>
                <td>User Name</td>
                <td>Food</td>
                <td>Restaurant</td>
                <td>Pickup Address</td>
                <td>Price</td>
                <td>Delivery Address</td>
                <td>Order Status</td>
                <th>Assigned Delivery</th>
                <td>Action</td>
            </tr>
    <?php 
    if($orders->num_rows == 0) {
        echo "<tr><td colspan='9'>No orders</td></tr>";
    } else {
        foreach($orders as $row) {

            echo "<tr>";
            echo "<td>$order_id</td>";
            echo "<td>$username</td>";
            echo "<td>$food_name</td>";
            echo "<td>$restaurant_name</td>";
            echo "<td>$useraddress</td>";
            echo "<td>$food_price</td>";
            echo "<td>$useraddress</td>";
            echo "<td>$order_status</td>";
            // select delivery person from select
            echo "<td>$delivery_person</td>";
            echo "<td><a href='AssignOrder.php?id=$order_id'>Assign</a></td>";
            echo "</tr>";
            
            
        }
    }
    ?>

        </table>



        </main>
        <?php include ('js_linker.php') ?>

</body>
</html>