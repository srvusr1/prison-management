<?php
session_start();
include('db_connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prison Management</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <h1>Hello world</h1>
    <?php if($_SESSION["username"]) { ?>
    Welcome <?php echo $_SESSION["username"];?>. Click here to <a href="logout.php" tite="Logout">Logout.
    <?php } else echo "<h1>Please login first .</h1>"; ?>
</body>
</html>
