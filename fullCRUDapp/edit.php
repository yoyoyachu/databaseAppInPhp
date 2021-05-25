<?php
require_once "pdo.php";
session_start();
$location = "Location:index.php";

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['user_id'])){

    $sql = "UPDATE users SET name=:name, email=:email, password=:password WHERE user_id=:user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':user_id' => $_POST['user_id']
    ));
    $_SESSION['success'] = "Record Updated";
    header($location);
    return;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(':user_id'=>$_GET['user_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row === false){
    $_SESSION['error'] = "Bad value for user_id";
    header($location);
    return;
}

$n = htmlentities($row['name']);
$e = htmlentities($row['email']);
$p = htmlentities($row['password']);
$user_id = $row['user_id'];
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
        <h1>Edit User</h1>
        <form method="post">
        <p>Name: <input type="text" name="name" value="<?= $n ?>"></p>
        <p>Email: <input type="text" name="email" value="<?= $e ?>"></p>
        <p>Password: <input type="text" name="password" value="<?= $p ?>"></p>
        <p>Password: <input type="hidden" name="user_id" value="<?= $user_id ?>"></p>
        <p><input type="submit" name="" value="Update"></p>
        <a href="index.php">Cancel</a>
        </form>
    </body>
</html>