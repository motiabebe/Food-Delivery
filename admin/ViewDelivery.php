<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="color-scheme" content="dark light"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Delivery | cPanel</title>
</head>
<body>
    <header>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>
    </header>

    <main class="dash-main">
        <h2>Viewing Delivery</h2>
            <table class="table center">
                <thead>
                    <tr class="bg-blue">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($delivery as $del): ?>
                    <tr>
                        <td><?php echo $del['delivery_id'] ?></td>
                        <td><?php echo $del['delivery_name'] ?></td>
                        <td><?php echo $del['phone'] ?></td>
                        <td><?php echo $del['gender'] ?></td>
                        <td>
                            <button class="btn btn-s bg-red round">
                                <i class="fa fa-trash"></i>
                                <a href="DeleteDelivery.php?id=<?php echo $del['delivery_id'] ?>">Delete</a>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>   
        </main>
        <?php include ('js_linker.php') ?>

</body>
</html>