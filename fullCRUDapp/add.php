<?php
require_once "pdo.php";
session_start();

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    if(strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1){
        $_SESSION['error'] = "Missing Data";
        header("Location:add.php");
        return;
    }
    if(strpos($_POST['email'],'@') === false){
        $_SESSION['error'] = "Bad Data";
        header("Location:add.php");
        return;
    }
    $sql = "INSERT INTO users(name,email,password) VALUES(:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']
    ));
    $_SESSION['success'] = "Successfully Added";
    header("Location:index.php");
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
    <h1>Add A New User</h1>
    <?php
        if(isset($_SESSION['error'])){
            echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
            unset($_SESSION['error']);
        }
    ?>
    <form method="post">
    <p>Name: <input type="text" name="name" id=""></p>
    <p>Email: <input type="text" name="email" id=""></p>
    <p>Password: <input type="password" name="password" id=""></p>
    <p><input type="submit" name="" id=""></p>
    <a href="index.php">Cancel</a>
    </form>
    </body>
</html>