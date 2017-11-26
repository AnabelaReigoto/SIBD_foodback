<?php
  include ('../config/init.php');
  include ('../database/users.php');

  $name = $_POST['name'];
  $address = $_POST['address'];
  $cuisine = $_POST['cuisine'];
  $price = $_POST['price'];
  $schedule1 = $_POST['schedule1'];
  $schedule2 = $_POST['schedule2'];
  $contact = $_POST['contact'];

  if($name){
    try {
      changeName($username,$name);
      $_SESSION['success_message'] = 'Name changed with success!';
      echo ($_SESSION['success_message']);
      $_SESSION['name'] = $name;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header('Location: ../definitions.php'));
    }
  }
  if($address){
    try {
      changeAddress($username,$address);
      $_SESSION['success_message'] = 'Address changed with success!';
      echo ($_SESSION['success_message']);
      $_SESSION['address'] = $address;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header('Location: ../definitions.php'));
    }
  }
  if($cuisine){
    try {
      changeAddress($username,$cuisine);
      $_SESSION['success_message'] = 'Address changed with success!';
      echo ($_SESSION['success_message']);
      $_SESSION['cuisine'] = $cuisine;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header('Location: ../definitions.php'));
    }
  }
  if($price){
    try {
      changePrice($username,$price);
      $_SESSION['success_message'] = 'Price changed with success!';
      echo ($_SESSION['success_message']);
      $_SESSION['price'] = $price;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header('Location: ../definitions.php'));
    }
  }
  if($schedule1){
    try {
      changeAddress($username,$address);
      $_SESSION['success_message'] = 'Address changed with success!';
      echo ($_SESSION['success_message']);
      $_SESSION['address'] = $address;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header('Location: ../definitions.php'));
    }
  }
  if($schedule2){
    try {
      changeAddress($username,$address);
      $_SESSION['success_message'] = 'Address changed with success!';
      echo ($_SESSION['success_message']);
      $_SESSION['address'] = $address;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header('Location: ../definitions.php'));
    }
  }
  if($contact){
    try {
      changeAddress($username,$address);
      $_SESSION['success_message'] = 'Address changed with success!';
      echo ($_SESSION['success_message']);
      $_SESSION['address'] = $address;
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header('Location: ../definitions.php'));
    }
  }

  header('Location: ../definitions.php');
?>
