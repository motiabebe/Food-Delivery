<?php 
// include database connection
include('../backend/db.php');
// start session
session_start();
// check session for security
// store cart count in session
if(empty($_SESSION['id'])) {
    header('Location: ../index.php');
} else {
    $user_id = $_SESSION['id'];
    // store userid from session

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);

    // store user data
    while($row = mysqli_fetch_assoc($result)) {
        $query_2 = "SELECT * FROM users WHERE user_id = '$user_id'";
        $first_name = $row['firstname'];
        $last_name = $row['lastname'];
        $username = $row['username'];
        $phone = $row['phone'];
        $address = $row['address'];
    }
    
    // store cart count in session
    $cart = "SELECT * FROM cart WHERE user_id = '$user_id'";
    $cart_result = mysqli_query($conn, $cart) or die(mysqli_error($conn));
    $cart_count = mysqli_num_rows($cart_result);
    $_SESSION['cart_count'] = $cart_count;

    // store orders by user_id
    $orders = "SELECT * FROM orders WHERE user_id = '$user_id'";
    $orders_result = mysqli_query($conn, $orders) or die(mysqli_error($conn));
    $orders_count = mysqli_num_rows($orders_result);

}
?>

<!-- Session Check For User -->