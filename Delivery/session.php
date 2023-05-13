<?php 

include('../backend/db.php');
session_start();

if(empty($_SESSION['delivery_id'])) {
    header('Location: Login.php');
} else {
    $delivery_id = $_SESSION['delivery_id'];

    $query = "SELECT * FROM delivery where delivery_id = '$delivery_id'";
    $result = mysqli_query($conn,$query);

    // store user data
    while($row = mysqli_fetch_assoc($result)) {
        $name = $row['delivery_name'];
        $username = $row['username'];
        $password = $row['password'];
        $phone = $row['phone'];
    }

    $orders = "SELECT * FROM orders 
    INNER JOIN users ON orders.user_id = users.user_id
    INNER JOIN foods ON orders.food_id = foods.food_id
    INNER JOIN restaurants ON foods.restaurant_id = restaurants.restaurant_id
    WHERE orders.delivery_id = '$delivery_id'";

    $result = mysqli_query($conn,$orders) or die(mysqli_error($conn));
    $_SESSION['count'] = mysqli_num_rows($result);
    // store orders data
    foreach($result as $row) {
        $order_id = $row['orders_id'];
        $order_status = $row['order_status'];
        $restaurant_name = $row['restaurant_name'];
        $restaurant_address = $row['restaurant_address'];
        $food_name = $row['name'];
        $food_price = $row['price'];
        $username = $row['firstname'];
        $useraddress = $row['address'];
    }
    $orders_count = mysqli_num_rows($result);

    $orders_pending = "SELECT * FROM orders where delivery_id = '$delivery_id' AND order_status = 'Pending'";
    $order_pen = mysqli_query($conn,$orders_pending);
    $orders_pending_count = mysqli_num_rows($order_pen);


    $orders_complete = "SELECT * FROM orders where delivery_id = '$delivery_id' AND order_status = 'Delivered'";
    $orders_com = mysqli_query($conn,$orders_complete);
    $orders_complete_count = mysqli_num_rows($orders_com);

    $delivery = "SELECT * FROM delivery where delivery_id = '$delivery_id'";
    $delivery_user = mysqli_query($conn,$delivery);

    while($row = mysqli_fetch_assoc($delivery_user)) {
        $delivery_name = $row['delivery_name'];
        $delivery_username = $row['username'];
        $delivery_phone = $row['phone'];
        
    }


    // store order data

}

?>