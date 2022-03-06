<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="indexstyle.css"> -->
    
    
    <script type="text/javascript">
        function ShowHideDiv(btnDisplay) {
            var addUser = document.getElementById("adduser");
            addUser.style.display = btnDisplay.value == "adduser" ? "block" : "none";
            
            var deleteUser = document.getElementById("deleteuser");
            deleteUser.style.display = btnDisplay.value == "deleteuser" ? "block" : "none";
            
            var viewUser = document.getElementById("viewuser");
            viewUser.style.display = btnDisplay.value == "viewuser" ? "block" : "none";

            var viewLogs = document.getElementById("viewlogs");
            viewLogs.style.display = btnDisplay.value == "viewlogs" ? "block" : "none";


        }
    </script>

</head>
<link rel="stylesheet" href="indexstyle.css">
<?php ?>
<body>
    <!-- Navbar -->
    
    <div class="nav-bar">
        <div class="nav-bar-split mace-title">
            <a href="index.php">PRISON MANAGEMENT</a>
        </div>
        <div class="nav-bar-split nav">
            <div class="nav-opt">
                <a href="indexadmin.php"><div>Home</div></a>
            </div>

            <div class="nav-opt">
                <div>Welcome Admin</div>
                
            </div>

            <div class="nav-opt">
                <a href="admin.php"><div >Logout</div></a>
            </div>
            <!-- <div class="button">
                <button value="Logout" onClick="location.href='admin.php'" style="background-color: red;">Logout</button>
            </div> -->

        </div>
    </div>
    <div class="container-body">
        <div class="option-container">
            <div class="button">
                <!-- <input type="submit" name="adduser" class="submit" value="Add User"> -->
                <!-- <button type="button" id="formButton">Toggle Form!</button> -->
                <!-- <input type="button" value="adduser" onclick="ShowHideDiv(this)" /> -->
                <button value="adduser" onclick="ShowHideDiv(this)">Add User</button>
            </div>
            <!-- remove user  -->
            <div class="button">
                <!-- <input type="button" value="deleteuser" onclick="ShowHideDiv(this)" /> -->
                <button value="deleteuser" onclick="ShowHideDiv(this)" >Delete User</button>
            </div>
            <div class="button">
                <button value="Logout" onClick="location.href='admin.php'" disabled>Update User</button>
            </div>
            <!-- view user  -->
            <div class="button">
                <!-- <input type="button" value="viewuser" onclick="ShowHideDiv(this)" /> -->
                <button value="viewuser" onclick="ShowHideDiv(this)"  >View User</button>
            </div>
            <div class="button">
                <button value="Logout" onClick="location.href='admin.php'" disabled>No.of Users</button>
            </div>
            <div class="button">
                <button value="Logout" onClick="location.href='admin.php'" disabled>View All Users</button>
            </div>
            <div class="button">
                <button value="Logout" onClick="location.href='admin.php'" disabled>User Login</button>
            </div>
            <div class="button">
                <button value="Logout" onClick="location.href='admin.php'" disabled>Save All</button>
            </div>
            <div class="button">
                <button value="Logout" onClick="location.href='admin.php'" disabled>Revert</button>
            </div>
            <div class="button">
                <!-- <input type="button" value="deleteuser" onclick="ShowHideDiv(this)" /> -->
                <button value="viewlogs" onclick="ShowHideDiv(this)" >View Logs</button>
            </div>
            <div class="button">
                <!-- <input type="button" value="Refresh" onClick="location.href='indexadmin.php'"/> -->
                <button value="Refresh" onClick="location.href='indexadmin.php'">Refresh</button>
            </div>
            <div class="button">
                <button value="Logout" onClick="location.href='admin.php'" style="background-color: red;">Logout</button>
            </div>
        </div>
        <div class="display-container">
            <!-- form add user  -->
            <form action="" method="POST" class="adduser" id="adduser" style="display: none">
                <!-- <h1>Add New User</h1> -->

                <h1>NEW USER</h1>
                <div class="icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="formcontainer">
                    <div class="container">

                        <!-- <label class="username"><strong>Username</strong></label> -->
                        <input type="text" placeholder="Enter Username" name="username" required>

                        <!-- <label class="name"><strong>Name</strong></label> -->
                        <input type="text" placeholder="Enter Name" name="name" required>
                        
                        <!-- <label class="password"><strong>Password</strong></label> -->
                        <input type="password" placeholder="Enter Password" name="password" required>
                    </div>

                    <div class="submit">
                        <!-- <input type="submit" name="adduser" class="Add User" value="adduser"> -->
                        <button name="adduser" class="Add User" value="adduser">ADD</button>
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
                        <!-- <input type="submit" name="deleteuser" class="Delete User" value="deleteuser"> -->
                        <button name="deleteuser" class="Delete User" value="deleteuser" style="background-color: red;">DELETE</button>
                    </div>
                </div>
            </form>

            <!-- form view user  -->
            <form action="" method="POST" class="viewuser" id="viewuser" style="display: none">
                <h1>USERS</h1>
                <div class="icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="formcontainer">
                    <!-- <div class="submit"> -->
                        <!-- <input type="submit" name="viewuser" class="Delete User" value="viewuser"> -->
                        <!-- <button name="viewuser" class="Delete User" value="viewuser">VIEW</button> -->
                    <!-- </div> -->
                    
                    <?php


                    include('../db_connect.php');
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
                    
                    //close connection
                    mysqli_close($conn);
                    ?>

                </div>
            </form>
            
            <!-- view logs  -->
            <form action="" method="POST" class="viewlogs" id="viewlogs" style="display: none">
                <h1>Log File</h1>
                <div class="icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="formcontainer">
                    <!-- <div class="submit"> -->
                        <!-- <input type="submit" name="viewuser" class="Delete User" value="viewuser"> -->
                        <!-- <button name="viewuser" class="Delete User" value="viewuser">VIEW</button> -->
                    <!-- </div> -->
                    
                    <?php


                    include('../db_connect.php');
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
                    
                    //close connection
                    mysqli_close($conn);
                    ?>

                </div>
            </form>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
</body>
</html>



