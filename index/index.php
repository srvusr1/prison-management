<?php
session_start();
include('../db_connect.php');
$current_username =  $_SESSION["username"];
if(!isset($current_username)) header('Location:../login/login.php');
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

    <!-- state and district  -->
    <script language="Javascript" src="district/jquery.js"></script>
    <script type="text/JavaScript" src='district/state.js'></script>
    <link rel="stylesheet" type="text/css" href="district/style.css">
    <!-- end of district -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    

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
<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<body>
    <!-- Navbar -->
    
    <!-- <div class="nav-bar">
        <div class="nav-bar-split mace-title">
            <a href="index.php">PRISON MANAGEMENT</a>
        </div>
        <div class="nav-bar-split nav">
            <div class="nav-opt">
                <div>Home</div>
            </div>

            <div class="nav-opt">
                <div>Welcome <?php echo $current_username;?></div>
            </div>

            <div class="nav-opt">
                <div>Logout</div>
            </div>

        </div>
    </div> -->
    <div class="nav-bar">
        <div class="nav-bar-split mace-title">
            <a href="index.php">PRISON MANAGEMENT</a>
        </div>
        <div class="nav-bar-split nav">
            <div class="nav-opt">
                <a href="index.php"><div>Home</div></a>
            </div>

            <div class="nav-opt">
                <div>Welcome Admin</div>
                
            </div>

            <div class="nav-opt">
                <a href="login.php"><div >Logout</div></a>
            </div>
            <!-- <div class="button">
                <button value="Logout" onClick="location.href='admin.php'" style="background-color: red;">Logout</button>
            </div> -->

        </div>
    </div>
    <div class="container-body">
        <div class="option-container">
            <div class="button">
                <button value="addprisoner" onclick="ShowHideDiv(this)" >Add New Prisoner</button>
            </div>
            <div class="button">
                <button value="addprisoner" onclick="ShowHideDiv(this)" disabled>Update Prisoner</button>
            </div>
            <div class="button">
                <button value="deleteprisoner" onclick="ShowHideDiv(this)">Delete A Prisoner</button>
            </div>
            <div class="button">
                <button value="viewprisoner" onclick="ShowHideDiv(this)">View A Prisoner</button>
            </div>
            <div class="button">
                <button value="viewprisoner" onclick="ShowHideDiv(this)" disabled>No.of Prisoners</button>
            </div>
            <div class="button">
                <button value="viewprisoner" onclick="ShowHideDiv(this)" disabled>View All Prisoners</button>
            </div>
            <div class="button">
                <button value="viewprisoner" onClick="location.href='../admin/admin.php'">Admin Login</button>
            </div>
            <div class="button">
                <button value="viewprisoner" onclick="ShowHideDiv(this)" disabled>View My Logs</button>
            </div>
            <div class="button">
                <button value="Refresh" onClick="location.href='index.php'">Refresh</button>
            </div>
            <div class="button">
                <button value="Refresh" onClick="location.href='index.php'" disabled>Save All</button>
            </div>
            <div class="button">
                <button value="Refresh" onClick="location.href='index.php'" disabled>Revert</button>
            </div>
            <div class="button">
                <button value="Logout" onClick="location.href='../logout/logout.php'" style="background-color: red;">Logout</button>
            </div>
        </div>
        <div class="display-container">
            <!-- add prisoner  -->
            <div>
                <form action="" method="POST" class="addprisoner" id="addprisoner" style="display: none">
                    <div><h1>New Prisoner</h1></div>
                    <!-- <div class="icon">
                        <i class="fas fa-user-circle"></i>
                    </div> -->
                    <div>
                        <div>


                            <!-- <label class="id"><strong>ID</strong></label> -->
                            <input type="text" placeholder="Enter ID" name="id" required >
                            
                            <!-- <label class="name"><strong>Name</strong></label> -->
                            <input type="text" placeholder="Enter Name" name="name" required >
                                                
                            <div class="phy">
                                <!-- <label class="age"><strong>Age</strong></label> -->
                                <input type="text" placeholder="Enter Age" name="age" required >
                                                    
                                <!-- <label class="sex"><strong>Sex</strong></label> -->
                                <select name="sex" id="sex" >
                                    <option value="">--- Choose gender ---</option>
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                </select>
                            </div>
                            <!-- <input type="text" placeholder="Enter Sex" name="sex" required> -->
                            <!-- <label class="address" style="margin-top: 20px;"><strong>Address</strong></label> -->
                            <input type="text" placeholder="Enter Address" name="address"  required>
                            
                            <div class="location"   style="display: flex; justify-content:space-between">
                                <!-- state  -->
                                <div>
                                    
                                    <!-- <label class="state"><strong>State</strong></label> -->
                                    <select name="state" id="state" style="width:190px; margin:5px 0 10px 0">
                                        <option value="">--- Choose state ---</option>
                                        <option value="KERALA">Kerala</option>
                                        <option value="TAMILNADU">Tamilnadu</option>
                                        <option value="KARNADAKA">Karnataka</option>
                                        <option value="OTHER">Other</option>

                                        <!-- <option value="FEMALE">Other</option> -->
                                    </select>
                                </div>

                                <div>

                                    <!-- <label class="district"><strong>District</strong></label> -->
                                    <select name="district" id="district" style="width:190px; margin:5px 0 10px 0">
                                        <option value="" selected>--- Choose district ---</option>
                                        <option value="ALAPPUZHA">Alappuzha</option>
                                        <option value="ERNAKULAM">Ernakulam</option>
                                        <option value="IDUKKI">Idukki</option>
                                        <option value="KANNUR">Kannur</option>
                                        <option value="KASARGOD">Kasargod</option>
                                        <option value="KOLLAM">Kollam</option>
                                        <option value="KOTTAYAM">Kottayam</option>
                                        <option value="KOZHIKODE">Kozhikode</option>
                                        <option value="MALAPPURAM">Malappuram</option>
                                        <option value="PALAKKAD">Palakkad</option>
                                        <option value="PATHANAMTHITA">Pathanamthitta</option>
                                        <option value="THIRUVANANTHAPURAM">Thiruvananthapuram</option>
                                        <option value="THRISSUR">Thrissur</option>
                                        <option value="WAYANAD">Wayanad</option>
                                    </select>
                                </div>
                                <!-- district  -->
                                
                                <!-- nationality  -->
                                
                            </div>
                            <div style="display: flex; justify-content:space-between">
                                <div>
                                    <!-- <label class="nation"><strong>Nationality</strong></label> -->
                                    <select name="nation" id="nation" style="width:190px; margin:5px 0 10px 0">
                                        <option value="">--- Choose Nationality ---</option>
                                        <option value="INDIAN" selected>INDIAN</option>
                                        <option value="AMERICAN">AMERICAN</option>
                                        <option value="FRENCH">FRENCH</option>
                                        <option value="AUSTRALIAN">AUSTRALIAN</option>
                                        <option value="CHINA">CHINA</option>
                                        <option value="BANGLADESH">BANGLADESH</option>
                                        <option value="PAKISTANI">PAKISTANI</option>
                                        <option value="OTHER">OTHER</option>
                                    </select>
                                </div>
                                <div class="crime-level">
                                <!-- <label class="crimetype"><strong>Crime Level</strong></label> -->
                                <select name="crimetype" id="crimetype" style="width:190px; margin:5px 0 10px 0">
                                    <option value="" selected>--- Choose Crime Level ---</option>
                                    <option value="LEVEL-1">LEVEL-1</option>
                                    <option value="LEVEL-2">LEVEL-2</option>
                                    <option value="LEVEL-3">LEVEL-3</option>
                                </select>
                            </div>
                            </div>
                            <!-- crime level              -->
                            
                                                
                            <!-- <label class="crimedetails" style="margin-top: 20px;"><strong>Crime Details</strong></label> -->
                            <input type="text" placeholder="Enter Crime Details" name="crimedetails"  required>
                                                
                            <!-- <label class="convicteddate"><strong>Convicted Date</strong></label> -->
                            <input type="text" placeholder="YYYY-MM-DD" name="convicteddate"  required>
                                                
                            <!-- <label class="releasedate"><strong>Release Date</strong></label> -->
                            <input type="text" placeholder="YYYY-MM-DD" name="releasedate"  required >

                        </div>

                        <div class="submit">
                            <!-- <input type="submit" name="addprisoner" class="addprisoner" value="ADD"> -->
                            <button name="addprisoner" class="addprisoner" value="ADD">ADD</button>
                        </div>
                    </div>
                    
                </form>
            </div>

            <!-- form delete prisoner  -->
            <div class="background">
                <form action="" method="POST" class="deleteprisoner" id="deleteprisoner" style="display: none">
                <h1>Delete Prisoner</h1>
                    <!-- <div class="icon">
                        <i class="fas fa-user-circle"></i>
                    </div> -->
                    <div class="formcontainer">
                        <div class="container">
                            <!-- <label class="id"><strong>ID</strong></label> -->
                            <input type="text" placeholder="Enter ID" name="id" required>
                        </div>
                        <div class="submit">
                            <!-- <input type="submit" name="deleteprisoner" class="deleteuser" value="DELETE"> -->
                            <button name="deleteprisoner" class="deleteuser" value="DELETE" style="background-color: red;">DELETE</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- form view user  -->
            <div>
                <form action="" method="POST" class="viewprisoner" id="viewprisoner" style="display: none">
                    <h1>View Prisoner</h1>
                    <!-- <div class="icon">
                        <i class="fas fa-user-circle"></i>
                    </div> -->
                    <div class="formcontainer">
                        <div class="container">
                            <!-- <label class="id"><strong>ID</strong></label> -->
                            <input type="text" placeholder="Enter ID" name="id" required>
                        </div>
                        <div class="submit">
                            <!-- <input type="submit" name="viewprisoner" class="viewprisoner" value="VIEW"> -->
                            <button name="viewprisoner" class="viewprisoner" value="VIEW">VIEW</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- viewing prisoner -->
            <div>
                <?php
                    if(isset($_POST['viewprisoner'])){
                        $id = $_POST['id'];
                        $sql_search_check = "SELECT * FROM prison_db WHERE ID = '$id'";
                        $search_check = mysqli_query($conn, $sql_search_check);
                        if($search_check->num_rows <= 0){
                            echo "<script>alert('Prisoner not found');</script>";
                        }
                        else{
                            $sql_search = "SELECT * FROM prison_db WHERE ID = '$id'";
                            $search = mysqli_query($conn, $sql_search);
                            $search_result = mysqli_fetch_all($search, MYSQLI_ASSOC);
                            mysqli_free_result($search);
                            foreach($search_result as $found){
                                echo '<div class="formcontainer">';
                                    echo '<h1 class="title">PRIONER DETAILS</h1>';
                                    echo "<div>ID : " . $found['ID'] . "</div>";
                                    echo "<div>NAME : " . $found['NAME'] . "</div>";
                                    echo "<div>AGE : " . $found['AGE'] . "</div>";
                                    echo "<div>SEX : " . $found['SEX'] . "</div>";
                                    echo "<div>ADDRESS : " . $found['ADDRESS'] . "</div>";
                                    echo "<div>STATE : " . $found['STATE'] . "</div>";
                                    echo "<div>DISTRICT : " . $found['DISTRICT'] . "</div>";
                                    echo "<div>NATIONALITY : " . $found['NATION'] . "</div>";
                                    echo "<div>CRIME LEVEL : " . $found['CRIME_TYPE'] . "</div>";
                                    echo "<div>CRIME DETAILS : " . $found['CRIME_DETAILS'] . "</div>";
                                    echo "<div>CONVICTED DATE : " . $found['CONVICTED_DATE'] . "</div>";
                                    echo "<div>RELEASE DATE : " . $found['RELEASE_DATE'] . "</div>";
                                echo "</div>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php


include('../db_connect.php');
$sqlprison = 'SELECT * FROM prison_db';
$resultprison = mysqli_query($conn, $sqlprison);
$prisons = mysqli_fetch_all($resultprison, MYSQLI_ASSOC);
mysqli_free_result($resultprison);
if(isset($_POST['addprisoner'])){
    echo 'success';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $nation = $_POST['nation'];
    $crimetype = $_POST['crimetype'];
    $crimedetails = $_POST['crimedetails'];
    $convicteddate = $_POST['convicteddate'];
    $releasedate = $_POST['releasedate'];
    echo 'success';
            $sql = "INSERT INTO prison_db(ID,NAME,AGE,SEX,ADDRESS,STATE,DISTRICT,NATION,CRIME_TYPE,CRIME_DETAILS,CONVICTED_DATE,RELEASE_DATE) VALUES ('$id','$name','$age','$sex','$address','$state','$district','$nation','$crimetype','$crimedetails','$convicteddate','$releasedate')";
            if(mysqli_query($conn,$sql)){
                echo '<script>alert("New Prisoner Added!")</script>';
            }
}
if(isset($_POST['deleteprisoner'])){
    $id = $_POST['id'];
    $sql_search = "SELECT * FROM prison_db WHERE ID = $id";
        $search = mysqli_query($conn, $sql_search);
        if($search->num_rows <= 0){
            echo "<script>alert('Prisoner not found');</script>";
        }
        else{
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $sql = "DELETE FROM prison_db WHERE ID = '$id'";
            if(mysqli_query($conn,$sql)){
                echo '<script>alert("Prisoner Deleted!")</script>';
            }
        }
}

mysqli_close($conn);
?>