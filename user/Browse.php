<?php include ('session_check.php');?>
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
        <?php 
        ?>
    </header>

    <main id="browse" class="grid col-5">
        <div>
            <!-- EMPTY -->
        </div>
        <div class="col-span-4">
            <h1 class="">Browse</h1>
                <form action="browse.php" method="post">
                    <label for="view_by">View by:</label>
                    <select name="view_by">
                        <option value="Food">Food</option>
                        <option value="Restaurant">Restaurant</option>
                    </select>
                    <input type="submit" name="browse" value="Filter">
                </form>
        </div>

        <?php if(!isset($_POST['view_by'])) {
            print("<div class='col-span-5 center'>
                        <h1>Please select a filter</h1>
                     </div>");
        }?>

        <?php 
        if(isset($_POST['browse'])) {

            $view = $_POST['view_by'];
            
            // store res
            
            if($view == 'Food') {
                $foods = mysqli_query($conn, "SELECT * FROM foods
                INNER JOIN RESTAURANTS ON FOODS.restaurant_id = RESTAURANTS.restaurant_id") or die (mysqli_error($conn));
                    print("
                    <div>
                    </div>
                        <div class='col-span-4'>
                            <p>Browse our menu and find the food you want.</p>
                                <div class='grid col-4'>");
                    foreach($foods as $food) { print("
                                    <div class='card center'>
                                        <div class='card-icon'>
                                            <img src='../assets/img/$food[image] ?>' class='img-small img-circle'>
                                        </div>
                                        <div class='card-title'>
                                            <h3>$food[name]</h3>
                                        </div>
                                        <div class='card-data'>
                                        <p><i class='fa-solid fa-kitchen-set'></i>: <a href='ViewRestaurant.php=?id$food[restaurant_id]'>
                                        $food[restaurant_name]</a></p>                                       
                                            <button class='btn round bg-white'>
                                                <i class='fa-solid fa-eye'></i>
                                                <a href='Viewfood.php?id=$food[food_id]'>View food</a>
                                            </button>
                                    </div> 
                                ");
                                print('
                                </div>');
                            }
                        }
                else if($view == 'Restaurant') {
                $restaurants = mysqli_query($conn, "SELECT * FROM restaurants") or die (mysqli_error($conn));
                    print("
                    <div>
                    </div>
                        <div class='col-span-4'>
                            <p>Discover new restaurants.</p>
                                <div class='grid col-4'>");
                    foreach($restaurants as $restaurant) { print("
                                    <div class='card center'>
                                        <div class='card-icon'>
                                            <img src='../assets/$restaurant[restaurant_logo]' class='img-small img-circle'>
                                        </div>
                                        <div class='card-title'>
                                            <h3>$restaurant[restaurant_name]</h3>
                                        </div>
                                        <div class='card-data'>
                                            <p>$restaurant[restaurant_description]</p>
                                            <p><i class='fa-solid fa-location'></i>$restaurant[restaurant_address]</p>
                                            <button class='btn round bg-white'>
                                                <i class='fa-solid fa-eye'></i>
                                                <a href='ViewRestaurant.php?id=$restaurant[restaurant_id]'>View Restaurant</a>
                                            </button>
                                        </div>
                                        </div>");
                    }
                    print('
                    </div>');
                }
        }
        ?>        


    
    </main>

<?php include('footer.php') ?>
</body>
</html>