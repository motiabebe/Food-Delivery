<?php include ('session_check.php');

$cart_items = mysqli_query($conn, "SELECT * FROM foods INNER JOIN cart ON foods.food_id = cart.food_id WHERE cart.user_id = $user_id");

$cart_items_count = mysqli_num_rows($cart_items);

$total_price = 0;

if(isset($_POST['submit'])) {
        foreach($cart_items as $cart_item) {
            $insert_order = "INSERT INTO orders (user_id, food_id, order_status) VALUES ('$user_id', '$cart_item[food_id]', 'Pending')";
            mysqli_query($conn, $insert_order) or die(mysqli_error($conn));

            $delete_cart = "DELETE FROM cart WHERE cart_id = '$cart_item[cart_id]'";
            mysqli_query($conn, $delete_cart) or die(mysqli_error($conn));
            header('Location: cart.php');
    }
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
    </header>

    <main id="browse" class="grid col-5">
        <div class="">

        </div>
        <div class="col-span-4">
            <h1>Your Cart</h1>
            <p>Check out your cart and make sure you have everything you need.</p>

    </main>
    
<?php include('footer.php') ?>
</body>
</html>