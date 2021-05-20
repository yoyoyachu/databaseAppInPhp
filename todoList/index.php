<h1>TO-DO App</h1>

<?php 
require_once "pdo.php";
if(isset($_POST['todo_title'])){
    print_r($_POST['todo_title'])
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

<pre>
<?php echo $_POST['todo_title']; ?>
</pre>
