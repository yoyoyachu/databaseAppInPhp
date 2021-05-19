<?php

// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}
if ( strpos($_GET['name'], '@') === false ) {
    die('Name parameter is wrong');
}

if ( isset($_POST['logout'] ) ) {
    header("Location: index.php");
    return;
}

$name = htmlentities($_GET['name']);
$status = false;  // If we have no POST data
$status_color = 'red';

require_once "pdo.php";


if (isset($_POST['mileage']) && isset($_POST['year']) && isset($_POST['make'])) {
    if (strlen($_POST['make']) < 1){
        $status = "Make is required";
    } 
    else if( !is_numeric($_POST['mileage']) || !is_numeric($_POST['year']) ){
        $status = "Mileage and year must be numeric";
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
        $status = 'Record inserted';
        $status_color = 'green';
    }
}
$autos = [];
$all_autos = $pdo->query("SELECT * FROM autos");

while ( $row = $all_autos->fetch(PDO::FETCH_OBJ) ){
    $autos[] = $row;
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
    <?php echo 'Tracking Autos for '.$name.' '; ?> </h1>
    <?php
    if ( $status !== false ) {
        echo(
            '<p style="color: ' .$status_color. ';" class="col-sm-10 col-sm-offset-2">'.
                htmlentities($status).
            "</p>\n"
        );
    }
    ?>
    <form method= "post" style="margin-bottom:50px">
        <p>Make: <input type="text" name="make" size="40"></p>
        <p>Year: <input type="text" name="year"></p>
        <p>Mileage: <input type="text" name="mileage"></p>
        <p><input type="submit" value="Add"></p>  
        <input type="submit" value="Logout" name="logout">  
    </form>

    
    
    <?php if(!empty($autos)) : ?>
        <h2>Automobiles</h2>
        <ul>
            <?php foreach($autos as $auto) : ?>
                <li>
                    <?php echo $auto->year; ?> <?php echo $auto->make; ?> <?php echo $auto->mileage; ?> 
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>    
    </div>
</body>
</html>


