<?php
    if(isset($_POST['route'])){
        if($_POST['route'] == '1'){
            header("Location:pageone.php");
            return;
        }else if($_POST['route'] == '2'){
            header("Location:pagetwo.php");
            return;
        }else if($_POST['route'] == '3'){
            header("Location:pagethree.php");
            return;
        }else if($_POST['route'] == '4'){
            header("Location:pagefour.php");
            return;
        }else{
            header("Location:pagefive.php");
            return;
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
    <body style="text-align:center">
    <h1 >JokesGram</h1>
    <form method="post">
        <p>Enter any num between 1-6 <input type="text" name="route"></p>
        <p><input type="submit" name="" id=""></p>
    </form>


    <h2 style="margin-top:200px">Joke Of The Day</h2>
    <h3>How does a scientist freshen her breath?</h3>
    <p>With experi-mints.</p>
    </body>
</html>
