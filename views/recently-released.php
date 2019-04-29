<!-- By Johnny Choi and Sammy Hecht -->
<!-- page to show the recent releases -->


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


    <title>Recently Released</title>
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
    <body>

      <h2 style="text-align: center; padding-top: 5%;">Recent Releases</h2>
      <!-- toggles the release display -->
      <button type="button" class="btn btn-sm btn-primary login-button" id="toggle">Toggle View</button>

      <!-- grid view of the recent releases -->
      <div id="row-view">
        <div class="row" id="developer">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img">
            <p class="mov-desc"> This is a movie description </p>
          </div>
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img">
            <p class="mov-desc"> This is a movie description </p>
          </div>
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img">
            <p class="mov-desc">  This is a movie description </p>
          </div>
        </div>
        <div class="row" id="developer2">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img">
            <p class="mov-desc"> This is a movie description </p>
          </div>
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img">
            <p class="mov-desc"> This is a movie description </p>
          </div>
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img">
            <p class="mov-desc"> This is a movie description </p>
          </div>
        </div>
        <div class="row" id="developer3">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img">
            <p class="mov-desc"> This is a movie description </p>
          </div>
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img">
            <p class="mov-desc"> This is a movie description </p>
          </div>
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img">
            <p class="mov-desc"> This is a movie description </p>
          </div>
        </div>
      </div>

      <!-- list view of the recent releases  default hidden -->
      <div id="list-view">
        <div class="row">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg"  class="grid-img" style="width: 60%; height: auto; text-align: center; display: inline-block">
          </div>
          <div class="col text-center">
            <p class="mov-desc" style="float: left; padding-top: 30%;"> This is a movie description</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg"  class="grid-img" style="width: 60%; height: auto; text-align: center; display: inline-block">
          </div>
          <div class="col text-center">
            <p class="mov-desc" style="float: left; padding-top: 30%;"> This is a movie description</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg"  class="grid-img" style="width: 60%; height: auto; text-align: center; display: inline-block">
          </div>
          <div class="col text-center">
            <p class="mov-desc" style="float: left; padding-top: 30%;"> This is a movie description</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg"  class="grid-img" style="width: 60%; height: auto; text-align: center; display: inline-block">
          </div>
          <div class="col text-center">
            <p class="mov-desc" style="float: left; padding-top: 30%;"> This is a movie description</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg"  class="grid-img" style="width: 60%; height: auto; text-align: center; display: inline-block">
          </div>
          <div class="col text-center">
            <p class="mov-desc" style="float: left; padding-top: 30%;"> This is a movie description</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg"  class="grid-img" style="width: 60%; height: auto; text-align: center; display: inline-block">
          </div>
          <div class="col text-center">
            <p class="mov-desc" style="float: left; padding-top: 30%;"> This is a movie description</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <img src="../images/blank-movie.jpg" class="grid-img" style="width: 60%; height: auto; text-align: center; display: inline-block">
          </div>
          <div class="col text-center">
            <p class="mov-desc" style="float: left; padding-top: 30%;"> This is a movie description</p>
          </div>
        </div>
      </div>


    <!-- import javascript files -->
    <script src="../scripts/login-script.js"></script>


      <!-- Footer -->
    <footer class="page-footer font-small indigo">

    <!-- Footer Links -->
      <div class="container">

            <!-- Grid row-->
            <div class="row text-center d-flex justify-content-center pt-5 mb-3">

              <!-- Grid column -->
              <div class="col-md-2 mb-3">
                <h6 class="text-uppercase">
                  <a href="./index.php">Main</a>
                </h6>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-2 mb-3">
                <h6 class="text-uppercase">
                  <a href="./recently-released.php">Recently Released</a>
                </h6>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-2 mb-3">
                <h6 class="text-uppercase">
                  <a href="./about.php">About</a>
                </h6>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-2 mb-3">
                <h6 class="text-uppercase">
                  <a href="./user.php">User</a>
                </h6>
              </div>
              <!-- Grid column -->

          </div>
    </div>



    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../scripts/release-scripts.js"></script>
    </body>
</html>
