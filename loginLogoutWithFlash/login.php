<?php
    session_start();
    if(isset($_POST['user']) && isset($_POST['pw'])){
        unset($_SESSION['user']);
        if($_POST['pw'] == 'asd'){
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['success'] = "Successfully Logged In.";
            header("Location: index.php");
            return;
        }else{
            $_SESSION['error'] = "Password Incorrect.";
            header("Location: login.php");
            return;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Yachna Rana</title>
    </head>
    <body style="font-family: sans-serif; text-align:center">
    <h1>Login Form</h1>
        <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            };
        ?>
    
        <form method="post">
            <p>Username: <input type="text" name="user"></p>
            <p>Password: <input type="text" name="pw"></p>
            <p><input type="submit"></p>
        </form>
    </body>
</html>