<?php
  include ("../config/init.php");
  include ("../database/users.php");
  include ("../database/data_comment.php");
  //if (!isset($_SESSION['username']))
    //die(header('Location: ../principal.php'));

  $comment = $_POST['comment'];
  $username = $_SESSION['username'];
  $id_estab = 1;

  //getCommentID($id_estab);

  try {
    createComment($comment, $id_estab, $username);
    $_SESSION['success_message'] = 'unsuccess!';
  } catch (PDOException $e) {

    if (strpos($e->getMessage(), 'users_pkey') !== false)
      $_SESSION['error_message'] = 'Username already exists!';
    else
      $_SESSION['error_message'] = 'FAIL!';

    $_SESSION['form_values'] = $_POST;
  }
  die(header('Location: ../definitions.php'));
?>
