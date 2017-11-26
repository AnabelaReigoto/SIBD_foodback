<?php
  include ('../config/init.php');
  include ('../database/data_establishments.php');

  $id = $_GET['id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $cuisine = $_POST['cuisine'];
  $price = $_POST['price'];
  $schedule1 = $_POST['schedule1'];
  $schedule2 = $_POST['schedule2'];
  $contact = $_POST['contact'];
  $wifi = $_POST['wifi'];

  if($name){
    try {
      changeNameEstab($id,$name);
      $_SESSION['success_message'] = 'Name Estab changed with success!';
      echo ($_SESSION['success_message']);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header("Location: ../edit_estab.php?id=$id"));
    }
  }
  if($address){
    try {
      changeAddressEstab($id,$address);
      $_SESSION['success_message'] = 'Address changed with success!';
      echo ($_SESSION['success_message']);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header("Location: ../edit_estab.php?id=$id"));
    }
  }
  if($cuisine){
    try {
      changeCuisineEstab($id,$cuisine);
      $_SESSION['success_message'] = 'Cuisine changed with success!';
      echo ($_SESSION['success_message']);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header("Location: ../edit_estab.php?id=$id"));
    }
  }
  if($price){
    try {
      changePriceEstab($id,$price);
      $_SESSION['success_message'] = 'Price changed with success!';
      echo ($_SESSION['success_message']);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header("Location: ../edit_estab.php?id=$id"));
    }
  }
  if($schedule1){
    try {
      changeSchedule1Estab($id,$schedule1);
      $_SESSION['success_message'] = 'Schedule1 changed with success!';
      echo ($_SESSION['success_message']);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header("Location: ../edit_estab.php?id=$id"));
    }
  }
  if($schedule2){
    try {
      changeSchedule2Estab($id,$schedule2);
      $_SESSION['success_message'] = 'Schedule2 changed with success!';
      echo ($_SESSION['success_message']);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header("Location: ../edit_estab.php?id=$id"));
    }
  }
  if($contact){
    try {
      changeContactEstab($id,$contact);
      $_SESSION['success_message'] = 'Contact changed with success!';
      echo ($_SESSION['success_message']);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header("Location: ../edit_estab.php?id=$id"));
    }
  }

  if($wifi){
    try {
      changeEstabInfo($id,$wifi);
      $_SESSION['success_message'] = 'Wifi changed with success!';
      echo ($_SESSION['success_message']);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAILLL!';
      echo ($_SESSION['error_message']);
      die(header("Location: ../edit_estab.php?id=$id"));
    }
  }



  header("Location: ../establishment.php?id=$id");
?>
