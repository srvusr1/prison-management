<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANAGE USERS</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <section class="section">
        <h1 class="title">User Manager</h1>
        
        <form action=""  method="POST" class="form">
            <div class="buttons">
                <!-- add usre  -->
                <div class="button">
                    <input type="submit" name="addnewuser" class="submit" value="Add User">
                </div>
                <!-- remove user  -->
                <div class="button">
                    <input type="submit" name="deleteuser" class="submit" value="Remove User">
                </div>
                <!-- view user  -->
                <div class="button">
                    <input type="submit" name="viewuser" class="submit" value="View User">
                </div>
            </div>
        </form>
    </section>
    
</body>
</html>
<?php


include('db_connect.php');

//write query for all login
$sql = 'SELECT * FROM login_db';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$logins = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result form memory
mysqli_free_result($result);

//close connection
// mysqli_close($conn);

// print_r($logins);


if(isset($_POST['deleteuser'])){

}
$errors = array('username'=>'','password'=>'','name'=>'');
$username = $password = '';
if(isset($_GET['addnewuser'])){

    echo '<form action="" method="POST" class="form">

            <label class="username" >Userame</label>
            <input type="text" name="username" placeholder="Username">
            
            <label class="name">Name</label>
            <input type="text" name="name" placeholder="Name">

            <label class="password">Password</label>
            <input type="password" name="password" placeholder="Password">

            <div class="submit">
                <input type="submit" name="adduser" class="submit" value="ADD USER">
            </div>
        </form>';





    $sqluser = 'SELECT * FROM user_db';
    $resultuser = mysqli_query($conn, $sqluser);
    $users = mysqli_fetch_all($resultuser, MYSQLI_ASSOC);
    mysqli_free_result($resultuser);
    if(isset($_POST['adduser'])){
        // check username, name and password
        //username
        if(empty($_POST['username'])){
            $errors['username'] = 'Username is required <br/>';
        }
        else{
            $username = $_POST['username'];
            // echo $username;
        }

        //name
        if(empty($_POST['name'])){
            $errors['name'] = 'Name is required <br/>';
        }
        else{
            $username = $_POST['name'];
            // echo $name;
        }

        //password
        if(empty($_POST['password'])){
            $errors['password'] = 'Password is required <br/>';
        }
        else{
            $password = $_POST['password'];
            // echo $password;
        }
        $flag = 0;
        if(!array_filter($errors)){
            foreach($users as $user){
                if($user['USERNAME'] == $username){
                    echo 'Username already exist';
                    $flag = 1;
                    break;
                }
            }
            if($flag == 0){
                echo 'User added';
                $sql = "INSERT INTO user_db(USERNAME,NAME,PASSWORD) VALUES ('$username', '$name','$password')";
                if(mysqli_query($conn,$sql)){
                    //success
                    header("Location:index.php");
                }
                else{
                    //echo error
                    echo 'Error : ' . mysqli_error($conn);
                }
            }
        }
    }
}
?>
