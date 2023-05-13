<?php 
$signin_alert = "";
session_start();
// database connection
include('backend/db.php');

    // check login
    if(isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result)) {
            if($row['username'] == $username && $row['password'] == $password) {
                $_SESSION['id'] = $row['user_id'];
                header("Location: user/Home.php");
            } else {
                $signin_alert = "Username or Password is incorrect";
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
    <title>Sign In | Food Delivery</title>
</head>
<body>
    <header>
        <?php include('css_linker.php'); ?>
    </header>

    <main id="sign-pages" class="signin flex flex-center flex-row">
        <div class="close-button">
            <a href="index">
                <i class="fa fa-close"></i>
            </a>
        </div>

        <h1>Sign In</h1>

        <form action="" method="post" class="center">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <p><?php echo $signin_alert ?></p>
            <button class="btn round" type="submit" name="signin">Sign In</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </main>


    <?php include('js_linker.php'); ?>
    <!-- <?php include ('footer.php') ?> -->
</body>
</html>