<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food | cPanel</title>
</head>
<body>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>
        <?php include('../backend/db.php') ?>

    <main class="dash-main">
        <h2>Add Food</h2>
        <form action="food_backend/Add.php" method="post">
            <div class="input-group flex flex-row">
                <label for="">Name: </label>
                <input type="text" name="name" id="">
                <label for="">Restaurant: </label>
                <select name="" id="">
                    <?php $restaurants = $conn->query("SELECT * FROM restaurants"); ?>
                    <?php foreach($restaurants as $restaurant): ?>
                        <option value="<?php echo $restaurant['id'] ?>"><?php echo $restaurant['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="">Price: </label>
                <input type="text" name="price" id="">
            </div>
            <button class="btn bg-black round">Add</button>
        </form>
    </main>

    <?php include('js_linker.php'); ?>

    
</body>
</html>