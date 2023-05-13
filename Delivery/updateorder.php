<?php
include('session.php');
if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "UPDATE orders SET order_status = 'Delivered' WHERE orders_id = '$id'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if ($result == true) {
        header('Location: Orders.php');
    } else {
        echo "Error while updating record:";
    }

    echo $id;

}
?>