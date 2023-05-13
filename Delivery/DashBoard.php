<?php
include('session.php');
include('css_linker.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
  <?php include('navbar.php'); ?>
  <div id="main">
      <h2>Welcome <?php echo $name?></h2>
  </div>
  <main class="grid col-2"> 
        <div class="card bg-blue round">
          <div class="card-title">
            <h2>Delivered Orders</h2>
          </div>
          <div class="card-data">
            <h1><?php echo $orders_complete_count ?></h1>
          </div>
        </div>

        <div class="card bg-red round fle">
          <div class="card-title">
            <h2>Pending Orders</h2>
          </div>
          <div class="card-data">
            <h1><?php echo $orders_pending_count ?></h1>
          </div>
        </div>

    </main>

</body>
</html>
