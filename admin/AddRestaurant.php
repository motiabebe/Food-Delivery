<?php
include('../backend/db.php');
if(isset($_POST['add'])) {
    // Get the form data and check if it is empty
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $description = $_POST['description'];
    $logo = $_FILES['logo']['name'];
    $logo_temp= $_FILES['logo']['tmp_name'];
    $logo_path = "../../assets/";

    if(empty($name) || empty($address) || empty($phone) || empty($email) || empty($website) || empty($description) || empty($logo)) {
        echo '<script>alert("Please fill in all the fields")</script>';
    } else {
        $insert = "INSERT INTO restaurants (restaurant_name, restaurant_address, restaurant_phone, restaurant_email, restaurant_website, restaurant_description, restaurant_logo) 
        VALUES ('$name', '$address', '$phone', '$email', '$website', '$description', '$logo')";

        move_uploaded_file($logo_temp, $logo_path.$logo);

        $result = mysqli_query($conn, $insert);

        if($result == true) {
            header('Location: ViewRestaurants.php');
        } else {
            echo '<script>alert("Error adding restaurant")</script>';
        }
    };

}   

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Restaurant | cPanel</title>
</head>
<body>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>
    <main class="dash-main">
        <h2>Add Restaurant</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <button class="btn bg-black round" name="add">Add</button>
            <div class="grid grid-center">
                <label for="">Name: </label>
                <input type="text" name="name" id="" required>
                <label for="">Address: </label>
                <input type="text" name="address" id="" required>
                <label for="">Phone: </label>
                <input type="text" name="phone" id="" required>
                <label for="">Email: </label>
                <input type="text" name="email" id="" required>
                <label for="">Website: </label>
                <input type="text" name="website" id="" required>
                <label for="">Description: </label>
                <input name="description" id="" required></input>
                <label for="">Logo: </label>
                <input type="file" name="logo" id="" required>
            </div>
        </form>
    </main>
    <?php include('js_linker.php'); ?>
</body>
</html>
