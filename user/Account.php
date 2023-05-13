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
    </header>

    <main id="account" class="grid grid-center">
    <div class="">
            <h1>Your Account</h1>
            <?php include('account_nav.php'); ?>
            <div id="account_details" class="flex flex-row flex-center center">
                    <h2>Account Details</h2>
                    <div class="card">
                        <div class="card-title">
                            <label>Name:</label>
                            <?php echo $first_name.''.$last_name ?>
                        </div>
                        <div class="card-title">
                            <label>Email:</label>
                            <?php echo $address ?>
                        </div>
                        <div class="card-title">
                            <label>Phone:</label>
                            <?php echo $phone ?>
                        </div>
                        <div class="card-title">
                            <label>Address:</label>
                            <?php echo $address ?>
                        </div>
                    </div>
                </div>
        </div>
    </main>

    

<?php include('footer.php') ?>
</body>
</html>