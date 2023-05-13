<?php include ('session_check.php');


if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "SELECT * FROM foods 
    INNER JOIN restaurants ON foods.restaurant_id = restaurants.restaurant_id
    WHERE food_id = '$id'";
    $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

        foreach($result as $row) {
            $name = $row['name'];
            $price = $row['price'];
            $description = $row['description'];
            $restaurant_id = $row['restaurant_id'];
            $restaurant_name = $row['restaurant_name'];
            $image = $row['image'];
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
        <title><?php echo $name ?> | Food Delivery</title>
        <?php include('navbar.php') ?>
        <?php include('css_linker.php'); ?>
        <?php 
        ?>
    </header>

    <main id="view" class="grid grid-center col-2 row-3">
        <div class="row-span-2">
            <div class="card-icon">
                <img src="../assets/img/<?php echo $image ?>" class="img-min">
            </div>
        </div>
        <div class="row-span-2">
            <div class="card-title">
                <h2><?php echo $name ?></h2>
                <h3>
                    <a class="underline" href="ViewRestaurant.php?id=<?php echo $restaurant_id ?>">
                        <?php echo $restaurant_name ?>
                    </a>
                </h3>
                <h4><?php echo $description ?></h4>
            </div>
        </div>
            <div class="card-data">
                <h3>Price: <?php echo $price ?>$</h3>
            </div>
            <div class="card-data center">
                <button class="btn round">
                    <i class="fa-solid fa-cart-plus"></i> 
                    <a href="add_to_cart.php?id=<?php echo $id ?>">Add to Cart</a>
                </button>
        </div>





    </main>

    <?php include('footer.php') ?>
</body>
</html>