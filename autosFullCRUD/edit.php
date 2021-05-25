<?php
require_once "pdo.php";
session_start();

if ( ! isset($_SESSION['name'])) {
    die("ACCESS DENIED");
}


if (isset($_POST['mileage']) && isset($_POST['year']) && isset($_POST['make']) && isset($_POST['model']) && isset($_POST['autos_id'])) {
    if (strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['year']) < 1){
        $_SESSION['error'] = "All Fields Are Required";
        header("Location: edit.php?autos_id=".$_GET['autos_id']);
        return;
    }
    if( !is_numeric($_POST['mileage']) || !is_numeric($_POST['year']) ){
        $_SESSION['error'] = "Mileage and year must be numeric";
        header("Location: edit.php?autos_id=".$_GET['autos_id']);
        return;
    }

    $sql = "UPDATE autos SET make=:make, model=:model, year=:year, mileage=:mileage WHERE autos_id=:autos_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage'],
        ':autos_id' => $_POST['autos_id']
    ));
    $_SESSION['success'] = "Record Edited";
    header("Location:index.php");
    return;
}

$stmt = $pdo->prepare("SELECT * FROM autos WHERE autos_id=:autos_id");
$stmt->execute(array(':autos_id'=>$_GET['autos_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row === false){
    $_SESSION['error'] = "Bad value for autos_id";
    header("Location: edit.php?autos_id=".$_GET['autos_id']);
    return;
}

$make = htmlentities($row['make']);
$model = htmlentities($row['model']);
$year = htmlentities($row['year']);
$mileage = htmlentities($row['mileage']);
$autos_id = $row['autos_id'];
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
        <p>Make: <input type="text" name="make" size="40" value="<?= $make ?>"></p>
        <p>Model: <input type="text" name="model" size="40" value="<?= $model ?>"></p>
        <p>Year: <input type="text" name="year" value="<?= $year ?>"></p>
        <p>Mileage: <input type="text" name="mileage" value="<?= $mileage ?>"></p>
        <input type="hidden" name="autos_id" value="<?= $autos_id ?>">
        <p><input type="submit" value="Save"></p>  
        <a href="index.php">Cancel</a>  
    </form>

    </div>
</body>
</html>


