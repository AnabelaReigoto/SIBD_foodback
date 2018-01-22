<?php
  //Doesn't need any include, doesn't access to database

  $id = $_GET['id'];

  if (!file_exists("../images/estabs/$id/photos")) {
    mkdir("../images/estabs/$id/photos", 0777, true);
  }

  $originalFileName = "../images/estabs/$id/photos/1.png";

  move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

  $original = imagecreatefrompng($originalFileName);

  header("Location: ../establishment.php?id=$id");
?>
