<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Yachna Rana</title>
    </head>
    <body>
    <div class="container">
    <h1>Welcome to Autos Database</h1>
    <p>
    <a href="login.php">Please Log In</a>
    </p>
    <p>
    Attempt to go to 
    <a href="view.php">view.php</a> without logging in - it should fail with an error message.</p>
    <p>
    Attempt to go to 
    <a href="add.php">add.php</a> without logging in - it should fail with an error message.</p>
    </div>
    </body>
</html>
