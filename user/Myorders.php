<?php include ('session_check.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Food Delivery</title>

</head>
<body>
    <header>
        <?php include('navbar.php') ?>
        <?php include('css_linker.php'); ?>
        <?php 
        $orders = "SELECT * FROM ORDERS 
        INNER JOIN FOODS ON ORDERS.food_id = FOODS.food_id
        INNER JOIN RESTAURANTS ON FOODS.restaurant_id = RESTAURANTS.restaurant_id
        WHERE ORDERS.user_id = $user_id";
        $orders_result = mysqli_query($conn, $orders) or die (mysqli_error($conn));
        ?>
    </header>


    <main id="account" class="grid grid-center">
    <div class="">
            <h1>Your Account</h1>
            <?php include('account_nav.php'); ?>
            <div id="account_details" class="flex flex-row flex-center center">
                <h2>Your Orders</h2>
                <h1><?php 
                if(isset($_GET['success']) == 'true'){
                    echo "Your order has been placed successfully!";
                }
                ?>
                </h1>
                <div class="card">

                    <table class="table">
                <?php 
                    if($orders_count == 0) {
                        print("<h1>You have no orders yet!</h1> <button class='btn round'>
                        <a href='browse.php'>Order Now</a>
                        </button>");
                } else {
                    print("<tr class='bg-white'>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Restaurant</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>");
                }
                ?>
                        
                        <?php foreach($orders_result as $order): ?>
                            <tr>
                                <td><?php echo $order['orders_id'] ?></td>
                                <td><?php echo $order['name'] ?></td>
                                <td><?php echo $order['restaurant_name'] ?></td>
                                <td><?php echo $order['price'] ?></td>
                                <td><?php echo $order['datetime'] ?></td>
                            </tr>
                            <?php endforeach;?>
                        </table>


                </div>
        </div>
    </main>

    

<?php include('footer.php') ?>
</body>
</html>