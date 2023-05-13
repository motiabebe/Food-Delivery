<!-- add in to delivery table -->
<?php include('../../backend/db.php') ?>
<?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO delivery (name, phone) VALUES ('$name', '$phone')";
    $conn->query($sql);
    header('Location: ../ViewDelivery.php');
?>

