<?php
 function getAllEstablishments() {
   global $conn;

   $stmt = $conn->prepare('SELECT * FROM establishment');
   $stmt->execute();
   return $stmt->fetchAll();
 }

 function getEstablishmentById($id) {
   global $conn;

   $stmt = $conn->prepare('SELECT * FROM establishment WHERE id = ?');
   $stmt->execute(array($id));
   return $stmt->fetch();
 }

 function getEstablishmentswithWifi(){
   global $conn;

   $stmt = $conn->prepare('SELECT * FROM establishment WHERE id IN ( SELECT hasinfo.id_estab
                                     FROM hasinfo WHERE hasinfo.id_info = 1 )');
   $stmt->execute();
   $estabs=$stmt->fetchAll();
   return $estabs;
 }

 function getEstablishmentCuisineById($estab_id){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM cuisine WHERE id IN ( SELECT hascuisine.id_cuisine
                                    FROM hascuisine WHERE hascuisine.id_estab = ? )');
  $stmt->execute(array($estab_id));
  $cuisine = $stmt->fetch();

  return $cuisine['name'];
}

function getEstablishmentInfo($estab_id){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM info WHERE id IN (SELECT id_info
                                                          FROM hasinfo
                                                          WHERE id_estab=?)');
  $stmt->execute(array($estab_id));
  return $stmt->fetchAll();

}

function EstablishmentWasWifi($estab_id){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM info WHERE id=1 AND id IN (SELECT id_info FROM hasinfo WHERE id_estab=?)');
  $stmt->execute(array($estab_id));
  $info = $stmt->fetch();

  if($info['name'] === 'Wifi'){
    return true;
  }
  else return false;
}

function EstablishmentWasTakeAway($estab_id){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM info WHERE id=2 AND id IN (SELECT id_info FROM hasinfo WHERE id_estab=?)');
  $stmt->execute(array($estab_id));
  $info = $stmt->fetch();

  if($info['name'] === 'Take Away'){
    return true;
  }
  else return false;
}

function EstablishmentWasTerrace($estab_id){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM info WHERE id=3 AND id IN (SELECT id_info FROM hasinfo WHERE id_estab=?)');
  $stmt->execute(array($estab_id));
  $info = $stmt->fetch();

  if($info['name'] === 'Esplanada'){
    return true;
  }
  else return false;
}

function EstablishmentWasHomeDelivery($estab_id){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM info WHERE id=4 AND id IN (SELECT id_info FROM hasinfo WHERE id_estab=?)');
  $stmt->execute(array($estab_id));
  $info = $stmt->fetch();

  if($info['name'] === 'Entrega do Domicílio'){
    return true;
  }
  else return false;
}

function EstablishmentWasMusic($estab_id){
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM info WHERE id=5 AND id IN (SELECT id_info FROM hasinfo WHERE id_estab=?)');
  $stmt->execute(array($estab_id));
  $info = $stmt->fetch();

  if($info['name'] === 'Música ao vivo'){
    return true;
  }
  else return false;
}

function changeNameEstab($username, $name){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET name = ? WHERE username = ?');
  $stmt->execute(array($name, $username));
}

function changeEmailEstab($username,$email){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET email = ? WHERE username = ?');
  $stmt->execute(array($email, $username));
}

function changeAddressEstab($username,$address){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET address = ? WHERE username = ?');
  $stmt->execute(array($address, $username));
}


?>
