<?php
  include ("../config/init.php");
  include ("../database/users.php");
  include ("../database/data_comment.php");

  $id_comment = $_GET['id_comment'];
  $id_estab = $_GET['id_estab'];

  try {
    deleteCommentPhoto($id_comment);
    $_SESSION['success_message'] = 'Delete comment photo succeded!';
  } catch (PDOException $e) {
    $_SESSION['error_message'] = 'ERROR: Action Delete comment photo not done!';
    $_SESSION['form_values'] = $_POST;
    die(header("Location: ../establishment.php?id=$id_estab"));
  }

  header("Location: ../establishment.php?id=$id_estab");
?>
