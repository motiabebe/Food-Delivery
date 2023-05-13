<?php
include('backend/db.php');
$name_alert = $username_alert = $password_alert = $phone_alert = "";

if(isset($_POST['signup'])) {

    // check if it is empty
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    // check firstname & lastname only contains letters, check username in database, check password length, check phone number only contains numbers
    if(!preg_match("/^[a-zA-Z ]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
        $name_alert = "Your name must only contain letters";
    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $username_alert = "Your username must only contain letters and numbers";
    } else if(strlen($password) < 6) {
        $password_alert = "Password must be at least 6 characters";
    } else if(!is_numeric($phone)) {
        $phone_alert = "Your phone number must only contain numbers";
    } else {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            if($row['username'] == $username) {
                $username_alert = "Username already exists";
            }
            if($row['phone'] == $phone) {
                $phone_alert = "Phone number is already in use";
            }
        }
        if($username_alert == "" && $phone_alert == "" && $name_alert == "" && $password_alert == "") {
            $sql = "INSERT INTO users (firstname, lastname, gender, username, password, phone, address) 
            VALUES ('$firstname', '$lastname', '$gender', '$username', '$password', '$phone', '$address')";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if($result == true) {
                header('Location: SignIn.php');
            } else {
                echo '<script>alert("Error signing up")</script>';
            }
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
    <title>Sign Up | Food Delivery</title>
</head>
<body>
    <header>
        <!-- <?php include('navbar.php') ?> -->
        <?php include('css_linker.php'); ?>
    </header>

    <main id="sign-pages" class="signup flex flex-row flex-center center">
        <div class="close-button">
                <a href="index">
                    <i class="fa fa-close"></i>
                </a>
            </div>
        <h1>Sign Up</h1>
        <form action="" method="post">
        <p><?php echo $name_alert ?></p>
        <p><?php echo $username_alert ?></p>
        <p><?php echo $password_alert ?></p>
        <p><?php echo $phone_alert ?></p>
            <input type="text" name="firstname" placeholder="First Name" required>
            <br>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <br>
            <input type="radio" name="gender" value="M" required>
            <label for="">Male</label>
            <input type="radio" name="gender" value="F" required>
            <label for="">Female</label>
            <br>
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <input type="text" name="phone" placeholder="Phone" required>
            <br>
            <input type="text" name="address" placeholder="Address" required>
            <br>
            <button class="btn round" type="submit" name="signup">Sign Up</button>
        </form>
        <p>Already have an account? <a href="Signin.php">Sign In</a></p>
    </main>

    <?php include('js_linker.php'); ?>
    <!-- <?php include ('footer.php') ?> -->
</body>
</html>