<?php include ('session_check.php');


if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "SELECT * FROM restaurants 
    INNER JOIN foods ON foods.restaurant_id = restaurants.restaurant_id
    WHERE restaurants.restaurant_id = '$id'";
    $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

        foreach($result as $row) {
            $restaurant_id = $row['restaurant_id'];
            $restaurant_name = $row['restaurant_name'];
            $restaurant_address = $row['restaurant_address'];
            $restaurant_phone = $row['restaurant_phone'];
            $restaurant_email = $row['restaurant_email'];
            $restaurant_website= $row['restaurant_website'];
            $restaurant_logo = $row['restaurant_logo'];
            $restaurant_description = $row['restaurant_description'];
            // food details
            
            $food_id = $row['food_id'];
            $name = $row['name'];
            $price = $row['price'];
            $image = $row['image'];
            $type = $row['type'];
        }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <header>
        <title><?php echo $restaurant_name ?> | Food Delivery</title>
        <?php include('navbar.php') ?>
        <?php include('css_linker.php'); ?>
        <?php 
        ?>
    </header>

    <main id="view" class="grid grid-center col-2 row-3">
        <div class="row-span-2">
            <div class="card-icon">
                <img src="../assets/<?php echo $restaurant_logo ?>" class="img-min">
            </div>
        </div>
        <div class="row-span-2">
            <div class="card-title">
                <h2><?php echo $restaurant_name ?></h2>
                <h3><?php echo $restaurant_description ?></h3>
                <h4>Email: <?php echo $restaurant_email ?></h4>
                <h5>Website: <?php echo $restaurant_website ?></h5>
            </div>
        </div>
        <div class="card-data">
                <h3>Location: <?php echo $restaurant_address ?></h3>
            </div>
            <div class="card-data center">
                <h3>Phone: <?php echo $restaurant_phone ?></h3>

        </div>

        <div class="col-span-2 grid">
            <h3><?php echo $restaurant_name." 's " ?> Menu</h3>
            <table class="">
                <tr>
                    <td></td>
                    <td>Name</td>
                    <td>Type</td>
                    <td>Price</td>
                    <td>Add to Cart</td>
                </tr>
                <tr>
                    <td><img src="../assets/img/<?php echo $image ?>" class="img-small img-circle"></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $type ?></td>
                    <td><?php echo $price ?></td>
                    <td><a href="add_to_cart.php?id=<?php echo $food_id ?>" class="btn btn-s bg-green round">Add</a></td>
                </tr>
            </table>
        </div>





    </main>

    <?php include('footer.php') ?>
</body>
</html>