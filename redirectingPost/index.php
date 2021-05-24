<?php
    session_start();
    if(isset($_POST['guess'])){
        $guess = $_POST['guess'] + 0;
        $_SESSION['guess'] = $guess;
        if($_SESSION['guess'] == '45'){
            $_SESSION['msg'] = "Congrats! You Win";
        }else if($_SESSION['guess'] > '45'){
            $_SESSION['msg'] = "Your Guess Is Too High";
        }else{
            $_SESSION['msg'] = "Your Guess Is Too low";
        }
        header("Location: index.php");
        return;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Yachna Rana</title>
    </head>
    <body style="font-family: sans-serif; text-align:center">
    <h1>Guess The Number</h1>
        <?php
            $guess = (isset($_SESSION['guess'])) ? $_SESSION['guess'] : '';
            $msg = (isset($_SESSION['msg'])) ? $_SESSION['msg'] : false;

            if($msg !== false){
                echo "<p>$msg</p>\n";
            }
        ?>
    
        <form method="post">
            <p><input type="text" name="guess" 
            <?php
                echo 'value="' . htmlentities($guess) . '"'
            ?>
            ></p>
            <p><input type="submit"></p>
        </form>
    </body>
</html>