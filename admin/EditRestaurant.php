<?php
include('session.php');

if(isset($_POST['update'])) {
    // Get the form data and check if it is empty
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $description = $_POST['description'];

    if(empty($name) || empty($address) || empty($phone) || empty($email) || empty($website) || empty($description)) {
        echo '<script>alert("Please fill in all the fields")</script>';
    } else {
        $update = "UPDATE restaurants SET restaurant_name = '$name', restaurant_address = '$address', restaurant_phone = '$phone', restaurant_email = '$email', restaurant_website = '$website', restaurant_description = '$description' WHERE restaurant_id = '$id'";

        
        if (!empty($_FILES['logo']['name'])) {
            $logo = $_FILES['logo']['name'];
            $logo_temp= $_FILES['logo']['tmp_name'];
            $logo_path = "../assets/";
            $update_logo = "UPDATE restaurants SET restaurant_logo = '$logo' WHERE restaurant_id = '$id'";
            move_uploaded_file($logo_temp, $logo_path.$logo);
            mysqli_query($conn, $update_logo);
        }
        $result = mysqli_query($conn, $update);
        if($result == true) {
            header('Location: ViewRestaurants.php');
        } else {
            echo '<script>alert("Error updating restaurant")</script>';
        }
    };
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Restaurant | cPanel</title>
</head>
<body>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>

        <!-- get restaurant id from url and display restaurant details -->
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM restaurants";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    if($row['restaurant_id'] == $id) {
                        $restaurant_id = $row['restaurant_id'];
                        $restaurant_name = $row['restaurant_name'];
                        $restaurant_address = $row['restaurant_address'];
                        $restaurant_phone = $row['restaurant_phone'];
                        $restaurant_email = $row['restaurant_email'];
                        $restaurant_website = $row['restaurant_website'];
                        $restaurant_description = $row['restaurant_description'];
                        $restaurant_logo = $row['restaurant_logo'];
                    }
                }
            }
        ?>

    <main class="dash-main">
        <h2>Update Restaurant</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <button class="btn bg-black round" name="update">Update</button>
            <div class="grid grid-center">
                    <input type="hidden" name="id" value="<?php echo $restaurant_id ?>">
                    <img src="../assets/<?php echo $restaurant_logo ?>" alt="" class="img-small img-circle">
                    <input type="file" name="logo" id="">
                    <label for="">Name: </label>
                    <input type="text" name="name" id="" value="<?php echo $restaurant_name ?>" required>
                    <label for="">Address: </label>
                    <input type="text" name="address" id="" value="<?php echo $restaurant_address ?>" required>
                    <label for="">Phone: </label>
                    <input type="text" name="phone" id="" value="<?php echo $restaurant_phone ?>" required>
                    <label for="">Email: </label>
                    <input type="text" name="email" id="" value="<?php echo $restaurant_email ?>" required>
                    <label for="">Website: </label>
                    <input type="text" name="website" id="" value="<?php echo $restaurant_website ?>" required>
                    <label for="">Description: </label>
                    <input name="description" id="" value="<?php echo $restaurant_description ?>" required></input>
            </div>
                

        </form>
    </main>

    <?php include('js_linker.php'); ?>
</body>
</html>
