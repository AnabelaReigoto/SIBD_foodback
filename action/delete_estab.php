<?php
  include ("../config/init.php");
  include ("../database/data_comment.php");
  include ("../database/data_establishment.php");
  include ("../database/users.php");

  $id_estab = $_GET['id'];
  $password = $_POST['password'];
  $username = $_SESSION['username'];

  if (isValidUser($username, $password)) {
    try {
      deleteEstablishment($id_estab);
      $_SESSION['success_message'] = 'Delete establishment succeded!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Action Delete establishment not done!';
      $_SESSION['form_values'] = $_POST;
      die(header("Location: ../establishment.php?id=$id_estab"));
    }
    header("Location: ../principal.php");

  } else {
    $_SESSION['error_message'] = 'Wrong passoword! - Establishment not deleted';
    $_SESSION['form_values'] = $_POST;
    die(header("Location: ../establishment.php?id=$id_estab"));
  }
?>
