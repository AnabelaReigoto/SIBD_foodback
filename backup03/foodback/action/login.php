<?php
  include ('../config/init.php'); //MUDAR
  include ('../database/users.php'); //MUDAR

  $username = $_POST['username'];
  $password = $_POST['password'];


  if (isValidUser($username, $password)) {
    $_SESSION['success_message'] = 'Login successful!';
    $_SESSION['username'] = $username;
    $_SESSION['name'] = getName($username);
    $_SESSION['email'] = getEmail($username);
    $_SESSION['address'] = getAddress($username);
  } else {
    $_SESSION['error_message'] = 'Login failed!';
  }

  header('Location: ../principal.php');
?>
