<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <script type="text/javascript">
        function ShowHideDiv(btnDisplay) {
            var addUser = document.getElementById("adduser");
            addUser.style.display = btnDisplay.value == "adduser" ? "block" : "none";
            
            var deleteUser = document.getElementById("deleteuser");
            deleteUser.style.display = btnDisplay.value == "deleteuser" ? "block" : "none";
            
            var viewUser = document.getElementById("viewuser");
            viewUser.style.display = btnDisplay.value == "viewuser" ? "block" : "none";
        }
    </script>

</head>
<?php ?>
<body>
    <nav class="navigation">
        <a href="login.php">User Login</a>
    </nav>
    <section class="section">
        <h1 class="title">ADMIN</h1>
        
        <form action=""  method="POST" class="button-form">
            <!-- view log  -->
            <div class="button">
                <input type="submit" name="viewlogs" class="submit" value="View Logs">
            </div>
        </form>

        <!-- show hide buttons  -->
        <div class="manage-buttons">
            <!-- add user  -->
            <div class="button">
                <!-- <input type="submit" name="adduser" class="submit" value="Add User"> -->
                <!-- <button type="button" id="formButton">Toggle Form!</button> -->
                <input type="button" value="adduser" onclick="ShowHideDiv(this)" />
            </div>
            <!-- remove user  -->
            <div class="button">
                <input type="button" value="deleteuser" onclick="ShowHideDiv(this)" />
            </div>
            <!-- view user  -->
            <div class="button">
                <input type="button" value="viewuser" onclick="ShowHideDiv(this)" />
            </div>
        </div>


        <!-- form add user  -->
        <form action="" method="POST" class="adduser" id="adduser" style="display: none">
            <!-- <h1>Add New User</h1> -->

            <h1>NEW USER</h1>
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="formcontainer">
                <div class="container">

                    <label class="username"><strong>Username</strong></label>
                    <input type="text" placeholder="Enter Username" name="username" required>

                    <label class="name"><strong>Name</strong></label>
                    <input type="text" placeholder="Enter Name" name="name" required>
                    
                    <label class="password"><strong>Password</strong></label>
                    <input type="password" placeholder="Enter Password" name="password" required>
                </div>

                <div class="submit">
                    <input type="submit" name="adduser" class="Add User" value="adduser">
                </div>
            </div>
            
        </form>
        
        <!-- form delete user  -->
        <form action="" method="POST" class="deleteuser" id="deleteuser" style="display: none">
            <h1>delete user</h1>
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="formcontainer">
                <div class="container">
                    <label class="username"><strong>Username</strong></label>
                    <input type="text" placeholder="Enter Username" name="username" required>
                </div>
                <div class="submit">
                    <input type="submit" name="deleteuser" class="Delete User" value="deleteuser">
                </div>
            </div>
        </form>

        <!-- form view user  -->
        <form action="" method="POST" class="viewuser" id="viewuser" style="display: none">
            <h1>view user</h1>
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="formcontainer">
                <div class="submit">
                    <input type="submit" name="viewuser" class="Delete User" value="viewuser">
                </div>
            </div>
        </form>

        
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>




<?php


include('db_connect.php');
//write query for all login
$sqluser = 'SELECT * FROM user_db';
$sqllogin = 'SELECT * FROM login_db';

//make query and get result
$resultuser = mysqli_query($conn, $sqluser);
$resultlogin = mysqli_query($conn, $sqllogin);
//fetch the resulting rows as an array

$users = mysqli_fetch_all($resultuser, MYSQLI_ASSOC);
$logins =  mysqli_fetch_all($resultlogin, MYSQLI_ASSOC);
//free result form memory

mysqli_free_result($resultuser);
mysqli_free_result($resultlogin);
// print_r($users);
// print_r($logins);
// print_r($users);



if(isset($_POST['viewlogs'])){
    echo "<br><br><br>";
    // foreach($logins as $login){
    //     echo 'SERIAL NO : ' . $login['NO']."<br>";
    //     echo 'USERNAME : ' . $login['USERNAME']."<br>";
    //     echo 'NAME : ' . $login['NAME']."<br>";
    //     echo 'LOGIN TIME : ' . $login['LOGIN_TIME']."<br>";
    //     echo 'LOGOUT TIME : ' . $login['LOGOUT_TIME']."<br>";
    //     echo 'NO.OF CHANGES : ' . $login['CHANGES_COUNT']."<br><br><br>";
    // }


    echo "<table border='1'>
    <tr>
        <th>NO</th>
        <th>Username</th>
        <th>Name</th>
        <th>Login Time</th>
        <th>Logout Time</th>
        <th>Changes Count</th>
    </tr>";
    $id = 1;
    foreach($logins as $login){

        echo "<tr>";
        // echo "<td>" . $login['NO'] . "</td>";
        echo "<td>" . $id++ . "</td>";
        echo "<td>" . $login['USERNAME'] . "</td>";
        echo "<td>" . $login['NAME'] . "</td>";
        echo "<td>" . $login['LOGIN_TIME'] . "</td>";
        echo "<td>" . $login['LOGOUT_TIME'] . "</td>";
        echo "<td>" . $login['CHANGES_COUNT'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$errors = array('username'=>'','name'=>'','password'=>'');
$username = $password = $name = '';

if(isset($_POST['adduser'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];

        $result = mysqli_query($conn,"SELECT * FROM user_db WHERE USERNAME = '$username'");
        {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            // $sql3 = "INSERT INTO user_db(USERNAME,NAME,PASSWORD)VALUES('$username', '$name', '$password')";
            
            $sql = "INSERT INTO user_db(USERNAME,NAME,PASSWORD) VALUES ('$username','$name','$password')";
            // print_r($logins);
            if(mysqli_query($conn,$sql)){
                echo '<script>alert("New User Added!")</script>';

            }
            //save to db and check
            // mysqli_query($conn, $sql3);
        }
}

if(isset($_POST['deleteuser'])){
    $username = $_POST['username'];
        $result = mysqli_query($conn,"SELECT * FROM user_db WHERE USERNAME = '$username'");
        {
            $username = mysqli_real_escape_string($conn, $_POST['username']);

            // $sql3 = "INSERT INTO user_db(USERNAME,NAME,PASSWORD)VALUES('$username', '$name', '$password')";
            
            $sql = "DELETE FROM user_db WHERE USERNAME = '$username'";
            // print_r($logins);
            if(mysqli_query($conn,$sql)){
                echo '<script>alert("User Deleted!")</script>';

            }
            //save to db and check
            // mysqli_query($conn, $sql3);
        }
}

if(isset($_POST['viewuser'])){

    echo "<table border='1'>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Name</th>
    </tr>";
    $id = 1;
    foreach($users as $user){

        echo "<tr>";
        echo "<td>" . $id++ . "</td>";
        echo "<td>" . $user['USERNAME'] . "</td>";
        echo "<td>" . $user['NAME'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
//close connection
mysqli_close($conn);
?>
