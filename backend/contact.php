<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['surname'] = $_POST['surname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['message'] = $_POST['message'];
  } else {
    echo "Missing information <br/>";
  }
}


?>