<?php
session_start();

if ( ! isset($_SESSION['name'])) {
    die('Not Logged In');
}
require_once "pdo.php";

if (isset($_POST['mileage']) && isset($_POST['year']) && isset($_POST['make'])) {
    if (strlen($_POST['make']) < 1){
        $_SESSION['error'] = "Make is required";
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
        $year = htmlentities($_POST['year']);
        $mileage = htmlentities($_POST['mileage']);
        $sql = "INSERT INTO autos (make, year, mileage) VALUES (:make, :year, :mileage)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':make' => $make, 
            ':year' => $year,
            ':mileage' => $mileage,
        ]);
        $_SESSION['success'] = 'Record inserted';
        header("Location:view.php");
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
        <p>Year: <input type="text" name="year"></p>
        <p>Mileage: <input type="text" name="mileage"></p>
        <p><input type="submit" value="Add"></p>  
        <a href="logout.php">Logout</a>  
    </form>

    </div>
</body>
</html>


