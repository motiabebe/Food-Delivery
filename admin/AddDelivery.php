<?php
include('../backend/db.php');
$name_alert = $username_alert = $password_alert = $phone_alert = "";
if(isset($_POST['add'])) {
    // Get the form data and check if it is empty
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];


    if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $name_alert = "Your name must only contain letters";
    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $username_alert = "Your username must only contain letters and numbers";
    } else if(strlen($password) < 6) {
        $password_alert = "Password must be at least 6 characters";
    } else if(!is_numeric($phone)) {
        $phone_alert = "Your phone number must only contain numbers";
    } else {
        $insert = "INSERT INTO delivery (delivery_name, gender, username, password, phone) VALUES ('$name', '$gender', '$username', '$password', '$phone')";

        $result = mysqli_query($conn, $insert);

        if($result == true) {
            header('Location: ViewDelivery.php');
        } else {
            echo '<script>alert("Error adding Delivery")</script>';
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
        <h2>Add Delivery</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <button class="btn bg-black round" name="add">Add</button>
            <div class="grid grid-center">
                <label>Name: </label>
                <input type="text" name="name" required>
                <label>Username</label>
                <input type="text" name="username" required>
                <label>Password</label>
                <input type="text" name="password" required>
                <label>Gender</label>
                <select name="gender">
                    <option value=" ">Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
                <label>Phone: </label>
                <input type="text" name="phone" required>
                <br>
            </div>
        </form>
        <p><?php echo $name_alert ?></p>
        <p><?php echo $username_alert ?></p>
        <p><?php echo $password_alert ?></p>
        <p><?php echo $phone_alert ?></p>
    </main>
    <?php include('js_linker.php'); ?>
</body>
</html>
