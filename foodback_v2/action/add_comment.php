<?php
  include ("../config/init.php");
  include ("../database/users.php");
  include ("../database/data_comment.php");
  //if (!isset($_SESSION['username']))
    //die(header('Location: ../principal.php'));

  $comment = $_POST['comment'];
  $username = $_SESSION['username'];
  $id_estab = $_GET['id'];

  try {
    createComment($comment, $id_estab, $username);
    $_SESSION['success_message'] = 'Input comment succeded!';
    echo ($_SESSION['success_message']);
  } catch (PDOException $e) {
    $_SESSION['error_message'] = 'FAIL!';
    echo ($_SESSION['error_message']);
    $_SESSION['form_values'] = $_POST;
  }
  die(header('Location: ../definitions.php'));
?>
