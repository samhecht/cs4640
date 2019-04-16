<?php
// hostname
$hostname = 'localhost:3306';

// database name
$dbname = 'jc2ar';

// database credentials
$username = 'jc2ar';
$password = 'Coffeeandcigs6$';
$dsn = "mysql:host=$hostname;dbname=$dbname";
try 
{
//  $db = new PDO("mysql:host=$hostname;dbname=$dbname, $username, $password);
   $db = new PDO($dsn, $username, $password);
   
   // dispaly a message to let us know that we are connected to the database 
   echo "<p>You are connected to the database</p>";
}

require('connect-db.php');

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
    $username = $_POST['email'];
    $password = $_POST['pwd'];
    $query = "INSERT INTO user (username, password) VALUES (:username, :password)";
    
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
  }
  else {
    echo "failed";
  }
}
else {
  echo "failed";
}


?>