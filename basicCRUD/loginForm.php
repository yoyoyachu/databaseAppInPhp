<h1>Login Form</h1>

<?php 
require_once "pdo.php";
if((isset($_POST['email'])) && (isset($_POST['password']))){
$e = $_POST['email'];
$p = $_POST['password'];

$sql = "SELECT name FROM users WHERE email='$e' AND password = '$p'";

echo "<p>$sql</p>\n";

$stmt = $pdo->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($row);
echo "-->\n";
if($row === FALSE){
    echo "<h2>Login Incorrect. </h2>\n";
}else{
    echo "<h2>Login Success.</h2>\n";
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
        <form method="post">
        <p>Email:<input type="text" name="email"></p>
        <p>Password:<input type="password" name="password"></p>
        <p><input type="submit" value="Login"></p>
        </form>
    </body>
</html>