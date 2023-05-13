<?php
include('session_check.php');
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cart WHERE cart_id = '$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if($result == true) {
        header('Location: cart.php');
    }
}

?>