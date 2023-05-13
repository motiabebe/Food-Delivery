<?php include('backend/db.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Food Delivery</title>
</head>

<body>
    <header>
        <?php include('navbar.php') ?>
        <?php include('css_linker.php'); ?>
    </header>
    
    <main id="home" class="flex flex-row">
        <h1>Find restaurants near you</h1>

        <form action="search.php" method="get">
            <select name="search_option">
                <option value="restaurant" selected>Restaurant</option>
                <option value="food">Food</option>
            </select>
            <input type="text" class="search" placeholder="Search" name="search" required>
            
            <button class="btn round"  name="submit">Search</button>
        </form>

        <h3>Fresh right to your door!</h3>
    </main>
    
    <section id="discover">
            <h1 class="center">Discover something new...</h1>

            <div class="grid col-2 row-2 center">
                <div class="row-span-2">
                        <img src="../assets/img/brand.png" alt="" width="30%">                    
                        <img src="../assets/img/brand_1.jpg" alt="" width="30%">     
                        <br>               
                        <img src="../assets/img/brand_2.jpg" alt="" width="30%">                    
                        <img src="../assets/img/brand.png" alt="" width="30%">                    
                </div>
                <div class="discover-title row-span-2 bg-blue flex flex-center"> 
                    <h1 class="fs-4">Our Exclusive Partners</h1>
                </div>
            </div>
    </section>

    <?php include('js_linker.php'); ?>
    <?php include ('footer.php') ?>

    
</body>
</html>
