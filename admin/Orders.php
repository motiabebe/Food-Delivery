<?php include('session.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="color-scheme" content="dark light"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | cPanel</title>
</head>
<body>
    <header>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>
    </header>

    <main class="dash-main">
        <h2>Orders</h2>
        <div class="grid col-2 row-2 center">
            <div class="card bg-blue round">
                <a href="PendingOrders">
                    <h2><?php echo $orders_pending->num_rows; ?>  Pending Orders</h2>
                </a>
            </div>
            <div class="card bg-green round">
                <a href="DeliveredOrders">
                    <h2><?php echo $orders_deliverd->num_rows; ?>  Delivered Orders</h2>
                </a>
            </div>
            <div class="card col-span-2 bg-red round">
                <h2 class="fs-2">
                    <?php echo $orders->num_rows; ?> Total Orders
                </h2>
            </div>
        </div>
    </main>
        <?php include ('js_linker.php') ?>

</body>
</html>
