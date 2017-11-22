<?php
  include ('/usr/users2/mieec2014/up201405662/public_html/foodback/config/init.php');
  include ('/usr/users2/mieec2014/up201405662/public_html/foodback/database/users.php');

  $username = $_SESSION['username'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  if($name){
    try {
      changeName($username,$name);
      $_SESSION['success_message'] = 'Name changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      die(header('Location: definitions.php'));
    }
  }

  if($email){
    try {
      changeEmail($username,$email);
      $_SESSION['success_message'] = 'Email changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      die(header('Location: definitions.php'));
    }
  }
  if($address){
    try {
      changeAddress($username,$address);
      $_SESSION['success_message'] = 'Address changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      die(header('Location: definitions.php'));
    }
  }



  header('Location: definitions.php');
?>
