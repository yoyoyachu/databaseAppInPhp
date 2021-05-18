<h1>Click on delete button to delete data from db</h1>

<?php
    echo "<pre>\n";
    require_once "pdo.php";
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $sql = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password)";
        echo "<pre>\n".$sql."\n</pre>\n" ;
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':password' => $_POST['password']
        ));
    }

    if(isset($_POST['delete'])){
        $sql = "DELETE FROM users WHERE user_id = :zip";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':zip' => $_POST['user_id']));
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <form method= "post">
        <p>Name: <input type="text" name="name" size="40"></p>
        <p>Email: <input type="text" name="email"></p>
        <p>Password: <input type="password" name="password"></p>
        <p><input type="submit" value="Add New"></p>   
    </form>

    <table border="1">
    <?php 
    $stmt = $pdo->query("SELECT name,email,password,user_id FROM users");
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td>";
        echo $row['name'];
        echo "</td><td>";
        echo $row['email'];
        echo "</td><td>";
        echo $row['password'];
        echo "</td><td>";
        echo '<form method="post"><input type="hidden" '; 
        echo 'name="user_id" value="'.$row['user_id'].' ">'."\n";
        echo '<input type="submit" value="Delete" name="delete">';
        echo "\n</form>\n";
        echo "</td></tr>\n";
    }
    ?>
    </table>
</body>
</html>

