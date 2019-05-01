<!-- By Johnny Choi and Sammy Hecht -->
<!-- will be a user page but not one of the required 3 for this assignment -->


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


    <title>User</title>
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
              <a class="nav-link" href="./user.html">User</a>
            </li>
          </ul>
        </div>

        <!-- Log In Forms/Button -->
        <?php
          if (strlen($_COOKIE["user"]) < 2){
            echo '<form class="form-inline" id="login_form" method="POST">
              <div class="form-group">
                <label class="sr-only" for="email">Email:</label>
                <input name="email" type="email" class ="form-control" id="email" placeholder="Email" autofocus>
              </div>
              <div class="form-group">
                <label class="sr-only" for="pwd" >Password:</label>
                <input name="pwd" type="password" class="form-control" id="pwd" placeholder="Password">
              </div>
    <!--          <button type="button" class="btn btn-sm btn-primary login-button" id="login-submit">Submit</button>-->
              <input type="submit" name="submit" id="login-submit" value="Login"/>
              </form>
              <div>
                  <p id="login-error" style="color: red;"></p>
              </div>';

          } else {
            $user = $_COOKIE['user'];
            echo "<li class='nav-item'>
              <p class='nav-link' style='color: white;'>Welcome $user</p>
            </li>";
          }
         ?>
        </nav>
      </header>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

<?php
  if (isset($_COOKIE['user'])){
    if (strlen($_COOKIE['user']) > 2){
      $movies = [];
      // connect to database
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

      // get user id
      $id_prepare = "SELECT from user WHERE username = :user";
      $id_ex = $db->prepare($id_prepare);
      $id_ex->bindValue(':user', $_COOKIE['user']);
      $id_ex->execute();

      $user_row = $id_ex->fetch(PDO::FETCH_ASSOC);
      $user_id = $user_row['id'];
      
      $id_ex->closeCursor();

      $movie_prepare = "SELECT from user_movie WHERE user_id = :uid";
      $movie_ex = $db->prepare($movie_prepare);
      $movie_ex->bindValue(':uid', $user_id);
      $movie_ex->execute();



      $rows = $id_ex->fetchAll();
      $id_ex->closeCursor();
      // save every movie id
      foreach($rows as $key => $movieNum){
        array_push($movies, $movieNum);
      }




        echo "
        <div id='list-view'>
        ";
        //insert movie id with img so we can fix in our js
        foreach($movies as $movieId){
          echo "
          <div class='row'>
            <div class='col text-center'>
              <img src='$movieId'  class='grid-img' style='width: 60%; height: auto; text-align: center; display: inline-block'>
            </div>
            <div class='col text-center'>
              <p class='mov-desc' style='float: left; padding-top: 30%;'> This is a movie description</p>
            </div>
          </div>
          ";
        }
        echo "
        </div>
        ";

    } else {
      echo "<h1>Please login to see your previous movies</h1>";
    }
  } else {
    echo "<h1>Please login to see your previous movies</h1>";
  }
 ?>
 <script src="../scripts/user-scripts.js"></script>





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
                      <a href="../views/about.php">About</a>
                    </h6>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-2">
                    <h6 class="text-uppercase">
                      <a href="#!">User</a>
                    </h6>
                  </div>
                  <!-- Grid column -->

              </div>
        </div>

    </footer>
    <!-- import javascript files -->
    <script src="../scripts/login-script.js"></script>
    </body>



  </html>
