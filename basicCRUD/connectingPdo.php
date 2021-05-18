<h1>Connecting SQL to PHP</h1>

<?php 
    try {
    echo "<pre>\n";
    require_once "pdo.php";
    $stmt = $pdo->query("SELECT * FROM Users");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        print_r($row);
    }
    echo "</pre>\n";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>