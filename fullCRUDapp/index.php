<?php
require_once "pdo.php";
session_start();
if(isset($_['delete']) && isset($_POST['user_id'])){
    $sql = "DELETE FROM users WHERE user_id=:user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':user_id' => $_POST['user_id']
    ));
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
    <h1>All Users</h1>
    <?php
        if(isset($_SESSION['error'])){
            echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
            unset($_SESSION['success']);
        }
    ?>
    <table border="1">
    <?php
            $stmt = $pdo->query("SELECT name, email,password,user_id FROM users");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>";
                echo htmlentities($row['name']);
                echo "</td><td>";
                echo htmlentities($row['email']);
                echo "</td><td>";                
                echo htmlentities($row['password']);
                echo "</td><td>";
                echo '<a href="edit.php?user_id='.$row['user_id'].'">Edit</a>';
                echo '<a href="delete.php?user_id='.$row['user_id'].'">Delete</a>';
                echo "</td></tr>\n";

            }
        ?>
    </table>
    <a href="add.php">Add New</a>
    </body>
</html>