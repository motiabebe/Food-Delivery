<?php 
include('session_check.php');
if(isset($_GET['id'])){
    $food_id = $_GET['id'];
    $query = "INSERT INTO cart (user_id, food_id) VALUES ('$user_id', '$food_id')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($result == true) {
        // header('Location: Browse.php');
        
        // header redirect backward
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>