<?php include('session.php'); ?>
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
    </header>

    <main class="dash-main">
        <h2>Viewing Foods</h2>  
        <!-- <div class="flex flex-end">
            <h4>Filter</h4>
            <form action="" method="POST">
                <select name="" id="">
                    <?php foreach($restaurants as $restaurant): ?>
                    <option value="<?php echo $restaurant['restaurant_id'] ?>"><?php echo $restaurant['restaurant_name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-s bg-green round" name='filter'>Filter</button>
            </form>

        </div>       -->
        <table class="table">

                <tr class="bg-blue">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Restaurant</th>
                    <th>Price</th>
                </tr>
                <?php foreach($foods as $food): ?>
                <tr>
                    <th><?php echo $food['food_id'] ?></th>
                    <th><?php echo $food['name'] ?></th>
                    <th><?php echo $food['restaurant_name'] ?></th>
                    <th><?php echo $food['price'] ?></th>
                </tr>
                <?php endforeach; ?>
            </table>



        </main>
        <?php include ('js_linker.php') ?>

</body>
</html>