<?php include ('session_check.php');

$cart_items = mysqli_query($conn, "SELECT * FROM foods INNER JOIN cart ON foods.food_id = cart.food_id WHERE cart.user_id = $user_id");

$cart_items_count = mysqli_num_rows($cart_items);

$total_price = 0;

if(isset($_POST['submit'])) {
    $timestamp = date("Y-m-d H:i:s");
        foreach($cart_items as $cart_item) {
            $insert_order = "INSERT INTO orders (user_id, food_id, order_status, datetime) VALUES ('$user_id', '$cart_item[food_id]', 'Pending','$timestamp' )";
            mysqli_query($conn, $insert_order) or die(mysqli_error($conn));

            $delete_cart = "DELETE FROM cart WHERE cart_id = '$cart_item[cart_id]'";
            mysqli_query($conn, $delete_cart) or die(mysqli_error($conn));
            header('Location: cart.php');
    }
    header('Location: Myorders.php?success=true');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse | Food Delivery</title>

</head>
<body>
    <header>
        <?php include('navbar.php') ?>
        <?php include('css_linker.php'); ?>
        <?php 

        

        ?>
    </header>

    <main id="browse" class="grid col-5">
        <div class="">

        </div>
        <div class="col-span-4">
            <h1>Your Cart</h1>
            <p>Check out your cart and make sure you have everything you need.</p>
            <div class="grid col-4">
                <?php 
                if($cart_items_count == 0) {
                    print("<div class='card'>
                                <div class='card-title'>
                                    <h3>Your cart is empty</h3>
                                </div>
                            </div>");
                }
                else {
                    foreach($cart_items as $cart_item): ?>
                        <!-- start of card -->
                    <div class="card">
                        <div class="card-icon">
                            <img src="../assets/img/<?php echo $cart_item['image'] ?>" class="img-small">
                        </div>
                        <div class="card-title">
                            <h3><?php echo $cart_item['name'] ?></h3>
                        </div>
                        <div class="card-data">
                            <p>Price: <?php echo $cart_item['price'] ?></p>
                            <button class="btn round bg-red">
                                <i class="fa-solid fa-xmark"></i>
                                <a href="remove_from_cart.php?id=<?php echo $cart_item['cart_id'] ?>">Remove</a>
                            </button>
                        </div>
                    </div>
                    <?php $total_price += $cart_item['price']; ?>
                    <!-- end of card -->
                    <?php endforeach; 
                        // total 
                        print("<div class='card'>
                                    <div class='card-title'>
                                        <h3>Total: $total_price</h3>
                                        </div>
                                        <form action='' method='post'>
                                        <button class='btn round bg-red' name='submit'>
                                            <i class='fa-solid fa-check'></i>
                                            Checkout
                                        </button>
                                    </form>
                                        </div>");
                                        
                                    } ?>
                                    
            </div>
        </div>
    </main>
    
<?php include('footer.php') ?>
</body>
</html>