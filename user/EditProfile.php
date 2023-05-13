<?php include ('session_check.php');?>
<?php

$name_alert = $username_alert = $phone_alert = $update_alert = "";

if(isset($_POST['update'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
        $name_alert = "Your name must only contain letters";
    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $username_alert = "Your username must only contain letters and numbers";
    } else if(!is_numeric($phone)) {
        $phone_alert = "Your phone number must only contain numbers";
    } else {
    $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', username = '$username', phone = '$phone', address = '$address' WHERE user_id = '$user_id'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    if(mysqli_affected_rows($conn) > 0) {
        $update_alert = "Profile updated successfully";
    } else {
        $update_alert = "Your account has not been updated";
    }
    
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Food Delivery</title>

</head>
<body>
    <header>
        <?php include('navbar.php') ?>
        <?php include('css_linker.php'); ?>
    </header>

    <main id="account" class="grid grid-center">
    <div class="">
            <h1>Your Account</h1>
                <?php include('account_nav.php'); ?>
                <div id="account_details" class="flex flex-row flex-center center">
                    <h2>Edit Account Details</h2>
                    <p><?php echo $update_alert ?></p>                    
                    <p><?php echo $name_alert ?></p>
                    <p><?php echo $username_alert ?></p>
                    <p><?php echo $phone_alert ?></p>
                    <form action="" method="POST">
                        <label>First Name</label>
                        <input type="text" name="firstname" value="<?php echo $first_name ?>"> <br>
                        <label>Last Name</label>
                        <input type="text" name="lastname" value="<?php echo $last_name ?>"> <br>
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $username ?>"> <br>
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?php echo $phone ?>"> <br>
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $address ?>"> <br>
                        <input type="submit" name="update" value="Update" class="btn bg-white">
                    </form>
                </div>
        </div>
    </main>

    

<?php include('footer.php') ?>
</body>
</html>