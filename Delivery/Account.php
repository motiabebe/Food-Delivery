<?php
include('session.php');
include('css_linker.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>
<body>
  <?php include('navbar.php'); ?>
  <div id="main">
      <h2>Your Account</h2>
      <button class="btn"><a href="ChangePassword.php?id=<?php echo $delivery_id ?>">Change Password</a></button>
      <button class="btn"><a href="Logout.php">Logout</a></button>

      <br>
      <h3>Account Details</h3>
      <p>Name: <?php echo $delivery_name ?></p>
      <p>Phone: <?php echo $delivery_phone ?></p>

  </div>


</body>
</html>
