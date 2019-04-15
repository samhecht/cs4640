<?php

session_start();
function emailDevelopers(){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = $_POST["form_name"];
    $last_name = $_POST["form_lastname"];
    $email = $_POST["form_email"];
    $message = $_POST["form_message"];

    $full_email = $first_name . " " . $last_name . "\n" . message . "\n";
    $full_email = $full_email . "\n" . "From " . $email;

    mail("srh2kq@virginia.edu", "CS4640 Contact", $full_email);
    return;
  } else {
    return;
  }
}

?>
