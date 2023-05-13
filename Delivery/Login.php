<?php
$alert = "";
include('css_linker.php');
include('../backend/db.php');

session_start();
// database connection

    // check login
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM delivery";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result)) {
            if($row['username'] == $username && $row['password'] == $password) {
                $_SESSION['delivery_id'] = $row['delivery_id']; 
                header("Location: Dashboard.php");
            } else {
                $alert = "Invalid username or password";
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
    <title>Delivery Login</title>

</head>
<body>
<main id="sign-pages" class="signin flex flex-center flex-row" style="background-image: url('../assets/img/food_1.jpg');">
        <div class="close-button">
            <a href="../">
                <i class="fa fa-close"></i>
            </a>
        </div>

        <h1>Delivery Sign In</h1>

        <form action="" method="post" class="center">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <p><?php echo $alert ?></p>
            <button class="btn round" type="submit" name="login">Log In</button>
        </form>
    </main>
</body>
</html>