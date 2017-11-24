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
?>
