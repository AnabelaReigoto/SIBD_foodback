<?php
  session_start();

  $conn = new PDO('pgsql:host=dbm.fe.up.pt;port=5432;dbname=sibd17g210', 'sibd17g210', 'toscano');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->query("SET SCHEMA 'foodback'");

  if (isset($_SESSION['form_values'])) {
    $form_values = $_SESSION['form_values'];
    unset($_SESSION['form_values']);
  }

?>
