<?php include('session.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="color-scheme" content="dark light"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Restaurants | cPanel</title>
</head>
<body>
    <header>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>
    </header>

    <main class="dash-main">
        <h2>Viewing Restaurants</h2>        
        <table class="table">
            <tr class="bg-blue">
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php foreach($restaurants as $restaurant): ?>
                <tr>
                    <td><?php echo $restaurant['restaurant_id']; ?></td>
                    <th><img src="../assets/<?php echo $restaurant['restaurant_logo'] ?>" alt="" height="50px" height="50px"></th>
                    <th><?php echo $restaurant['restaurant_name'] ?></th>
                    <th><?php echo $restaurant['restaurant_address'] ?></th>
                    <th><?php echo $restaurant['restaurant_phone'] ?></th>
                    <th><?php echo $restaurant['restaurant_email'] ?></th>
                    <th><?php echo $restaurant['restaurant_website'] ?></th>
                    <th>
                            <!-- <input type="hidden" name="restaurant_id" value="<?php echo $restaurant['restaurant_id'] ?>">
                            <button class="btn btn-s bg-white round" name="edit">Edit</button> -->
                            <button class="btn btn-s bg-green round">
                                <i class="fa fa-edit"></i>
                                <a href="EditRestaurant.php?id=<?php echo $restaurant['restaurant_id']; ?>">Edit</a>
                            </button>
                    </th>
                    <th>
                        <button class="btn btn-s bg-red round">
                            <i class="fa fa-delete-left"></i>
                            <a href="DeleteRestaurant.php?id=<?php echo $restaurant['restaurant_id']; ?>">Delete</a>
                        </button>
                    </th>
                </tr>
                <?php endforeach; ?>
            </table>



        </main>
        <?php include ('js_linker.php') ?>

</body>
</html>