<?php
// hostname
$hostname = 'localhost:3306';

// database name
$dbname = 'sammyH';

// database credentials
$username = 'sammyH';
$password = 'db-pass';
$dsn = "mysql:host=$hostname;dbname=$dbname";

try
{
//  $db = new PDO("mysql:host=$hostname;dbname=$dbname, $username, $password);
   $db = new PDO($dsn, $username, $password);
   
   // dispaly a message to let us know that we are connected to the database
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{
   // Call a method from any object, use the object's name followed by -> and then method's name
   // All exception objects provide a getMessage() method that returns the error message
   $error_message = $e->getMessage();
   echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e)       // handle any type of exception
{
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
    $user = $_POST['email'];
    $pwd = $_POST['pwd'];

//    $_SESSION[user] = $_POST['email'];


    $query = "INSERT INTO user (id, username, password) VALUES ('last_insert_id', :user, :pwd)";

    $statement = $db->prepare($query);
    $statement->bindValue(':user', $user);
    $statement->bindValue(':pwd', $pwd);
    $statement->execute();
    $statement->closeCursor();


  }
}

//    if (isset($_POST['email'])){
//      $user = $_POST['email'];
//      setcookie('user', $user, time()+3600);
//
//    }
//
//    if (isset($_COOKIE['user'])) {
//
//      $user = $_COOKIE['user'];
//      echo "<h1>Welcome $user ! </h1>"
//    }

?>
