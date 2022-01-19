<!-- INSERT INTO `user_db`(`USERNAME`, `PASSWORD`) VALUES ('[value-1]','[value-2]','[value-3]') -->

<?php

// //connecting db
// $conn = mysqli_connect('localhost','sourav','sourav123','prison');

// //check connection
// if(!$conn){
//     echo 'Connection error : ' . mysqli_connect_error();
// }

include('db_connect.php');

//write query for all login
$sql = 'SELECT * FROM user_db';
// INSERT INTO `user_db`(`USERNAME`, `PASSWORD`) VALUES ('[value-1]','[value-2]','[value-3]')

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$logins = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result form memory
mysqli_free_result($result);



// print_r($logins);

$errors = array('newusername'=>'','newpassword'=>'');
$newusername = $newpassword = '';
if(isset($_POST['submit'])){
    
    
    

    // check name and password
    if(empty($_POST['newusername'])){
        $errors['newusername'] = 'newusername is required <br/>';
    }
    else{
        $newusername = $_POST['newusername'];
        echo $newusername;
    }
    if(empty($_POST['newpassword'])){
        $errors['newpassword'] = 'newPassword is required <br/>';
    }
    else{
        $newpassword = $_POST['newpassword'];
        echo $newpassword;
    }
    // if valid credetials are entered, then login and redirect
    // if(!array_filter($errors)){
    //     // echo 'form is valid';
    //     header('Location:index.php');
    // }
    if(!array_filter($errors) ){
        // echo 'form is valid';
        // header('Location:index.php');
        $newusername = mysqli_real_escape_string($conn, $_POST['newusername']);
        $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);

        //create sql
        $sql = "INSERT INTO user_db(USERNAME,PASSWORD) VALUES ('$newusername', '$newpassword')";

        //save to db and check
        if(mysqli_query($conn,$sql)){
            //success
            //header('Location:index.php');
        }
        else{
            //echo error
            echo 'Error : ' . mysqli_error($conn);
        }
    }
    else{
        $errors['adminname'] = 'Wrong admin';
        $errors['password'] = 'Wrong password';
    }

}
//close connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <section class="section">
        <h1 class="title">Login page</h1>
        <form action="" method="POST" class="form">

            <label class="newusername" >newusername</label>
            <input type="text" name="newusername" placeholder="newusername" value="<?php echo $newusername ?>">
            <div class="errors"><?php echo $errors['newusername']; ?></div>

            <label class="newpassword">Password</label>
            <input type="password" name="newpassword" placeholder="newPassword">
            <div class="errors" ><?php echo $errors['newpassword']; ?></div> 

            <div class="submit">
                <input type="submit" name="submit" class="submit">
            </div>
        </form>
    </section>
    <section class="container">
        <h1 class="get-all">Log</h1>
        <div class="container-1">
            <div class="each">
                <?php foreach($logins as $login){ ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-content">
                                <div>SERIAL NO : <?php echo $login['NO']; ?></div>
                                <div>USERNAME : <?php echo $login['USERNAME']; ?></div>
                                <div>PASSWORD : <?php echo $login['PASSWORD']; ?></div>
                                <br>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>