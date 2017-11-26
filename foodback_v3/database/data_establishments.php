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

function changeNameEstab($id_estab, $name){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET name = ? WHERE id = ?');
  $stmt->execute(array($name, $id_estab));
}

function changeEmailEstab($id_estab,$email){
  global $conn;

  $stmt = $conn->prepare('UPDATE establishment SET email = ? WHERE id = ?');
  $stmt->execute(array($email, $id_estab));
}

function getIdCuisineByName($cuisine){
  global $conn;

  $stmt = $conn->prepare('SELECT id FROM cuisine WHERE name = ?');
  $stmt->execute(array($cuisine));
  return $stmt->fetch();

}

function changeCuisineEstab($id_estab,$cuisine){
  global $conn;

  $id_cuisine = getIdCuisineByName($cuisine);
  $stmt = $conn->prepare('UPDATE hascuisine SET id_cuisine = ? WHERE id_estab = ?');
  $stmt->execute(array($id_cuisine, $id_estab));
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




function changeEstabInfo($id_estab,$wifi){
  global $conn;

  if($wifi === 'wifi'){
    $stmt = $conn->prepare('SELECT COUNT(*) FROM hasinfo WHERE id_estab=? AND id_info = ?');
    $stmt->execute(array($id_estab,1));
    $n = $stmt->fetch();
    if(n === 0) {
      $stmt = $conn->prepare('INSERT INTO hasinfo VALUES(DEFAULT, ?, 1)');
      $stmt->execute(array($id_estab));
    }
  }

}
?>
