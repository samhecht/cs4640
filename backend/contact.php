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




    <title>Message Status</title>
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

        <a class="navbar-brand" href="./sample.html">Random Movie Generator</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../views/sample.html">Main</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/recently-released.html">Recently Released</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/user.html">User</a>
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
  </body>


<?php

function emailDevelopers(){
  // check the request method
  if ($_SERVER["REQUEST_METHOD"] == "GET"){

    if (!empty($_GET['name']) && !empty($_GET['surname'])&& !empty($_GET['email'])&& !empty($_GET['message'])) {
      // get form inputs

      $first_name = $_GET["name"];
      $last_name = $_GET["surname"];
      $email = $_GET["email"];
      $message = $_GET["message"];

      $full_email = $first_name . " " . $last_name . "\n" . $message . "\n";
      $full_email = $full_email . "\n" . "From " . $email;

      $full_email = wordwrap($full_email, 70);


      // send email
      mail("srh2kq@virginia.edu", "CS4640 Contact", $full_email);

      return;
    } else {
      return;
    }
  }
}

function validateInput(){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    if (isset($_GET['name']) && isset($_GET['surname']) && isset($_GET['email']) && isset($_GET['message'])) {
      // get form inputs
      $first_name = $_GET["name"];
      $last_name = $_GET["surname"];
      $email = $_GET["email"];
      $message = $_GET["message"];



      $bad = false;


      // check for email and message
      if (strlen($email) < 4){
        $bad = true;
      }
      if (strlen($message) < 1){

        $bad = true;
      }

      if (strpos($email, "@") === false){

        $bad = true;
      }
      if (strpos($email, ".") === false){

        $bad = true;
      }
<<<<<<< HEAD
=======

>>>>>>> 1eac64cfa6279b6b73876d2e86b834de2e6c0849
      return $bad;
    } else {
      echo "the post variables aren't set";
    }
  } else {
      echo "must be a post request";
      return false;

  }

}


if ($_SERVER["REQUEST_METHOD"] == "GET"){

  // if the input is good, email the devs
  if (validateInput() === false){
    emailDevelopers();
    echo "Message sent.";
  } else {
    echo "Please completely fill out the form.";

  }
}

?>

</html>
