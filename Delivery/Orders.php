<?php
include('session.php');
include('css_linker.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
  <?php include('navbar.php'); ?>
  <div id="main">
      <h2>Your Orders</h2>  
  </div>
  <main class="grid grid-center">
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
                <td>Update</td>
            </tr>
    <?php 
    if($_SESSION['count'] == 0) {
        echo "<tr><td colspan='9'>No orders</td></tr>";
    } else {
        foreach($result as $row) {
            // $order_id = $row['orders_id'];
            // $order_status = $row['order_status'];
            // $restaurant_name = $row['restaurant_name'];
            // $restaurant_address = $row['restaurant_address'];
            // $food_name = $row['name'];
            // $food_price = $row['price'];
            // $username = $row['firstname'];
            // $useraddress = $row['address'];
            // $delivery_address = $row['delivery_address'];
            echo "<tr>";
            echo "<td>$order_id</td>";
            echo "<td>$username</td>";
            echo "<td>$food_name</td>";
            echo "<td>$restaurant_name</td>";
            echo "<td>$useraddress</td>";
            echo "<td>$food_price</td>";
            echo "<td>$useraddress</td>";
            echo "<td>$order_status</td>";
            echo "<td><a href='updateorder.php?id=$order_id'>Update</a></td>";
            echo "</tr>";
        }
    }
    ?>

        </table>
    </main>

</body>
</html>
