<?php
  include ('../config/init.php');
  include ('../database/users.php');

  $username = $_SESSION['username'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  if($name){
    try {
      changeName($username,$name);
      $_SESSION['success_message'] = 'Name changed with success!';
      $_SESSION['name'] = $name;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Name not changed!';
      die(header('Location: ../user_def.php'));
    }
  }

  if($email){
    try {
      changeEmail($username,$email);
      $_SESSION['success_message'] = 'Email changed with success!';
      $_SESSION['email'] = $email;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Email not changed!';
      die(header('Location: ../user_def.php'));
    }
  }
  if($address){
    try {
      changeAddress($username,$address);
      $_SESSION['success_message'] = 'Address changed with success!';
      $_SESSION['address'] = $address;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Address not changed!';
      die(header('Location: ../user_def.php'));
    }
  }

  header('Location: ../user_def.php');
?>
