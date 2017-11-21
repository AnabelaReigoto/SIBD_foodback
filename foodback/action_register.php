<?php
include ('/usr/users2/mieec2014/up201404125/public_html/foodback/config/init.php');
include ('/usr/users2/mieec2014/up201404125/public_html/foodback/database/users.php');

  $username = strip_tags($_POST['username']);
  $password = $_POST['password'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $morada = $_POST['morada'];

  if (!$username || !$password) {
    $_SESSION['error_message'] = 'All fields are mandatory!';
    $_SESSION['form_values'] = $_POST;
    die(header('Location: register.php'));
  }

  try {
    createUser($username, $password,$name,$email,$morada);
    $_SESSION['success_message'] = 'User registered with success!';
  } catch (PDOException $e) {

    if (strpos($e->getMessage(), 'users_pkey') !== false)
      $_SESSION['error_message'] = 'Username already exists!';
    else
      $_SESSION['error_message'] = 'FAIL!';

    $_SESSION['form_values'] = $_POST;
    die(header('Location: register.php'));
  }

  header('Location: principal.php');
?>
