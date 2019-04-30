<?php


header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');

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
// $data = (int) $_SERVER['CONTENT_LENGTH'];

// retrieve data from the request
$postdata = file_get_contents("php://input");

// process data
// (this example simply extracts the data and restructures them back)
$request = json_decode($postdata);

$data = [];
foreach ($request as $k => $v)
{
  $data[0][$k] = $v;
}

$email = $data[0]['email'];
$pwd = $data[0]['password'];



// make sure email isn't taken already
$query_prep = "SELECT from user WHERE username = :user";
$query = $db->prepare($query_prep);
$query->bindValue(':user', $email);
$query->execute();

$row = $query->fetch(PDO::FETCH_ASSOC);
$query->closeCursor();

if ($row != false){
  // email already exists throw error
  echo "<p style='color: red;'>Email already taken</p>";
  $data[0]['stat'] = 'error';
} else {

  // we're good make a new user
  $insert_prep = "INSERT INTO user (id, username, password) VALUES ('last_insert_id', :user, :pwd)";
  $insert = $db->prepare($insert_prep);
  $insert->bindValue(':user', $email);
  $insert->bindValue(':pwd', $pwd);
  $insert->execute();
  $insert->closeCursor();

  // set user cookie to sign them in
  if (!isset($_COOKIE['user'])){
    setcookie('user', $email, time() + (86000 * 5), '/');
  } else {
    setcookie('user', $email);
  }

  data[0]['stat'] = 'good';
}



// sent response (in json format) back to the front end
echo json_encode(['content'=>$data]);

?>
