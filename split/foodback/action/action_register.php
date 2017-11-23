<?php
  include ('../config/init.php'); //MUDAR
  include ('../database/users.php'); //MUDAR

  $username = strip_tags($_POST['username']);
  $password = $_POST['password'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  if (!$username || !$password) {
    $_SESSION['error_message'] = 'All fields are mandatory!';
    $_SESSION['form_values'] = $_POST;
    die(header('Location: ../register.php'));
  }

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
