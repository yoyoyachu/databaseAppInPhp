<?php
session_start();
if ( ! isset($_SESSION['name']) ) {
    die('Not Logged In');
}

$status_color = 'red';

require_once "pdo.php";

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
    <?php echo 'Tracking Autos for '.$_SESSION['name'].' '; ?> </h1>
    <?php
    if(isset($_SESSION['success'])){
        echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
    }
    ?>


    
    
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
    <p><a href="add.php">Add New</a> | <a href="logout.php">Logout</a>  
    </div>
</body>
</html>


