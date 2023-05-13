<?php include ('session_check.php');?>
<?php 
$pass_alert = "";
if(isset($_POST['change_password'])) {
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];

    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $db_pass = $row['password'];
    if(strlen($new_pass) < 6) {
        echo '<script>alert("Password must be at least 6 characters long!")</script>';
    } 
    else if($current_pass === $db_pass) {
            // $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $update = "UPDATE users SET password = '$new_pass' WHERE user_id = '$user_id'";
            mysqli_query($conn, $update) or die (mysqli_error($conn));
            $pass_alert = "Password Changed Successfully";
    } else {
        echo '<script>alert("Current password is incorrect")</script>';
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
        <div>
            <h1>Account Details</h1>
        <?php include('account_nav.php'); ?>
        <div id="account_details" class="flex flex-row flex-center center">
                <h2 class="center">Change Your Password</h2>
                <br>
                <p class="center"><?php echo $pass_alert ?></p>
                <form action="" method="POST"  class="center">
                    <label>Current Password</label>
                    <input type="password" name="current_pass" placeholder="Current Password" required> <br>
                    <label>New Password</label>
                    <input type="password" name="new_pass" placeholder="New Password" required> <br>
                    <input type="submit" name="change_password" value="Change Password" class="btn round bg-blue">
                </form>
        </div>
    </main>

    

<?php include('footer.php') ?>
</body>
</html>