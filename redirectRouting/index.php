<?php
if(isset($_POST['where'])){
    if($_POST['where'] === '1'){
        header("Location: redir1.php");
    }else if($_POST['where'] === '2'){
        header("Location: redir2.php");
    }else{
        header("Location: http://www.google.com");
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <h1>On which router Would you like to go??</h1>
        <form method="POST">
            <input type="text" name="where">
            <input type="submit" value="Go">
        </form>
    </body>
</html>