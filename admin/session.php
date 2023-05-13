<?php 
// include database connection
include('../backend/db.php');
// start session
session_start();
// check session for security
if(empty($_SESSION['id'])) {
    header('Location: ../cPanel.php');
}
// 
$admin_id = $_SESSION['id'];
$query = "SELECT * FROM admin where admin_id = '$admin_id'";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)) {
    $name = $row['admin_name'];

}

// store restaurant data
$foods = mysqli_query($conn, "SELECT * FROM foods INNER JOIN restaurants ON foods.restaurant_id = restaurants.restaurant_id") or die (mysqli_error($conn));

$restaurants = $conn->query("SELECT * FROM restaurants");

$delivery = $conn->query("SELECT * FROM delivery");

$orders = $conn->query("SELECT * FROM orders 
INNER JOIN users ON orders.user_id = users.user_id
INNER JOIN foods ON orders.food_id = foods.food_id
INNER JOIN restaurants ON foods.restaurant_id = restaurants.restaurant_id");

foreach($orders as $row) {
    $order_id = $row['orders_id'];
    $order_status = $row['order_status'];
    $restaurant_name = $row['restaurant_name'];
    $restaurant_address = $row['restaurant_address'];
    $food_name = $row['name'];
    $food_price = $row['price'];
    $username = $row['firstname'];
    $useraddress = $row['address'];
    $delivery_person = $row['delivery_id'];
}

$orders_pending = $conn->query("SELECT * FROM orders WHERE order_status = 'Pending'");

$orders_deliverd = $conn->query("SELECT * FROM orders WHERE order_status = 'Delivered'");

$users = $conn->query("SELECT * FROM users");


?>