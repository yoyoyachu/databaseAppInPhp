<?php 
 if(!isset($_COOKIE['magic'])){
     //cookie will expire after an hour
    setcookie('magic','45',time()+3600);
 }
?>
<pre>
<?php print_r($_COOKIE) ?>
</pre>
<p><a href="cookies.php">Click Me!</a> or press Refresh</p>
