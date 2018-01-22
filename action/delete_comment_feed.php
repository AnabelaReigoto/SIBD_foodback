<?php
  include ("../config/init.php");
  include ("../database/users.php");
  include ("../database/data_comment.php");

  $id_comment = $_GET['id_comment'];
  $id_estab = $_GET['id_estab'];
  $username = $_SESSION['username'];
  $password = $_POST['password'];

  try {
    deleteComment($id_comment);
    $_SESSION['success_message'] = 'Delete comment succeded!';
  } catch (PDOException $e) {
    $_SESSION['error_message'] = 'ERROR: Action Delete comment not done!';
    $_SESSION['form_values'] = $_POST;
    if (!strcmp($_SESSION['username'],'admin')) {
      die(header("Location: ../establishment.php?id=$id_estab"));
    } else {
      die(header("Location: ../user_feed.php"));
    }
  }
  if (!strcmp($_SESSION['username'],'admin')) {
    header("Location: ../establishment.php?id=$id_estab");
  } else {
    header("Location: ../user_feed.php");
  }
?>
