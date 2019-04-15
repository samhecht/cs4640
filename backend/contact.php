<?php

session_start();
function emailDevelopers(){
  // check the request method
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // get form inputs
    $first_name = $_POST["name"];
    $last_name = $_POST["surname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

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

function validateInput(){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // get form inputs
    $first_name = $_POST["name"];
    $last_name = $_POST["surname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $bad = false;

    $req_email = array('@', '.');
    // check for email and message
    if (strlen($email) < 4){
      $bad = true;
    }
    if (strlen($message) < 1){
      $bad = true;
    }

    $email_arr = $email.explode();
    $email_diff = array_diff($email_arr, $req_email);

    if ((!in_array('@', $email_diff)) || (!in_array('.', $email_diff))){
      $bad = true;
    }


    return $bad;
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){

  // if the input is good, email the devs
  if (!validateInput()){
    emailDevelopers();
  } else {
    // need to get this on the about page
    echo "Please completely fill out the form.  Redirecting...";

  }
}


header('location: ' . "../views/about.html");


?>
