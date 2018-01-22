<?php

/******************************---- create ----********************************/

function createEstab($name,$id_category,$address,$contact,$zone,$city,$price,$schedule1,$schedule2){
  global $conn;

  $stmt = $conn->prepare('INSERT INTO establishment VALUES (DEFAULT, ? , ? , ?, ?, ?, ?, ?, ?, ?)');
  $stmt->execute(array($name, $id_category,$address,$contact,$zone,$city,$price,$schedule1,$schedule2));
}

function createEstabCuisine($id_estab,$id_cuisine){
  global $conn;

  $stmt = $conn->prepare('INSERT INTO hascuisine VALUES (DEFAULT, ? , ? )');
  $stmt->execute(array($id_estab, $id_cuisine));
}

/*****************************---- get ----************************************/

function getAllEstablishments($page,$page_size) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM establishment ORDER BY id LIMIT ? OFFSET ? ');
  $stmt->execute(array($page_size, $page*$page_size));
  return $stmt->fetchAll();
}

function getAllEstabs() {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM establishment');
  $stmt->execute(array());
  return $stmt->fetchAll();
}

function getAllEstablishmentsById($id_estab) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM establishment WHERE id = ? ');
  $stmt->execute(array($id_estab));
  return $stmt->fetchAll();
}

function getCountAllEstablishments(){
  global $conn;

  $stmt = $conn->prepare('SELECT COUNT(*) AS count FROM establishment ');
  $stmt->execute();
  return $stmt->fetch()['count'];
}

function getEstabsByUserFeed($username) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM comment WHERE username = ?');
  $stmt->execute(array($username));
  $comments = $stmt->fetchAll();

  $stmt = $conn->prepare('SELECT * FROM establishment WHERE username = ?');
  $stmt->execute(array($username));
  $comments = $stmt->fetchAll();
}

function getAllEstabByCategory($id_cat,$page,$page_size) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM establishment WHERE id_cat = ? ORDER BY id LIMIT ? OFFSET ? ');
  $stmt->execute(array($id_cat,$page_size, $page*$page_size));
  return $stmt->fetchAll();
}

function getAllEstabByCuisine($id_cuisine) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM hascuisine WHERE id_cuisine = ?');
  $stmt->execute(array($id_cuisine));
  return $stmt->fetchAll();
}

function getCountEstabByCategory($id_cat){
  global $conn;

  $stmt = $conn->prepare('SELECT COUNT(*) AS count FROM establishment WHERE id_cat = ?');
  $stmt->execute(array($id_cat));
  return $stmt->fetch()['count'];
}

function getEstablishmentById($id) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM establishment WHERE id = ?');
  $stmt->execute(array($id));
  return $stmt->fetch();
}

function getInfoNameById($id_info){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM info WHERE id=?');
  $stmt->execute(array($id_info));
  $info = $stmt->fetch();
  return $info['name'];
}

function getCuisineNameByEstab($id_estab) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM hascuisine WHERE id_estab = ?');
  $stmt->execute(array($id_estab));
  $id_cuisine = $stmt->fetch()['id_cuisine'];

  $stmt = $conn->prepare('SELECT * FROM cuisine WHERE id = ?');
  $stmt->execute(array($id_cuisine));
  $cuisine = $stmt->fetch();

  return $cuisine['name'];
}

function getEstablishmentCuisineById($id_estab) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM cuisine WHERE id IN ( SELECT hascuisine.id_cuisine
                                   FROM hascuisine WHERE hascuisine.id_estab = ? )');
  $stmt->execute(array($id_estab));
  $cuisine = $stmt->fetch();
  return $cuisine['name'];
}

function getEstablishmentCuisineIdById($id_estab) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM cuisine WHERE id IN ( SELECT hascuisine.id_cuisine
                                   FROM hascuisine WHERE hascuisine.id_estab = ? )');
  $stmt->execute(array($id_estab));
  $cuisine = $stmt->fetch();
  return $cuisine['id'];
}

function getCommentIdById($id_estab) {
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM comment WHERE id_estab = ?');
  $stmt->execute(array($id_estab));
  $comments = $stmt->fetchAll();
  return $comments['id'];
}

function getEstablishmentIdByName($name){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM establishment WHERE name = ?');
  $stmt->execute(array($name));
  $estab = $stmt->fetch();
  return $estab['id'];
}

function getCategoryIdByName($name){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM category WHERE name = ?');
  $stmt->execute(array($name));
  $category = $stmt->fetch();
  return $category['id'];
}

function getCuisineIdByName($cuisine){
  global $conn;

  $stmt = $conn->prepare('SELECT id FROM cuisine WHERE name = ?');
  $stmt->execute(array($cuisine));
  $cuisine = $stmt->fetch();
  return $cuisine['id'];
}

function getEstablishmentswithWifi(){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM establishment WHERE id IN ( SELECT hasinfo.id_estab
                                   FROM hasinfo WHERE hasinfo.id_info = 1 )');
  $stmt->execute();
  return $stmt->fetchAll();
}

function getEstablishmentInfo($id_estab){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM info WHERE id IN (SELECT id_info
                                                          FROM hasinfo
                                                          WHERE id_estab=?)');
  $stmt->execute(array($id_estab));
  return $stmt->fetchAll();
}

function EstablishmentHas($id_estab,$id_info){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM info WHERE id = ? AND id IN (SELECT id_info FROM hasinfo WHERE id_estab = ?)');
  $stmt->execute(array($id_info,$id_estab));
  $info = $stmt->fetch();

  if($info['name'] === getInfoNameById($id_info)){
    return true;
  }
  else {
    return false;
  }
}

/****************************---- change ----**********************************/

function changeNameEstab($id_estab, $name){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET name = ? WHERE id = ?');
  $stmt->execute(array($name, $id_estab));
}

function changeEmailEstab($id_estab, $email){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET email = ? WHERE id = ?');
  $stmt->execute(array($email, $id_estab));
}

function changeAddressEstab($id_estab, $address) {
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET address = ? WHERE id = ?');
  $stmt->execute(array($address, $id_estab));
}

function changeZoneEstab($id_estab, $zone) {
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET zone = ? WHERE id = ?');
  $stmt->execute(array($zone, $id_estab));
}

function changeCityEstab($id_estab, $city) {
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET city = ? WHERE id = ?');
  $stmt->execute(array($city, $id_estab));
}

function changeCuisineEstab($id_estab, $cuisine, $id_cuisine){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM hascuisine WHERE id_estab = ?');
  $stmt->execute(array($id_estab));

  if($stmt->fetch() == NULL){
    $stmt = $conn->prepare('INSERT INTO hascuisine VALUES (DEFAULT, ?, ?)');
    $stmt->execute(array($id_estab, $id_cuisine));
  }
  else{
    $stmt = $conn->prepare('UPDATE hascuisine SET id_cuisine = ? WHERE id_estab = ?');
    $stmt->execute(array($id_cuisine, $id_estab));
  }
}

function changeContactEstab($id_estab,$contact){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET contact = ? WHERE id = ?');
  $stmt->execute(array($contact, $id_estab));
}

function changePriceEstab($id_estab,$price){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET price = ? WHERE id = ?');
  $stmt->execute(array($price, $id_estab));
}

function changeSchedule1Estab($id_estab,$schedule1){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET schedule1 = ? WHERE id = ?');
  $stmt->execute(array($schedule1, $id_estab));
}

function changeSchedule2Estab($id_estab,$schedule2){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET schedule2 = ? WHERE id = ?');
  $stmt->execute(array($schedule2, $id_estab));
}

function changeEstabWifi($id_estab,$wifi){
  global $conn;

  if($wifi === 'wifi'){
    $stmt = $conn->prepare('SELECT COUNT(*) FROM hasinfo WHERE id_estab=? AND id_info = ?');
    $stmt->execute(array($id_estab,1));
    $count = $stmt->fetch();
    if($count['count'] === 0) {
      $stmt = $conn->prepare('INSERT INTO hasinfo VALUES(DEFAULT, ?, 1)');
      $stmt->execute(array($id_estab));
    }
  }
}

function changeEstabInfo($id_estab,$id_info){
  global $conn;

  $stmt = $conn->prepare('INSERT INTO hasinfo VALUES(DEFAULT, ?, ?)');
  $stmt->execute(array($id_estab,$id_info));

}

/*****************************---- delete ----*********************************/

function deleteEstabInfo($id_estab,$id_info){
  global $conn;

  $stmt = $conn->prepare('DELETE FROM hasinfo WHERE id_estab = ? AND id_info = ?');
  $stmt->execute(array($id_estab,$id_info));
}

function deleteEstablishment($id_estab) {
  global $conn;

  if (file_exists("../images/estabs/$id_estab")) {
      for($i = 1; file_exists("../images/estabs/$id_estab/menu/menu$i.png");$i++){
        unlink("../images/estabs/$id_estab/menu/menu$i.png");
      }
    rmdir("../images/estabs/$id_estab/menu");
    unlink("../images/estabs/$id_estab/photos/1.png");
    rmdir("../images/estabs/$id_estab/photos");
    rmdir("../images/estabs/$id_estab");
  }

  $stmt = $conn->prepare('DELETE FROM hasinfo WHERE id_estab = ?');
  $stmt->execute(array($id_estab));

  $stmt = $conn->prepare('DELETE FROM hascuisine WHERE id_estab = ?');
  $stmt->execute(array($id_estab));

  $id_comments = getCommentIdById($id_estab);
  foreach ($id_comments as $id_comment) {
    deleteComment($id_comment);
  }

  $stmt = $conn->prepare('DELETE FROM establishment WHERE id = ?');
  $stmt->execute(array($id_estab));
}

?>
