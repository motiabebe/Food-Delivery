<?php include('backend/db.php')?>
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
            <h1 class="">Your Search Results</h1>
        </div>

        <?php if(!isset($_GET['submit'])) {
            print("<div class='col-span-5 center'>
                        <h3>search_option is not selected</h3>
                     </div>");
        }?>

        <?php 
        // if(isset($_GET['sumbit'])) {

            $search_option = $_GET['search_option'];
            $search = $_GET['search'];

            echo '<script>console.log("'.$search_option.'")</script>';
            
            // store res
            
            if($search_option == 'food') {
                $foods = mysqli_query($conn, "SELECT * FROM foods
                INNER JOIN RESTAURANTS ON FOODS.restaurant_id = RESTAURANTS.restaurant_id
                WHERE foods.name like '%$search%'") or die (mysqli_error($conn));
                    print("
                    <div>
                    </div>
                        <div class='col-span-4'>
                            <p>Search for $search</p>
                                <div class='grid col-4'>");
                    foreach($foods as $food) { print("
                                    <div class='card center'>
                                        <div class='card-icon'>
                                            <img src='assets/img/$food[image] ?>' class='img-small img-circle'>
                                        </div>
                                        <div class='card-title'>
                                            <h3>$food[name]</h3>
                                        </div>
                                        <div class='card-data'>
                                        <p><i class='fa-solid fa-kitchen-set'></i>: <a href='ViewRestaurant.php=?id$food[restaurant_id]'>
                                        $food[restaurant_name]</a></p>                                       
                                            <button class='btn round bg-white'>
                                                <i class='fa-solid fa-eye'></i>
                                                <a href='SignIn.php'>Sign In To View</a>
                                            </button>
                                    </div> 
                                ");
                                print('
                                </div>');
                            }
                        }
                else if($search_option == 'restaurant') {
                $restaurants = mysqli_query($conn, "SELECT * FROM restaurants WHERE restaurant_name like '%$search%'") or die (mysqli_error($conn));
                    print("
                    <div>
                    </div>
                        <div class='col-span-4'>
                            <p>Search for $search.</p>
                                <div class='grid col-4'>");
                    foreach($restaurants as $restaurant) { print("
                                    <div class='card center'>
                                        <div class='card-icon'>
                                            <img src='assets/$restaurant[restaurant_logo] ?>' class='img-small img-circle'>
                                        </div>
                                        <div class='card-title'>
                                            <h3>$restaurant[restaurant_name]</h3>
                                        </div>
                                        <div class='card-data'>
                                            <p>$restaurant[restaurant_description]</p>
                                            <p><i class='fa-solid fa-location'></i>$restaurant[restaurant_address]</p>
                                            <button class='btn round bg-white'>
                                                <i class='fa-solid fa-eye'></i>
                                                <a href='SignIn.php'>Sign In To View</a>
                                            </button>
                                        </div>
                                        </div>");
                    }
                    print('</div>');
                }
        ?>        


    
    </main>

<?php include('footer.php') ?>
</body>
</html>