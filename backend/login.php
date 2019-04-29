<!-- By Johnny Choi and Sammy Hecht -->
<!-- login users and add them to the database -->

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
  if (isset($_POST['login-flag'])){
    if ($_POST['login-flag'] == "true"){
      if (!empty($_POST['email']) && !empty($_POST['pwd'])) {

        $user = $_POST['email'];
        $pwd = $_POST['pwd'];


        $usernameExists = 0;
        $check = "SELECT * FROM user WHERE username = :user";
        $statement_check = $db->prepare($check);
        $statement_check->bindValue(':user', $user);
        $statement_check->execute();

        $row = $statement_check->fetch(PDO::FETCH_ASSOC);


        if ($row == false) {
          $usernameExists = 0;
        } else {
          $usernameExists = 1;
        }
        $statement_check->closeCursor();

        if ($usernameExists === 0) {
          $query = "INSERT INTO user (id, username, password) VALUES ('last_insert_id', :user, :pwd)";

          $statement = $db->prepare($query);
          $statement->bindValue(':user', $user);
          $statement->bindValue(':pwd', $pwd);
          $statement->execute();
          $statement->closeCursor();

        } else {
          // username exists check Password
          $associated_pass = $row['password'];
          if ($associated_pass != $pwd){
            // incorrect password tell them
            // set cookie so we can do some error handling
            setcookie("pass-error", "true", time() + 1000, "/");
            header("Location: " . $_SERVER["HTTP_REFERER"]);
          } else {
            // username exists and the password is correct
            $cookie_value = $user;
            // set a cookie to track the user up to 5 days
            setcookie("user", $cookie_value);
            if (isset($_COOKIE["pass-error"])){
              setcookie("pass-error", "", time() - 3600, "/");
            }
            header("Location: " . $_SERVER["HTTP_REFERER"]);
          }
        }
      }
    }
  }
}


?>
