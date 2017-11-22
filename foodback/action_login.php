<?php
  include ('/usr/users2/mieec2014/up201405662/public_html/foodback/config/init.php');
  include ('/usr/users2/mieec2014/up201405662/public_html/foodback/database/users.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (isValidUser($username, $password)) {
    $_SESSION['success_message'] = 'Login successful!';
    $_SESSION['username'] = $username;
  } else {
    $_SESSION['error_message'] = 'Login failed!';
  }

  header('Location: principal.php');
?>
