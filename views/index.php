<?php session_start(); ?>
<!-- By Johnny Choi and Sammy Hecht -->
<!-- home page for the site -> will refactor the name later -->

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
              <a class="nav-link" href="./recently-released.html">Recently Released</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./user.html">User</a>
            </li>
          </ul>
        </div>

        <!-- Log In Forms/Button -->
        <form class="form-inline">
          <div class="form-group">
            <label class="sr-only" for="email">Email:</label>
            <input type="email" class ="form-control" id="email" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="sr-only" for="pwd" >Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Password">
          </div>
          <button type="button" class="btn btn-sm btn-primary login-button" id="login-submit">Submit</button>
          </form>
          <div>
              <p id="login-error" style="color: red;"></p>
          </div>
        </nav>
      </header>




      <!-- Poster for the generated movie goes here -->
      <div class="movie" style="margin-top: 5%;">
        <img src="../images/blank-movie.jpg" id="movie-pic">
        <p style="text-align: center;" id="movie-desc"></p>
      </div>

      <!-- Random Movie Generater Button -->
      <div class="container">
          <div class="col-lg-12 text-center">
            <a class="btn btn-danger btn-lg" href="#" role="button" id="gen">Generate</a>
            <p></p>
          </div>
      </div>

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
                      <a href="../views/recently-released.html">Recently Released</a>
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
                      <a href="#!">User</a>
                    </h6>
                  </div>
                  <!-- Grid column -->

              </div>
        </div>

    </footer>

    <!-- import javascript files -->
    <script src="../scripts/login-script.js"></script>
    <?php include '../backend/connect-db.php';?>
    </body>



  </html>