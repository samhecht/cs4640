<?php

session_start();
function emailDevelopers(){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = $_POST["name"];
    $last_name = $_POST["surname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $full_email = $first_name . " " . $last_name . "\n" . message . "\n";
    $full_email = $full_email . "\n" . "From " . $email;

    $full_email = wordwrap($full_email, 70);

    mail("srh2kq@virginia.edu", "CS4640 Contact", $full_email);

    return;
  } else {
    return;
  }
}


emailDevelopers();

?>
