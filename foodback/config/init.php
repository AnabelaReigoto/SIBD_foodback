<?php
  session_start();

  $conn = new PDO('pgsql:host=dbm.fe.up.pt;port=5432;dbname=sibd17g210', 'sibd17g210', 'toscano');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->query("SET SCHEMA 'public'");

  /* teste*/
  
  // $stmt = $conn ->prepare('SELECT *FROM category');
  // $stmt->execute();
  // $category=$stmt->fetch();
  //
  // print_r($category);


  if (isset($_SESSION['error_message'])) {
    $_ERROR_MESSAGE = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
    echo "Connected unsuccessfully";
  }


  if (isset($_SESSION['success_message'])) {
    $_SUCCESS_MESSAGE = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
    echo "Connected successfully";
  }

?>
