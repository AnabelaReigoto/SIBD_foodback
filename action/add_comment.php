<?php
  include ("../config/init.php");
  include ("../database/users.php");
  include ("../database/data_comment.php");
  include ("../database/data_rating.php");

  $id_estab = $_GET['id'];
  $comment = strip_tags($_POST['comment']);
  $username = $_SESSION['username'];
  $rate = $_POST['rating'];

  if(!empty($_FILES['image']['tmp_name'])){
    $photo = 1;
  } else {
    $photo = 0;
  }

  if ($comment || $photo || $rate) {
    try {
      $has_comment = HasComment($id_estab, $username);
      if ($has_comment < 1) {
        createComment($comment, $id_estab, $username, $photo);
        if($rate){
          changeRating($id_estab, $username, $rate);
        }
        $_SESSION['success_message'] = 'Input comment succeded!';
      } else {
        changeComment($comment, $id_estab, $username, $photo);
        if($rate){
          changeRating($id_estab, $username, $rate);
        }
        $_SESSION['success_message'] = 'Comment changed with success!';
      }
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'FAIL comment!';
      $_SESSION['form_values'] = $_POST;
      die(header("Location: ../establishment.php?id=$id_estab"));
    }
  }

  if(!empty($_FILES['image']['tmp_name'])){

    $id_comment = getCommentId($id_estab, $comment, $username);

    if (!file_exists("../images/comment/$id_comment")) {
      mkdir("../images/comment/$id_comment", 0777, true);
    }

    $originalFileName = "../images/comment/$id_comment/1.png";
    move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

    $value = exif_imagetype($originalFileName);

      if ($value === 1) {
        $original = imagecreatefromgif($originalFileName);
      } elseif ($value === 2) {
        $original = imagecreatefromjpeg($originalFileName);
      } elseif ($value === 3) {
        $original = imagecreatefrompng($originalFileName);
      }

      $width = imagesx($original);     // width of the original image
      $height = imagesy($original);    // height of the original image
      $square = min($width, $height);  // size length of the maximum square
  }

  header("Location: ../establishment.php?id=$id_estab");
?>
