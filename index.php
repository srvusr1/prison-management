<?php
session_start();
include('db_connect.php');
$current_username =  $_SESSION["username"];
// echo $current_username;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Prison Management</title>
    
    <script type="text/javascript">
        function ShowHideDiv(btnDisplay) {
            var addPrisoner = document.getElementById("addprisoner");
            addPrisoner.style.display = btnDisplay.value == "addprisoner" ? "block" : "none";

            var deletePrisoner = document.getElementById("deleteprisoner");
            deletePrisoner.style.display = btnDisplay.value == "deleteprisoner" ? "block" : "none";

            var viewPrisoner = document.getElementById("viewprisoner");
            viewPrisoner.style.display = btnDisplay.value == "viewprisoner" ? "block" : "none";
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
    <script src="script.js"></script>

    

</head>
<link rel="stylesheet" href="style.css">
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="index.php">MACE CSE Prison</a>
            <div class="user">
                
                <!-- php  -->
                <?php if($_SESSION["username"] == $current_username) { ?>
                    <!-- html  -->
                    Welcome 
                    <!-- php  -->
                    <?php echo $current_username;?>
                    <!-- html  -->
                    Click here to <a href="logout.php" tite="Logout">Logout.</a>
                    <!-- php  -->
                <?php } else echo "<h1>Please login first .</h1>"; ?>
            </div>
            
            </div>
            
        </div>
    </nav>
    
    <section class="section">
        <h1 class="title">USER</h1>
        
        

        <!-- show hide buttons  -->
        <div class="manage-buttons">
            <!-- add user  -->
            <div class="button">
                <!-- <input type="submit" name="adduser" class="submit" value="Add User"> -->
                <!-- <button type="button" id="formButton">Toggle Form!</button> -->
                <input type="button" value="addprisoner" onclick="ShowHideDiv(this)" />
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


        <!-- form add prisoner  -->
        <form action="" method="POST" class="addprisoner" id="addprisoner" style="display: none">
            <!-- <h1>Add New Prisoner</h1> -->

            <h1>NEW PRISONER</h1>
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="formcontainer">
                <div class="container">


                    <label class="id"><strong>ID</strong></label>
                    <input type="text" placeholder="Enter ID" name="id" required>
                    
                    <label class="name"><strong>Name</strong></label>
                    <input type="text" placeholder="Enter Name" name="name" required>
                                        
                    <label class="name"><strong>Age</strong></label>
                    <input type="text" placeholder="Enter Age" name="age" required>
                                        
                    <label class="name"><strong>Sex</strong></label>
                    <select name="sex" id="sex">
                        <option value="">--- Choose gender ---</option>
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                    </select>
                    <!-- <input type="text" placeholder="Enter Sex" name="sex" required> -->
                    
                    <label class="name"><strong>Address</strong></label>
                    <input type="text" placeholder="Enter Address" name="address" required>
                                        
                    
                    <label class="name"><strong>State</strong></label>
                    <input type="text" placeholder="Enter State" name="state" required>
                    <!-- <select name="district" id="district">
                        <option value="">--- Choose district ---</option>
                        <option value="kasarkod" selected>Ernakulam</option>
                        <option value="female">Female</option>
                    </select> -->

                    <select class="form-control" id="inputState">
                        <option value="SelectState">Select State</option>
                        <option value="Andra Pradesh">Andra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madya Pradesh">Madya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                        <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadeep">Lakshadeep</option>
                        <option value="Pondicherry">Pondicherry</option>
                      </select>

                    <!-- <input type="text" placeholder="Enter District" name="district" required> -->
                                  
                    <label class="name"><strong>District</strong></label>
                    <label for="inputDistrict">District</label>
                    <select class="form-control" id="inputDistrict">
                        <option value="">-- select one -- </option>
                    </select>
                                        
                    <label class="name"><strong>Nation</strong></label>
                    <input type="text" placeholder="Enter Nation" name="nation" required>
                                        
                    <label class="name"><strong>Crime Type</strong></label>
                    <input type="text" placeholder="Enter Crime type" name="crimetype" required>
                                        
                    <label class="name"><strong>Crime Details</strong></label>
                    <input type="text" placeholder="Enter Crime Details" name="crimedetailes" required>
                                        
                    <label class="name"><strong>Convicted Date</strong></label>
                    <input type="text" placeholder="YYYY-MM-DD" name="convicteddate" required>
                                        
                    <label class="name"><strong>Release Date</strong></label>
                    <input type="text" placeholder="YYYY-MM-DD" name="releasedate" required>

                    
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