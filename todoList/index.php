<h1>TO-DO App</h1>

<?php 
require_once "pdo.php";
if(isset($_POST['todo_title'])){
    $sql = "INSERT INTO todolist(todo_title) VALUES(:todo_title)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':todo_title' => $_POST['todo_title']
    ));
}

if(isset($_POST['delete'])){
    $sql = "DELETE from todolist WHERE todo_id=:todo_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':todo_id' => $_POST['todo_id']
    ));
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>To-Do List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form method='POST'>
        <input type="text" name="todo_title" id="">
        <input type="submit" value="Add" >
        </form>
    </body>
</html>

 
<ul>
<?php
$stmt = $pdo->query("SELECT todo_id,todo_title FROM todolist");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<li>";
        echo $row['todo_title'];
        echo '<form method="post"><input type="hidden" '; 
        echo 'name="todo_id" value="'.$row['todo_id'].' ">'."\n";
        echo '<input type="submit" value="Delete" name="delete">';
        echo "\n</form>\n";
    echo "</li>";
}
?>
</ul>

