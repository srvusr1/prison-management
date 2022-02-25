<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
include('../db_connect.php');
$sqllogin = 'SELECT * FROM login_db';
$resultlogin = mysqli_query($conn, $sqllogin);
$logins =  mysqli_fetch_all($resultlogin, MYSQLI_ASSOC);
mysqli_free_result($resultlogin);
$date = date("Y-m-d H:i:s");
$dead = '0000-00-00 00:00:00';
$username = $_SESSION["username"];
$sql = "UPDATE login_db SET LOGOUT_TIME = '$date' WHERE LOGOUT_TIME = '$dead' AND USERNAME = '$username'";
if(mysqli_query($conn,$sql)){
    //success
    echo 'success';
}
unset($_SESSION["username"]);
unset($_SESSION["id"]);
header("Location:../login/login.php");
?>