<?php
include_once('env.php');

try {
  $dbh = new PDO("pgsql:host=$host;dbname=$dbname;port=$port", $dbuser, $dbpass, array(PDO::ATTR_PERSISTENT => true));	
} catch(PDOException $e) {
  echo "Error : " . $e->getMessage() . "<br/>";
  die();
}

/* Create the table if it doesn't already exist */
$sql = 'CREATE TABLE IF NOT EXISTS words (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  definition VARCHAR(255) DEFAULT NULL)';
try {
    $dbh->exec($sql);
} catch(PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();
}
  
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  header('Content-type: application/json');
  $sql = "SELECT * FROM words";
  $stmt = $dbh->query($sql);
  if ($stmt===false){
      echo "<pre>Error executing the query: $sql</pre>";
      die();
  }

  $items = array();
  foreach ($stmt as $row){
    $item = array(
      "word" => $row['name'], 
      "definition" => $row['definition']
    );
    array_push($items, $item);
  }
  echo '{"items":',json_encode($items),'}';
}
  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['word'])) {
    $w = $_POST['word'];
    $d = $_POST['definition'];
    $sql = 'INSERT INTO words(name, definition) VALUES(:w, :d)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':w', $w);
    $stmt->bindValue(':d', $d);
    $stmt->execute();
    if ($stmt===false){
        echo "<pre>Error executing the query: $sql</pre>";
        die();
    }
    echo 'added word ',$w,' and definition ',$d,' to database';
  }
}

?>