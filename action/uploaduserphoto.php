<?php

  $username = $_GET['username'];

  if (!file_exists("../images/users/$username/original")) {
    mkdir("../images/users/$username/original", 0777, true);
  }

  if (!file_exists("../images/users/$username/small")) {
    mkdir("../images/users/$username/small", 0777, true);
  }

  $originalFileName = "../images/users/$username/original/1.jpg";
  $smallFileName = "../images/users/$username/small/1.jpg";

  move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

  $original = imagecreatefromjpeg($originalFileName);

  $width = imagesx($original);
  $height = imagesy($original);
  $square = min($width, $height);

  $small = imagecreatetruecolor(200,200);
  imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
  imagejpeg($small, $smallFileName);

  header("Location: ../user_def.php");
?>
