<?php
include('../backend/db.php');
if(isset($_POST['delete'])) {
   
    $id = $_POST['id'];

    $delete = "DELETE FROM delivery WHERE delivery_id = '$id'";
    $result = mysqli_query($conn, $delete);
    if($result == true) {
        header('Location: ViewDelivery.php');
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
    <title>Delete Delivery | cPanel</title>
</head>
<body>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>

        <!-- get restaurant id from url and display restaurant details -->
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM delivery";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    if($row['delivery_id'] == $id) {
                        $delivery_id = $row['delivery_id'];
                        $delivery_name = $row['delivery_name'];
                    }
                }
            }
        ?>

    <main class="dash-main">
        <h2>Delete Restaurant</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $delivery_id ?>">
            <h2>Name: <?php echo $delivery_name ?></h2>
            <p>Do you want to delete delivery <?php echo $delivery_name ?></p>
            <button class="btn bg-black round" name="delete">Delete</button>
        </form>
    </main>

    <?php include('js_linker.php'); ?>
</body>
</html>
