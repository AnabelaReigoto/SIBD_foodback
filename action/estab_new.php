<?php
  include ('../config/init.php');
  include ('../database/data_establishment.php');

  if (isset($_POST['username']) && !preg_match ("/^[a-zA-Z]+$/", $_POST['username'])) {
    $_SESSION['error_message'] = 'ERROR: Username can only contain letters and spaces';
    die(header("Location: ../estab_new.php"));
  }
  if (isset($_POST['password']) && !preg_match ("/^[a-zA-Z]+$/", $_POST['password'])) {
    $_SESSION['error_message'] = 'ERROR: Password can only contain letters and spaces';
    die(header("Location: ../estab_new.php"));
  }
  if (isset($_POST['name']) && !preg_match ("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª0-9,.!?'\s]+$/", $_POST['name'])) {
    $_SESSION['error_message'] = 'ERROR: Name can only contain letters and spaces';
    die(header("Location: ../estab_new.php"));
  }
  if (isset($_POST['address']) && !preg_match ('/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª0-9,.!? ]+$/', $_POST['address'])) {
    $_SESSION['error_message'] = 'ERROR: Address can only contain letters, commas, numbers and spaces';
    die(header("Location: ../estab_new.php"));
  }
  if (isset($_POST['zone']) && !preg_match ("/^[a-zA-ZZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇ ]+$/", $_POST['zone'])) {
    $_SESSION['error_message'] = 'ERROR: Zone can only contain letters and spaces';
    die(header("Location: ../estab_new.php"));
  }
  if (isset($_POST['city']) && !preg_match ("/^[a-zA-Z ]+$/", $_POST['city'])) {
    $_SESSION['error_message'] = 'ERROR: City can only contain letters and spaces';
    die(header("Location: ../estab_new.php"));
  }
  if (isset($_POST['price']) && !preg_match ("/^(?:0|[1-9]\d*)(?:\.\d{2})?$/", $_POST['price'])) {
    $_SESSION['error_message'] = 'ERROR: Price has to be an integer';
    die(header("Location: ../estab_new.php"));
  }
  if (isset($_POST['schedule1']) && !preg_match ('/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª0-9,.:!? ]+$/', $_POST['schedule1'])) {
    $_SESSION['error_message'] = 'ERROR: Schedule1 can only contain letters, numbers and spaces';
    die(header("Location: ../estab_new.php"));
  }
  if (isset($_POST['schedule2']) && !preg_match ('/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª0-9,.:!? ]+$/', $_POST['schedule2']) && $_POST['schedule2'] != '') {
    $_SESSION['error_message'] = 'ERROR: Schedule2 can only contain letters, numbers and spaces';
    die(header("Location: ../estab_new.php"));
  }
  if (isset($_POST['contact']) && !preg_match ("/^\d{9}$/", $_POST['contact']) && $_POST['contact'] != '') {
    $_SESSION['error_message'] = 'ERROR: Contact has to contain 9 numbers';
    die(header("Location: ../estab_new.php"));
  }

  $name = $_POST['name'];
  $category = $_POST['category'];
  $cuisine = $_POST['cuisine'];
  $address = $_POST['address'];
  $zone = $_POST['zone'];
  $city = $_POST['city'];
  $price = $_POST['price'];
  $schedule1 = $_POST['schedule1'];
  $schedule2 = $_POST['schedule2'];
  $contact = $_POST['contact'];
  if($address === "") $address = NULL;
  if($zone === "") $zone = NULL;
  if($city === "") $city = NULL;
  if($price === "") $price = NULL;
  if($schedule1 === "") $schedule1 = NULL;
  if($schedule2 === "") $schedule2 = NULL;
  if($contact === "") $contact = NULL;

  $wifi = isset($_POST['wifi'])?$_POST['wifi']:'';
  $terrace = isset($_POST['terrace'])?$_POST['terrace']:'';
  $takeaway = isset($_POST['takeaway'])?$_POST['takeaway']:'';
  $delivery = isset($_POST['delivery'])?$_POST['delivery']:'';
  $music = isset($_POST['music'])?$_POST['music']:'';


  $id_category = getCategoryIdByName($category);

  try {
      createEstab($name,$id_category,$address,$contact,$zone,$city,$price,$schedule1,$schedule2);
      $_SESSION['success_message'] = 'Establishment created with success!';
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'Fail creating Establishment!';
      die(header("Location: ../estab_new.php"));
  }

  $id_estab = getEstablishmentIdByName($name);
  $id_cuisine = getCuisineIdByName($cuisine);

  try {
    createEstabCuisine($id_estab,$id_cuisine);
  } catch (PDOException $e) {
    $_SESSION['error_message'] = 'Fail in Cuisine';
    die(header("Location: ../estab_new.php"));
  }

  if($wifi === 'wifi'){
    try {
      changeEstabInfo($id_estab,1);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'Fail in Wifi';
      die(header("Location: ../estab_new.php?id=$id"));
    }
  }

  if($takeaway === 'takeaway'){

    try {
      changeEstabInfo($id_estab,2);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'Fail in Take Away';
      die(header("Location: ../estab_new.php"));
    }
  }

  if($terrace === 'terrace'){
    try {
      changeEstabInfo($id_estab,3);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'Fail in Terrace';
      die(header("Location: ../estab_new.php"));
    }
  }

  if($delivery === 'delivery'){
    try {
      changeEstabInfo($id_estab,4);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'Fail in Delivery';
      die(header("Location: ../estab_new.php"));
    }
  }

  if($music === 'music'){
    try {
      changeEstabInfo($id_estab,5);
    } catch (PDOException $e) {
      $_SESSION['error_message'] = 'Fail in Music';
      die(header("Location: ../estab_new.php"));
    }
  }

  if(!empty($_FILES['image_photo']['tmp_name'])){

    if (!file_exists("../images/estabs/$id_estab/photos")) {
      mkdir("../images/estabs/$id_estab/photos", 0777, true);
    }

    $originalFileName = "../images/estabs/$id_estab/photos/1.png";
    move_uploaded_file($_FILES['image_photo']['tmp_name'], $originalFileName);

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

  if(!empty($_FILES['upload']['name'])){
    $total = count($_FILES['upload']['name']);
    $j=0;
    for($i=0; $i<$total; $i++) {
      $j = $i + 1;
      if (!file_exists("../images/estabs/$id_estab/menu")) {
        mkdir("../images/estabs/$id_estab/menu", 0777, true);
      }

      $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

      $newFilePath = "../images/estabs/$id_estab/menu/menu$j.png";

      move_uploaded_file($tmpFilePath, $newFilePath);
    }

  }
  header("Location: ../estab_new.php");
?>
