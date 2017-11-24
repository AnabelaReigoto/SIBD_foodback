<?php
  include ('../config/init.php');
  include ('../database/users.php');

  $username = strip_tags($_POST['username']);
  $password = $_POST['password'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  if (!$username || !$password || !$name || !$name || !$address) {
    $_SESSION['error_message'] = 'All fields are mandatory!';
    $_SESSION['form_values'] = $_POST;
    die(header('Location: ../register.php'));
  }
  /*if ($email) {
      if (!filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL) === false) {

      } else {
        $_SESSION['error_message'] = 'Email is not valid!';
        print_r ($_SESSION['error_message']);
        //$_SESSION['form_values'] = $_POST;
        die(header('Location: ../establishment.php'));
      }
  }
  if ($password) {
    if (strlen($password) < 4) {
       $_SESSION['error_message'] = 'Password is too short, minimum is 4 characters (20 max).';
       //$_SESSION['form_values'] = $_POST;
       die(header('Location: ../register.php'));
    } elseif(strlen($password) > 12) {
       $_SESSION['error_message'] = 'Password is too long, maximum is 20 characters (4 min).';
       //$_SESSION['form_values'] = $_POST;
       die(header('Location: ../definitions.php'));
    }
  }*/

  try {
    createUser($username, $password,$name,$email,$address);
    $_SESSION['success_message'] = 'User registered with success!';
  } catch (PDOException $e) {

    if (strpos($e->getMessage(), 'users_pkey') !== false)
      $_SESSION['error_message'] = 'Username already exists!';
    else
      $_SESSION['error_message'] = 'FAIL!';

    $_SESSION['form_values'] = $_POST;
    die(header('Location: ../register.php'));
  }

  header('Location: ../principal.php');
?>
