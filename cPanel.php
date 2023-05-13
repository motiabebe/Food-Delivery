<?php 
$signin_alert = "";
session_start();
// database connection
include('backend/db.php');

    // check login
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM admin";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result)) {
            if($row['admin_username'] == $username && $row['admin_password'] == $password) {
                $_SESSION['id'] = $row['admin_id'];
                echo "Login Successful";
                header("Location: admin/Dashboard.php");
            } else {
                $signin_alert = "Login Failed";
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
    <title>Sign In | cPanel</title>
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

        <h1>Sign Into cPanel</h1>

        <form action="" method="post" class="center">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <p><?php echo $signin_alert ?></p>
            <button class="btn round" type="submit" name="submit">Sign In</button>
        </form>
    </main>


    <?php include('js_linker.php'); ?>
    <!-- <?php include ('footer.php') ?> -->
</body>
</html>