<?php 
session_start();
if(!isset($_SESSION['strawberry'])){
    $_SESSION['strawberry'] = 0;
    echo("<p>Session is empty</p>\n");
}else if($_SESSION['strawberry'] < 3){
    $_SESSION['strawberry'] += 1;
    echo("<p>Added one...</p>\n");
}else{
    session_destroy();
    session_start();
    echo("<p>Session Restarted</p>\n");
}
?>
<p><a href="sessfun.php">Click Me!</a></p>
<p>Our Session ID is: <?php echo(session_id()); ?></p>
<pre>
<?php print_r($_SESSION); ?>
</pre>