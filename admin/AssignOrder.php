<?php include('session.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
} else {
    header('Location: Orders.php');
}

if(isset($_POST['submit'])) {
    $delivery_person = $_POST['delivery_person'];
    $query = "UPDATE orders SET delivery_id = $delivery_person WHERE orders_id = '$id'";
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    header('Location: Orders.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="color-scheme" content="dark light"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
</head>
<body>
    <header>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>
    </header>

    <main class="dash-main">
        <h2>Assign Ordes</h2>  
        <table class="table center">
            <tr class="bg-blue">
                <td>Order ID</td>
                <td>User Name</td>
                <td>Food</td>
                <td>Restaurant</td>
                <td>Pickup Address</td>
                <td>Price</td>
                <td>Delivery Address</td>
                <td>Order Status</td>
                <th>Assigned Delivery</th>
                <td>Action</td>
            </tr>
            <tr>
                <td><?php echo $order_id?></td>
                <td><?php echo $username?></td>
                <td><?php echo $food_name?></td>
                <td><?php echo $restaurant_name?></td>
                <td><?php echo $useraddress?></td>
                <td><?php echo $food_price?></td>
                <td><?php echo $useraddress?></td>
                <td><?php echo $order_status?></td>
                <td>
                    <form action="" method="POST">
                        <select name="delivery_person" id="">
                            <option value="">Select Delivery Person</option>
                            <?php 
                            $query = "SELECT * FROM delivery";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['delivery_id'];
                                $name = $row['delivery_name'];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="submit" name="submit" value="Assign"></td>
                </form>
            </tr>    




        </main>
        <?php include ('js_linker.php') ?>

</body>
</html>