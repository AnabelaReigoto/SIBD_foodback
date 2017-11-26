<?php
  session_start();

  $conn = new PDO('pgsql:host=dbm.fe.up.pt;port=5432;dbname=sibd17g210', 'sibd17g210', 'toscano');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->query("SET SCHEMA 'foodback'");

  /* teste*/

  // $stmt = $conn ->prepare('SELECT *FROM category');
  // $stmt->execute();
  // $category=$stmt->fetch();
  //
  // print_r($category);


  if (isset($_SESSION['error_message'])) {
    $error = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
  } else {
      $error = "";
  }
  echo $error;


  if (isset($_SESSION['success_message'])) {
    $success = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
  } else {
      $success = "";
  }
  echo $success;

  if (isset($_SESSION['form_values'])) {
    $form_values = $_SESSION['form_values'];
    unset($_SESSION['form_values']);
  }

?>
