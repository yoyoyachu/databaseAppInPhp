<?php
    require_once "pdo.php";
    session_start();
    $location = "Location:index.php";
    if(isset($_POST['autos_id']) && isset($_POST['delete'])){
        $sql = "DELETE from autos WHERE autos_id=:autos_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':autos_id' => $_POST['autos_id']));
        $_SESSION['success'] = "Record Deleted";
        header($location);
        return;
    }

    //make sure that id is present
    if(! isset($_GET['autos_id'])){
        $_SESSION['error'] = "Missing autos_id";
        header($location);
        return;
    }

    $stmt = $pdo->prepare("SELECT make,autos_id FROM autos WHERE autos_id=:autos_id");
    $stmt->execute(array(':autos_id'=>$_GET['autos_id']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row === false){
        $_SESSION['error'] = "Bad value for autos_id";
        header($location);
        return;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Yachna Rana</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <p>Confirm: deleting <?= htmlentities($row['make'])?> </p>
    <form method="post">
    <input type="hidden" name="autos_id" value="<?= $row['autos_id']?>">
    <input type="submit" name="delete" value="Delete">
    <a href="index.php">Cancel</a>
    </form>
    </body>
</html>