<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
include('../db_connect.php');
//write query for all login
$sqluser = 'SELECT * FROM user_db';
$sqllogin = 'SELECT * FROM login_db';
// INSERT INTO `user_db`(`USERNAME`, `PASSWORD`) VALUES ('[value-1]','[value-2]','[value-3]')
//make query and get result
$resultuser = mysqli_query($conn, $sqluser);
$resultlogin = mysqli_query($conn, $sqllogin);
//fetch the resulting rows as an array
$users = mysqli_fetch_all($resultuser, MYSQLI_ASSOC);
$logins =  mysqli_fetch_all($resultlogin, MYSQLI_ASSOC);
//free result form memory
mysqli_free_result($resultuser);
mysqli_free_result($resultlogin);
$errors = array('username' => '', 'password' => '');
$username = $password = '';
if (isset($_POST['submit'])) {
    // check name and password
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username is required <br/>';
    } else {
        $username = $_POST['username'];
        // echo $username;
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required <br/>';
    } else {
        $password = $_POST['password'];
        // echo $password;
    }
    $flag = 0;
    if (!array_filter($errors)) {
        foreach ($users as $user) {
            if ($user['USERNAME'] == $username && $user['PASSWORD'] == $password && $flag != 1) {
                echo 'login success';
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                //session
                $_SESSION["username"] = $username;
                //saving log file
                $name = '';
                $date = date("Y-m-d H:i:s");
                $changes = 0;
                foreach ($users as $user) {
                    if ($user['USERNAME'] == $username) {
                        $name = $user['NAME'];
                    }
                }
                $sql = "INSERT INTO login_db(USERNAME,NAME,LOGIN_TIME,LOGOUT_TIME,CHANGES_COUNT) VALUES ('$username', '$name','$date','NULL','$changes')";
                //save to db and check
                if (mysqli_query($conn, $sql)) {
                    //success
                    if (isset($_SESSION["username"])) {
                        header("Location:../index/index.php");
                    }
                } else {
                    //echo error
                    echo 'Error : ' . mysqli_error($conn);
                }
                // header('Location:index.php');
                $flag = 1;
            }
        }
    }
    if ($flag == 0) {
        $errors['username'] = 'User not found';
        $errors['password'] = 'Wrong password';
    }
    //close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER LOGIN</title>
</head>
<link rel="stylesheet" href="style.css">
<body background="">
    <section class="section">
        <div class="split-left">
            <div class="inner-of-left">
                <h1 class="title">User Login</h1>
                <form action="" method="POST" class="form">
                    <div class="username-div">
                        <!-- <label class="username">Userame</label> -->
                        <br>
                        <input type="text" name="username" placeholder="Username" value="<?php echo $username ?>" required>
                        <div class="errors"><?php echo $errors['username']; ?></div>
                    </div>
                    <!-- <label class="password">Password</label> -->
                    <br>
                    <input type="password" name="password" placeholder="Password" required>
                    <div class="errors"><?php echo $errors['password']; ?></div>
                    <br>
                    <div class="submit">
                        <button name="submit" class="submit" value="Login">Login</button>
                        <button value="Reset Login" onClick="location.href='../login/login.php'">Reset</button>
                    </div>
                    <div class="button">
                        <button value="Admin Login" onClick="location.href='../admin/admin.php'" style="background-color: blue">Admin</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="split-right">
            <div class="inner-of-right">
                <img src="../Assets/portal.png" alt="">
            </div>
        </div>
    </section>
</body>
</html>