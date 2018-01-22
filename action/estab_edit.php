<?php
  include ('../config/init.php');
  include ('../database/data_establishment.php');

  $id = $_GET['id'];
  $name = strip_tags($_POST['name']);
  $address = strip_tags($_POST['address']);
  $zone = strip_tags($_POST['zone']);
  $city = strip_tags($_POST['city']);
  $cuisine = $_POST['cuisine'];
  $price = $_POST['price'];
  $schedule1 = strip_tags($_POST['schedule1']);
  $schedule2 = strip_tags($_POST['schedule2']);
  $contact = $_POST['contact'];
  $wifi = $_POST['wifi'];
  $terrace = $_POST['terrace'];
  $takeaway =$_POST['takeaway'];
  $delivery =$_POST['delivery'];
  $music = $_POST['music'];

  if($name){
    try {
      changeNameEstab($id,$name);
      $_SESSION['success_message'] = 'Name Estab changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Name not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($address){
    try {
      changeAddressEstab($id,$address);
      $_SESSION['success_message'] = 'Address changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Address not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($zone){
    try {
      changeZoneEstab($id,$zone);
      $_SESSION['success_message'] = 'Zone changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Zone not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($city){
    try {
      changeCityEstab($id,$city);
      $_SESSION['success_message'] = 'City changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: City not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($cuisine && $cuisine !== getEstablishmentCuisineById($id)){
    $id_cuisine = getCuisineIdByName($cuisine);
    try {
      changeCuisineEstab($id,$cuisine,$id_cuisine);
      $_SESSION['success_message'] = 'Cuisine changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Cuisine not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($price){
    if ($price && !preg_match ("/^(?:0|[1-9]\d*)(?:\.\d{2})?$/", $price)) {
      $_SESSION['error_message'] = 'ERROR: Price can only contain numbers';
      die(header('Location: ../estab_edit.php?id=$id'));
    }
    try {
      changePriceEstab($id,$price);
      $_SESSION['success_message'] = 'Price changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Price not changed - can only contain numbers';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($schedule1){
    try {
      changeSchedule1Estab($id,$schedule1);
      $_SESSION['success_message'] = 'Schedule1 changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Schedule1 not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($schedule2){
    try {
      changeSchedule2Estab($id,$schedule2);
      $_SESSION['success_message'] = 'Schedule2 changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Schedule2 not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($contact){
    if ($contact && !preg_match ("/^\d{9}$/", $contact)) {
      $_SESSION['error_message'] = 'ERROR: Contact can only contain numbers';
      die(header('Location: ../estab_edit.php?id=$id'));
    }
    try {
      changeContactEstab($id,$contact);
      $_SESSION['success_message'] = 'Contact changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Contact not changed - can only contain numbers';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }

  if($wifi === 'wifi' && !(EstablishmentHas($id, 1))){
    try {
      changeEstabInfo($id,1);
      $_SESSION['success_message'] = 'Wifi changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Wifi not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($wifi !== 'wifi' && (EstablishmentHas($id, 1))){
    try {
      deleteEstabInfo($id,1);
      $_SESSION['success_message'] = 'Wifi deleted with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Wifi not deleted';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }

  if($takeaway === 'takeaway' && !(EstablishmentHas($id, 2))){

    try {
      changeEstabInfo($id,2);
      $_SESSION['success_message'] = 'Take Away changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Take Away not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($takeaway !== 'takeaway' && (EstablishmentHas($id, 2))){

    try {
      deleteEstabInfo($id,2);
      $_SESSION['success_message'] = 'Take Away deleted with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Take Away not deleted';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }

  if($terrace === 'terrace' && !(EstablishmentHas($id, 3))){
    try {
      changeEstabInfo($id,3);
      $_SESSION['success_message'] = 'Terrace changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Terrace not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($terrace !== 'terrace' && (EstablishmentHas($id, 3))){
    try {
      deleteEstabInfo($id,3);
      $_SESSION['success_message'] = 'Terrace deleted with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Terrace not deleted';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }

  if($delivery === 'delivery' && !(EstablishmentHas($id, 4))){
    try {
      changeEstabInfo($id,4);
      $_SESSION['success_message'] = 'Delivery changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Delivery not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if($delivery !== 'delivery' && (EstablishmentHas($id, 4))){
    try {
      deleteEstabInfo($id,4);
      $_SESSION['success_message'] = 'Delivery deleted with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Delivery not deleted';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }

  if(($music === 'music') && !(EstablishmentHas($id, 5))){
    try {
      changeEstabInfo($id,5);
      $_SESSION['success_message'] = 'Music changed with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Music not changed';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }
  if(($music !== 'music') && (EstablishmentHas($id, 5))){
    try {
      deleteEstabInfo($id,5);
      $_SESSION['success_message'] = 'Music deleted with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Music not deleted';
      die(header("Location: ../estab_edit.php?id=$id"));
    }
  }

  header("Location: ../establishment.php?id=$id");
?>
