<?php
  include ('../config/init.php');
  include ('../database/users.php');

  if (isset($_POST['name']) && !preg_match ("/^[a-zA-Z\s]+$/", $_POST['name'])) {
    $_SESSION['error_message'] = 'ERROR: Name can only contain letters and spaces';
    die(header('Location: ../principal.php'));
  }
  if (isset($_POST['username']) && !preg_match ("/^[a-zA-Z\s]+$/", $_POST['username'])) {
    $_SESSION['error_message'] = 'ERROR: Username can only contain letters and spaces';
    die(header('Location: ../principal.php'));
  }

  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);
  $name =strip_tags( $_POST['name']);
  $email = strip_tags($_POST['email']);
  $address = strip_tags($_POST['address']);

  if (!$username || !$password || !$name || !$name || !$address) {
    $_SESSION['error_message'] = 'All fields are mandatory!';
    $_SESSION['form_values'] = $_POST;
    die(header('Location: ../register.php'));
  }

  /*-- Verify email validation (valid format <something>@<something>.<something>)--*/
  if ($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } else {
      $_SESSION['error_message'] = 'Email is not valid!';
      $_SESSION['form_values'] = $_POST;
      die(header('Location: ../register.php'));
    }
  }

  /*-- Verify password validation (min 4, max 20 characters)--*/
  if ($password) {
    if (strlen($password) < 4) {
       $_SESSION['error_message'] = 'ERROR: Password is too short, minimum is 4 characters (20 max).';
       $_SESSION['form_values'] = $_POST;
       die(header('Location: ../register.php'));
    } elseif(strlen($password) > 12) {
       $_SESSION['error_message'] = 'ERROR: Password is too long, maximum is 20 characters (4 min).';
       $_SESSION['form_values'] = $_POST;
       die(header('Location: ../register.php'));
    }
  }

  /*-- Verify username validation (cannot exist already)--*/
  try {
    createUser($username, $password, $name, $email, $address);
    $_SESSION['success_message'] = 'User registered with success!';

  } catch (PDOException $e) {

    if (strpos($e->getMessage(), 'users_pkey') !== false) {
      $_SESSION['error_message'] = 'ERROR: Username already exists!';

    } else {
      $_SESSION['error_message'] = 'ERROR: Email already exists!';
    }
    $_SESSION['form_values'] = $_POST;
    die(header('Location: ../register.php'));
  }

  header('Location: ../principal.php');
?>
