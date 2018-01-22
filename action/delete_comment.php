<?php
  include ("../config/init.php");
  include ("../database/users.php");
  include ("../database/data_comment.php");

  $id_comment = $_GET['id_comment'];
  $id_estab = $_GET['id_estab'];
  $username = $_SESSION['username'];
  $password = $_POST['password'];

  if (isValidUser($username, $password)) {
    try {
      deleteComment($id_comment);
      $_SESSION['success_message'] = 'Delete comment succeded!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Action Delete comment not done!';
      $_SESSION['form_values'] = $_POST;
      die(header("Location: ../establishment.php?id=$id_estab"));
    }
    header("Location: ../establishment.php?id=$id_estab");

  } else {
    $_SESSION['error_message'] = 'Wrong passoword! - Comment not deleted';
    $_SESSION['form_values'] = $_POST;
    header("Location: ../establishment.php?id=$id_estab");
  }
?>
