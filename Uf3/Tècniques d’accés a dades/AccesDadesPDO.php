<?php
  //connexió dins block try-catch:
  //  prova d'executar el contingut del try
  //  si falla executa el catch
  try {
    $hostname = "localhost";
    $dbname = "gringottsDB";
    $username = "goblin_jaume";
    $pw = "patata";
    $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }
  
  //preparem i executem la consulta
  $query = $pdo->prepare("select i, a FROM prova");
  $query->execute();
  
  //anem agafant les fileres d'amb una amb una
  foreach ($query as $row) {
    echo $row['i']." - " . $row['a']. "<br/>";
  }

  //eliminem els objectes per alliberar memòria 
  unset($pdo); 
  unset($query)
 
?>