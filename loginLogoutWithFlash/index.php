<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Yachna Rana</title>
    </head>
    <body style="font-family: sans-serif; text-align:center">
    <h1>Welcome to my awesome app.</h1>
        <?php
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }

        ?>
    
        <p><?php 
            if(!isset($_SESSION['user'])){
                echo ('<a href="login.php">Log In</a>');
            }else{
                echo ('<a href="logout.php">Log Out</a>');
            }
        ?>
        
        </p>
    </body>
</html>