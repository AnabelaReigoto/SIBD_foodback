<?php
  //Doesn't need any include, doesn't access to database

  $id = $_GET['id'];

  $photo = isset($_GET['photo'])?$_GET['photo']:$_POST['choose'];


  // Generate filenames for original, small and medium files
  $originalFileName = "../images/estabs/$id/menu/menu$photo.png";

  // Move the uploaded file to its final destination
  move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

  // Crete an image representation of the original image
  $value = exif_imagetype($originalFileName);

  header("Location: ../establishment.php?id=$id");
?>
