<?php include('session.php') ?>
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
        <div class="top-bar flex flex-end">
                <h3>Welcome, <?php echo $name ?></h3>
                <span id="CurrentDay"></span>
        </div>
    </header>

    <main class="dash-main">
        <div class="dash-title flex">
            <h2>DashBoard</h2>
            <!-- <dialog id="CurrentOrders" class="Dialog bg-blue">
                <button class="btn btn-s bg-white round" onclick="CloseCurrentOrder()">Close</button>
                <h2 class="">Current Orders</h2>
            </dialog>

                <button class="btn bg-blue round" onclick="OpenCurrentOrder()">Current Orders</button> -->
        </div>            
            <div class="grid col-2 row-2">
                <div class="card bg-blue round">
                    <div class="card-icon">
                        <i class="fa fa-2xl fa-car-side"></i>
                    </div>
                    <div class="card-title">
                        <h2>Out For Delivery</h2>
                    </div>
                    <div class="card-data">
                        <h1><?php echo $orders_pending->num_rows; ?></h1>
                    </div>
                </div>

                <div class="card bg-green round">
                    <div class="card-icon">
                        <i class="fa fa-2xl fa-clock-four"></i>
                    </div>
                    <div class="card-title">
                        <h2>Total Delivered</h2>
                    </div>
                    <div class="card-data">
                        <h1><?php echo $orders_deliverd->num_rows; ?></h1>
                        <p>Last Updated - <span id="CurrentTime"></span></p>
                    </div>
                </div>

                <div class="card bg-red round">
                    <div class="card-icon">
                        <i class="fa fa-2xl fa-cubes-stacked"></i>
                    </div>
                    <div class="card-title">
                        <h2>Total Orders</h2>
                    </div>
                    <div class="card-data">
                        <h1><?php echo $orders->num_rows; ?></h1>
                    </div>
                </div>

                <div class="card bg-black round">
                    <div class="card-icon">
                        <i class="fa fa-2xl fa-users"></i>
                    </div>
                    <div class="card-title">
                        <h2>Total Customers</h2>
                    </div>
                    <div class="card-data">
                        <h1><?php echo $users->num_rows; ?></h1>
                    </div>
                </div>
            </div>
        </main>

        <?php include ('js_linker.php') ?>

</body>
</html>