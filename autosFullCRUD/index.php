<?php
require_once "pdo.php";
session_start();

$autos = [];
$all_autos = $pdo->query("SELECT * FROM autos");

while ( $row = $all_autos->fetch(PDO::FETCH_OBJ) ){
    $autos[] = $row;
}
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
    <h1>Welcome to the Automobiles Database</h1>

    <?php
            if(isset($_SESSION['success'])){
                echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
                unset($_SESSION['success']);
            }
            if(isset($_SESSION['error'])){
                echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
                unset($_SESSION['error']);
            }
        ?>
    
        <p><?php 
            if(!isset($_SESSION['name'])){ 
                
                echo '<a href="login.php">Please log in</a>';
                
                echo '<p>Attempt to <a href="add.php">add data</a> without logging in</p>';
            }else{
                if (!empty($autos)) {
                    echo '<table border="1">';
                    echo '<tr><th>Make</th><th>Model</th><th>Year</th><th>Mileage</th><th>Action</th></tr>';
                    $stmt = $pdo->query("SELECT * FROM autos");
                    foreach ($autos as $auto){
                        echo "<tr><td>";
                        echo htmlentities($auto->make);
                        echo "</td><td>";
                        echo htmlentities($auto->model);
                        echo "</td><td>";
                        echo htmlentities($auto->year);
                        echo "</td><td>";
                        echo htmlentities($auto->mileage);
                        echo "</td><td>";
                        echo '<a href="edit.php?autos_id='.$auto->autos_id.'">Edit</a>';
                        echo ' / ';
                        echo '<a href="delete.php?autos_id='.$auto->autos_id.'">Delete</a>';
                        echo "</td></tr>\n";
                    }
                    echo '</table>';
                }else{
                    echo '<p>No rows found</p>';
                }
                echo '<p><a href="add.php">Add New Entry</a></p><p><a href="logout.php">Logout</a></p>';
            }
        ?>


        
    </div>
    </body>
</html>
