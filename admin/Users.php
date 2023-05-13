<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | cPanel</title>
</head>
<body>
        <?php include('css_linker.php'); ?>
        <?php include('navbar.php') ?>
        <?php include('../backend/db.php') ?>

        <main class="dash-main">
            <h2>Users</h2>
            <table class="table">
                <tr class="bg-blue">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Delete</th>
                </tr>
                    <?php $users = $conn->query("SELECT * FROM users"); ?>
                    <?php foreach($users as $user): ?>
                <tr>
                    <th><?php echo $user['id'] ?></th>
                    <th><?php echo $user['name'] ?></th>
                    <th><?php echo $user['phone'] ?></th>
                    <th><?php echo $user['location'] ?></th>
                    <th>
                        <button class="btn btn-s bg-red round">
                            <i class="fa fa-trash"></i>
                                <a href="#">Delete</a>
                        </button>
                    </th>
                </tr>
                    <?php endforeach; ?>
                </table>
        </main>


        <?php include('js_linker.php'); ?>
</body>
</html>