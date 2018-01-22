<?php
  include ("../config/init.php");
  include ("../database/users.php");
  include ("../database/data_rating.php");
  include ("../database/data_comment.php");

  $id_estab = $_GET['id'];
  $username = $_SESSION['username'];
  $rate = $_POST['rating'];

  if ($rate) {
    try {
      $has_comment = HasComment($id_estab, $username);
      if ($has_comment < 1) {
        createRating($id_estab,$username,$rate);
      } else {
        changeRating($id_estab,$username,$rate);
      }
      $_SESSION['success_message'] = 'Rating comment succeded!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'ERROR: Rating comment not inserted!';
      $_SESSION['form_values'] = $_POST;
      die(header("Location: ../establishment.php?id=$id_estab"));
    }
  }
  header("Location: ../establishment.php?id=$id_estab");
?>
