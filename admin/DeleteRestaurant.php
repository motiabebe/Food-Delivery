<?php
include('../backend/db.php');
if(isset($_POST['delete'])) {
   
    $id = $_POST['id'];

    $delete = "DELETE FROM restaurants WHERE restaurant_id = '$id'";
    $result = mysqli_query($conn, $delete);
    if($result == true) {
        header('Location: ViewRestaurants.php');
    } else {
        echo '<script>alert("Error deleting restaurant")</script>';
    }
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Restaurant | cPanel</title>
</head>
<body>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>

        <!-- get restaurant id from url and display restaurant details -->
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM restaurants";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    if($row['restaurant_id'] == $id) {
                        $restaurant_id = $row['restaurant_id'];
                        $restaurant_name = $row['restaurant_name'];
                        $restaurant_logo = $row['restaurant_logo'];
                    }
                }
            }
        ?>

    <main class="dash-main">
        <h2>Delete Restaurant</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $restaurant_id ?>">
            <img src="../assets/<?php echo $restaurant_logo ?>" alt="" height="50px" height="50px">
            <h2><?php echo $restaurant_name ?></h2>
            <p>Do you want to delete <?php echo $restaurant_name ?></p>
            <button class="btn bg-black round" name="delete">Delete</button>
        </form>
    </main>

    <?php include('js_linker.php'); ?>
</body>
</html>
