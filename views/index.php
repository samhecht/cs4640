<!-- By Johnny Choi and Sammy Hecht -->
<!-- home page for the site -> will refactor the name later -->

<?php
  // start a session if there isn't already a session running
  if (session_status() !== PHP_SESSION_ACTIVE){
    session_start();
  }

?>
<?php
  if (!isset($_COOKIE['user'])){
    setcookie("user", "n", time() + (86400 * 5), "/");
    header("Location: index.php");
  }
  // mainly checking for logout
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['logout-flag'])){
      // if they logged out, reset the cookie and refresh page
      if ($_POST['logout-flag'] == "true"){
        setcookie("user", "n");
        if (isset($_COOKIE["pass-error"])){
          // free incorrect password error
          setcookie("pass-error", "", time() - 3600, "/");
        }
        header("Location: index.php");
      }
    }
  }
?>

<?php
  include '../backend/login.php';
?>


<!-- some of the bootstrap is inspired from this tutorial on the
    bootstrap documentation: https://mdbootstrap.com/docs/jquery/navigation/navbar/ -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />

    <link rel="stylesheet" href="../styles/mystyle.css">

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <!-- jquery -->



    <title>Movie Generator</title>
    <style>
      /* Style the input field */
      #myInput {
        padding: 20px;
        margin-top: -6px;
        border: 0;
        border-radius: 0;
        background: #f1f1f1;
      }
    </style>
  </head>
  <body>
    <header>
      <!-- nav bar -->
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">

        <a class="navbar-brand" href="./index.php">Random Movie Generator</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="./index.php">Main</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./recently-released.php">Recently Released</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./user.php">User</a>
            </li>
          </ul>
        </div>

        <!-- Log In Forms/Button -->
        <?php
        // if user hasn't been set, supply a login form

          if (strlen($_COOKIE['user']) < 2){
            echo '<form class="form-inline" id="login_form" onsubmit="shouldLogin()" method="POST" action="index.php">
              <div class="form-group">
                <label class="sr-only" for="email">Email:</label>
                <input name="email" type="email" class ="form-control" id="email" placeholder="Email" autofocus>
              </div>
              <div class="form-group">
                <label class="sr-only" for="pwd" >Password:</label>
                <input name="pwd" type="password" class="form-control" id="pwd" placeholder="Password">
              </div>
    <!--          <button type="button" class="btn btn-sm btn-primary login-button" id="login-submit">Submit</button>-->
              <input type="hidden" name="login-flag" id="login-flag" value="false"/>
              <input type="submit" name="submit" id="login-submit" value="Login"/>
              </form>
              <div>
                  <p id="login-error" style="color: red;"></p>
              </div>';
              if (isset($_COOKIE["pass-error"])){
                if ($_COOKIE["pass-error"] == "true"){
                  // wrong password give a message
                  echo "
                    <div>
                      <p id='login-error' style='color: red;'>Incorrect Password</p>
                    </div>
                  ";
                  setcookie("pass-error", "", time() - 3600, "/");
                }
              }

          } else {
            // if user has been set, welcome them
            $user = $_COOKIE['user'];
            echo "<li class='nav-item'>
              <p class='nav-link' style='color: white;'>Welcome $user</p>
            </li>
            <!-- try to get logout working first -->
            <form id='logout_form' onsubmit='logoutUser()' method='POST' action='index.php'>
              <input type='hidden' name='logout-flag' id='logout-flag' value='false'/>
              <input type='submit' name='logout' id='logout-submit' value='Logout'/>
            </form>
            ";

          }
         ?>

        </nav>
      </header>




    <?php
      // check for GET
      if ($_SERVER["REQUEST_METHOD"] == "GET"){
        // make sure there weren't issues getting the data
        if (isset($_GET["movie_title"]) && isset($_GET["movie_img"])){
          $movie_title = $_GET["movie_title"];
          $movie_url = $_GET["movie_img"];
          // echo the random movie to the page
          echo "<div class='movie' style='margin-top: 5%'><img src='$movie_url' id='movie-pic'>
          <p style='text-align: center;' id='movie-desc'>$movie_title</p></div>";
          // check if sessions has been initialized
          if (!isset($_SESSION["movies"])){
            $_SESSION["movies"] = array();
          } else {
            // save the current movie to the sessions superglobal
            array_push($_SESSION["movies"], $_GET["curr_movie"]);

            // put the movie in the database
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
            if (isset($_COOKIE['user'])){
              if (strlen($_COOKIE['user']) > 2){
                // fetch userid
                $this_user = $_COOKIE['user'];
                $currUser = "SELECT * FROM user WHERE username = :user";
                $stateUser = $db->prepare($currUser);
                $stateUser->bindValue(':user', $this_user);
                $stateUser->execute();

                // get row for this user
                $row = $stateUser->fetch(PDO::FETCH_ASSOC);

                $user_id = $row['id'];
                $stateUser->closeCursor();

                $movie_id = $_GET['curr_movie'];
                if (strlen($movie_id) > 0){
                  // insert movie id into the users table
                  $insert_movie = "INSERT into user_movie (user_id, movie_name) VALUES (:userid, :movieid)";
                  $ins_mov_state = $db->prepare($insert_movie);
                  $ins_mov_state->bindValue(':userid', $user_id);
                  $ins_mov_state->bindValue(':movieid', $movie_id);
                  $ins_mov_state->execute();
                  $ins_mov_state->closeCursor();
                }



              }
            }


          }
        }
      }
     ?>
      <!-- Random Movie Generater Button -->
      <div class="container">
          <div class="col-lg-12 text-center">
            <form action="index.php" method="get">
              <input hidden id="current_movie" name="curr_movie"/>
              <input hidden type="text" id="movie_title" name="movie_title" value=""/>
              <input hidden type="text" id="movie_img" name="movie_img" value=""/>
              <!-- Generate Movie Button -->
              <input type="submit" class="btn btn-danger btn-lg" href="#" value="Generate" id="gen"/>

              <!-- Save Generated Movie Button -->
              <!--<input class="btn btn-primary btn-lg" href="#" value="Save" id="save" />-->
            </form>
            <p></p>
          </div>
      </div>


      <!-- bootstrap and ajax -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>







      <!-- Footer -->
      <footer class="page-footer font-small indigo">

      <!-- Footer Links -->
          <div class="container">

                <!-- Grid row-->
                <div class="row text-center d-flex justify-content-center">

                  <!-- Grid column -->
                  <div class="col-md-2">
                    <h6 class="text-uppercase">
                      <a href="../views/index.php">Main</a>
                    </h6>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-2">
                    <h6 class="text-uppercase">
                      <a href="../views/recently-released.php">Recently Released</a>
                    </h6>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-2">
                    <h6 class="text-uppercase">
                      <a href="../views/index.php">About</a>
                    </h6>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-2">
                    <h6 class="text-uppercase">
                      <a href="./user.php">User</a>
                    </h6>
                  </div>
                  <!-- Grid column -->

              </div>
        </div>

    </footer>

    <!-- import javascript external javascript files-->

    <script src="../scripts/login-script.js"></script>

    </body>



  </html>
