<?php
    //connecting db
    $conn = mysqli_connect('localhost','sourav','sourav123','prison');

    //check connection


    if(!$conn){
        echo 'Connection error : ' . mysqli_connect_error();
    }
?>
