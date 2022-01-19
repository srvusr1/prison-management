<?php
$errors = array('name'=>'','number'=>'');
$name = $number = '';
if(isset($_POST['submit'])){
    
    
    

    // check name and number
    if(empty($_POST['name'])){
        $errors['name'] = 'Name is required <br/>';
    }
    else{
        $name = $_POST['name'];
        echo $name;
    }
    if(empty($_POST['number'])){
        $errors['number'] = 'Number is required <br/>';
    }
    else{
        $number = $_POST['number'];
        echo $number;
    }
    if(array_filter($errors)){
        echo  'Errors in the form';
    }
    else{
        echo 'form is valid';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <section class="section">
        <h1 class="title">Login page</h1>
        <form action="" method="POST" class="form">
            <label class="name" >Name</label>
            <input type="text" name="name" value="<?php echo $name ?>">
            <div class="errors"><?php echo $errors['name']; ?></div>
            <label class="mobile">Number</label>
            <div class="errors"><?php echo $errors['number']; ?></div>
            <input type="number" name="number" value="<?php echo $number ?>">
            <div class="submit">
                <input type="submit" name="submit" class="submit">
            </div>
        </form>
    </section>
</body>
</html>