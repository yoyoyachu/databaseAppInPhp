<?php
    require_once "pdo.php";
    session_start();
    $location = "Location:index.php";
    if(isset($_POST['user_id']) && isset($_POST['delete'])){
        $sql = "DELETE from users WHERE user_id=:user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':user_id' => $_POST['user_id']));
        $_SESSION['success'] = "Successfully Deleted";
        header($location);
        return;
    }

    //make sure that id is present
    if(! isset($_GET['user_id'])){
        $_SESSION['error'] = "Missing user_id";
        header($location);
        return;
    }

    $stmt = $pdo->prepare("SELECT name,user_id FROM users WHERE user_id=:user_id");
    $stmt->execute(array(':user_id'=>$_GET['user_id']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row === false){
        $_SESSION['error'] = "Bad value for user_id";
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
    <p>Are you sure you want to delete <?= htmlentities($row['name'])?> </p>
    <form method="post">
    <input type="hidden" name="user_id" value="<?= $row['user_id']?>">
    <input type="submit" name="delete" value="delete">
    </form>
    </body>
</html>