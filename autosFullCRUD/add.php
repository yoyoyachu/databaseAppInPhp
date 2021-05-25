<?php
require_once "pdo.php";
session_start();

if ( ! isset($_SESSION['name'])) {
    die("ACCESS DENIED");
}

if (isset($_POST['mileage']) && isset($_POST['year']) && isset($_POST['make']) && isset($_POST['model'])) {
    if (strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['year']) < 1){
        $_SESSION['error'] = "All Fields Are Required";
        header("Location:add.php");
        return;
    }
    else if( !is_numeric($_POST['mileage']) || !is_numeric($_POST['year']) ){
        $_SESSION['error'] = "Mileage and year must be numeric";
        header("Location:add.php");
        return;
    }
    else{
        $make = htmlentities($_POST['make']);
        $model = htmlentities($_POST['model']);
        $year = htmlentities($_POST['year']);
        $mileage = htmlentities($_POST['mileage']);
        $sql = "INSERT INTO autos (make,model, year, mileage) VALUES (:make,:model, :year, :mileage)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':make' => $make, 
            ':model' => $model, 
            ':year' => $year,
            ':mileage' => $mileage,
        ]);
        $_SESSION['success'] = 'Record Added';
        header("Location:index.php");
        return;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Yachna Rana</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <?php require_once "bootstrap.php"; ?>
    </head>
    <body>
    <div class="container">
    <h1>
    
    <?php echo 'Tracking Autos for '.$_SESSION['name'].' '; ?> </h1>

    <?php
    if(isset($_SESSION['error'])){
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    ?>
    <form method= "post" style="margin-bottom:50px">
        <p>Make: <input type="text" name="make" size="40"></p>
        <p>Model: <input type="text" name="model" size="40"></p>
        <p>Year: <input type="text" name="year"></p>
        <p>Mileage: <input type="text" name="mileage"></p>
        <p><input type="submit" value="Add"></p>  
        <a href="logout.php">Logout</a>
        <a href="index.php">Cancel</a>  
    </form>

    </div>
</body>
</html>


